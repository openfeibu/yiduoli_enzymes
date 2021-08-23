<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\OutputServerMessageException;
use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductCategoryRepository;
use Tree;

class ProductCategoryResourceController extends BaseController
{
    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $product_category
    )
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $this->repository = $product_category;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $product_categories = $this->repository->getCategories();

        $product_categories = json_encode($product_categories);

        return $this->response->title(trans('product_category.name'))
            ->view('product_category.index')
            ->data(compact('product_categories'))
            ->output();
    }
    public function create(Request $request)
    {
        $product_categories = $this->repository->getAllCategoriesCache();
        $product_categories = Tree::getTree($product_categories);
        $product_category = $this->repository->newInstance([]);
        $parent_id = $request->get('parent_id',0);
        return $this->response->title(trans('product_category.name'))
            ->view('product_category.create')
            ->data(compact('product_category','product_categories','parent_id'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            if(isset($attributes['split']['/']) && $attributes['split']['/'] == 'on')
            {
                $product_categories = preg_split("/(\/|\n)/",$attributes['categories']);
                //$product_en_categories = preg_split("/(\/|\n)/",$attributes['en_categories']);
            }else{
                $product_categories = preg_split("/(\n)/",$attributes['categories']);
                //$product_en_categories = preg_split("/(\/|\n)/",$attributes['en_categories']);
            }

            $parent_id = $attributes['parent_id'];

            $top_parent_id = $this->repository->getTopParentId($parent_id);
            $product_category_id_arr =$this->repository->getCategoryIds($parent_id);
            $product_category_ids = $product_category_id_arr ? implode(',',$product_category_id_arr) : null;

            $data = [];
            foreach ($product_categories as $key => $product_category)
            {
                $data[] = [
                    'name' => trim($product_category),
                   // 'en_name' => $product_en_categories[$key] ?? '',
                    'parent_id' => $parent_id,
                    'top_parent_id' => $top_parent_id,
                    'category_ids' => $product_category_ids,
                ];
            }

            ProductCategory::insert($data);
            $this->repository->forgetCategoriesSelectTree();

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product_category.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product_category'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product_category'))
                ->redirect();
        }
    }
    public function show(Request $request,ProductCategory $product_category)
    {
        if ($product_category->exists) {
            $view = 'product_category.show';
        } else {
            $view = 'product_category.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('product_category.name'))
            ->data(compact('product_category'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,ProductCategory $product_category)
    {
        try {
            $attributes = $request->all();

            $product_category->update($attributes);
            $this->repository->forgetCategoriesSelectTree();
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('product_category.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product_category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product_category/' . $product_category->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,ProductCategory $product_category)
    {
        try {
            $sub_ids = $this->repository->getSubIds($product_category->id);

            $ids = $sub_ids;
            array_unshift($ids,$product_category->id);
            $products = Product::join('product_product_category','product_product_category.product_id','=','products.id')->whereIn('product_product_category.product_category_id',$ids)->first(['products.id']);
            if($products)
            {
                throw new OutputServerMessageException('请先移除该分类及子分类下的产品');
            }
            if($sub_ids)
            {

                $this->repository->forceDelete($sub_ids);
            }
            $this->repository->forceDelete([$product_category->id]);
            $this->repository->forgetCategoriesSelectTree();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product_category.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('product_category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product_category'))
                ->redirect();
        }
    }
    /*
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);
            $this->repository->forgetCategoriesSelectTree();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product_category.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('product_category'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product_category'))
                ->redirect();
        }
    }
    */

}
