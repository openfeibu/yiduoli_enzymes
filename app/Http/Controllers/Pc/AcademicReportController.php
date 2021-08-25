<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\AcademicReportRepository;
use App\Repositories\Eloquent\ProductCategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\AcademicReport;
use App\Models\Product;
use App\Http\Controllers\Pc\Controller as BaseController;

class AcademicReportController extends BaseController
{
    public function __construct(
        AcademicReportRepository $academic_report_repository,
        ProductCategoryRepository $category_repository,
        ProductRepository $productRepository
    )
    {
        parent::__construct();
        $this->academic_report_repository = $academic_report_repository;
        $this->category_repository = $category_repository;
        $this->productRepository = $productRepository;
    }
    /**
     * Show dashboard for each user.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_id = $request->get('product_id','');
        if($product_id)
        {
            return $this->product_academic_report($request,$product_id);
        }
        $top_categories = $this->category_repository->getChildListCategories(0);
        $product_category_id = $request->get('product_category_id','0');
        $product_category_id = $this->category_repository->getLastFirstCategoryId($product_category_id);

        $lists = $this->category_repository->getLastFirstCategoryLists($product_category_id);

        $search_key = $request->get('search_key',"");
        $products = app(Product::class)->join('product_product_category','product_product_category.product_id','=','products.id')->join('academic_reports','academic_reports.product_id','=','products.id');
        if($product_category_id)
        {
            $ids = $this->category_repository->getSubIds($product_category_id);
            array_unshift($ids,$product_category_id);
            $products = $products->whereIn('product_product_category.product_category_id',$ids);
        }
        $products = $products
            ->groupBy('products.id')
            ->orderBy('products.order','desc')
            ->orderBy('products.created_at','desc')
            ->orderBy('products.id','desc')
            ->paginate(10,['products.*']);

        foreach ($products as $key => $product)
        {
            $product->academic_reports = AcademicReport::where('product_id',$product->id)
                ->orderBy('created_at','desc')
                ->orderBy('id','desc')
                ->get();
        }
        if ($this->response->typeIs('json')) {
            $data['content'] = $this->response->layout('render')
                ->view('academic_report.list')
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
        return $this->response->title(trans('academic_report.name'))
            ->view('academic_report.index')
            ->data(compact('products','top_categories','product_category_id','search_key','lists'))
            ->output();

    }
    public function product_academic_report($request,$product_id)
    {
        $product = $this->productRepository->find($product_id);
        $academic_reports = app(AcademicReport::class);

        $academic_reports = $academic_reports->where('product_id',$product_id);

        $academic_reports = $academic_reports
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->get();

        if ($this->response->typeIs('json')) {
            $data['content'] = $this->response->layout('render')
                ->view('academic_report.list')
                ->data(compact('academic_reports'))->render()->getContent();

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title(trans('academic_report.name'))
            ->view('academic_report.product_academic_report')
            ->data(compact('academic_reports','product'))
            ->output();
    }


}
