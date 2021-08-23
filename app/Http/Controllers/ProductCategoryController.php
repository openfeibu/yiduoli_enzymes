<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\ProductCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Log;

class ProductCategoryController extends BaseController
{
    public function __construct(ProductCategoryRepository $category)
    {
        parent::__construct();
        $this->repository = $category;
    }
    public function getCategories(Request $request)
    {
        $id = $request->get('id',0);
        $categories = $this->repository->where('parent_id',$id)->get();
        return $categories;
    }
    public function getCategoriesTree(Request $request)
    {
        $categories = $this->repository->getCategoriesSelectTree();
        return $categories;
    }
}
