<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\AcademicReportRepository;
use App\Repositories\Eloquent\ProductCategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Pc\Controller as BaseController;

class ProductInformationController extends BaseController
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
        $top_categories = $this->category_repository->getListCategories(0);
        $product_category_id = $request->get('product_category_id','0');
        $product_category_id = $this->category_repository->getLastFirstCategoryId($product_category_id);

        $lists = $this->category_repository->getLastFirstCategoryLists($product_category_id);
        $search_key = $request->get('search_key',"");
        $products = app(Product::class)->join('product_product_category','product_product_category.product_id','=','products.id');
        if($product_category_id)
        {
            $ids = $this->category_repository->getSubIds($product_category_id);
            array_unshift($ids,$product_category_id);
            $products = $products->whereIn('product_product_category.product_category_id',$ids);
        }
        $products = $products->where(function ($query){
            $query->whereNotNull('products.instruction')->orWhereNotNull('vid');
        })
            ->orderBy('products.order','desc')
            ->orderBy('products.created_at','desc')
            ->orderBy('products.id','desc')
            ->paginate(10);
        if ($this->response->typeIs('json')) {
            $data['content'] = $this->response->layout('render')
                ->view('product_information.list')
                ->data(compact('products'))->render()->getContent();
            $data['category_html'] = $this->response->layout('render')
                ->view('product.category_html')
                ->data(compact('lists'))->render()->getContent();
//            if($product_category_id)
//            {
//                $categories = $this->category_repository->getListCategories($product_category_id)->toArray();
//            }else{
//                $categories = [];
//            }
//            $data['categories'] = $categories;

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }

        return $this->response->title(trans('product_information.name'))
            ->view('product_information.index')
            ->data(compact('products','top_categories','product_category_id','search_key','lists'))
            ->output();

    }


}
