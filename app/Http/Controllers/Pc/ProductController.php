<?php

namespace App\Http\Controllers\Pc;

use App\Models\ProductCategory;
use App\Repositories\Eloquent\AcademicReportRepository;
use App\Repositories\Eloquent\ProductCategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Pc\Controller as BaseController;

class ProductController extends BaseController
{
    public function __construct(
        ProductRepository $product_repository,
        ProductCategoryRepository $category_repository,
        AcademicReportRepository $academicReportRepository
    )
    {
        parent::__construct();
        $this->product_repository = $product_repository;
        $this->category_repository = $category_repository;
        $this->academicReportRepository = $academicReportRepository;

    }
    /**
     * Show dashboard for each user.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $top_categories = $this->category_repository->getChildListCategories(0);
        $product_category_id = $request->get('product_category_id',$top_categories->toArray()[0]['id']);

        $top_product_category_id = $this->category_repository->getTopParentId($product_category_id);

        $category = $this->category_repository->find($product_category_id);
        //二级
        if($top_product_category_id == $product_category_id)
        {
            $secondary = $this->category_repository->getChildListCategories($product_category_id);
        }
        else{
            $secondary = $this->category_repository->getChildListCategories($category->parent_id);
        }

        $search_key = $request->get('search_key',"");
        $products = app(Product::class)->join('product_product_category','product_product_category.product_id','=','products.id');

        if($product_category_id)
        {
            $ids = $this->category_repository->getSubIds($product_category_id);
            array_unshift($ids,$product_category_id);
            if(!$search_key)
            {
                $products = $products->whereIn('product_product_category.product_category_id',$ids);
            }
            $children = $this->category_repository->getChildListCategories($product_category_id);
        }

        $top_product_category = $this->category_repository->where('id',$top_product_category_id)->first();

        $products = $products->when($search_key,function ($query) use ($search_key){
            return $query->where('products.title','like','%'.$search_key.'%');
        });
        $products = $products->groupBy('products.id')->orderBy('products.order','desc')
            ->orderBy('products.created_at','desc')
            ->orderBy('products.id','desc')
            ->paginate(12,['products.*']);

        if ($this->response->typeIs('json')) {
            $data['content'] = $this->response->layout('render')
                ->view('product.list')
                ->data(compact('products'))->render()->getContent();

            $data['top_product_category'] = $top_product_category;

            $data['category_html'] = $this->response->layout('render')
                ->view('product.category_html')
                ->data(compact('top_categories','top_product_category','secondary' ,'product_category_id','top_product_category_id'))->render()->getContent();

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }

        return $this->response->title(trans('product.name'))
            ->view('product.index')
            ->data(compact('products','top_categories','top_product_category'
                ,'product_category_id','top_product_category_id','children','secondary','search_key'))
            ->output();

    }
    public function show(Request $request ,Product $product)
    {
        $product_category_ids = $product->product_category_ids;
        $related_products = $this->product_repository
            ->join('product_product_category','product_product_category.product_id','=','products.id')
            ->whereIn('product_product_category.product_category_id',$product_category_ids)
            ->orderBy('products.created_at','desc')
            ->orderBy('products.id','desc')
            ->limit(5)
            ->get(['products.*']);
        $academic_reports = $this->academicReportRepository->where('product_id',$product->id)->orderBy('created_at','desc')->orderBy('id','desc')->get();
        return $this->response->title($product['title'])
            ->view('product.show')
            ->data(compact('product','related_products','academic_reports'))
            ->output();
    }

}
