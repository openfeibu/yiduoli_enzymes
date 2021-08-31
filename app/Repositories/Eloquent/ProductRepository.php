<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product.product.search');
    }
    public function model()
    {
        return config('model.product.product.model');
    }
    public function getProductByCategoryId($product_category_id,$limit=6)
    {
        $ids = app(ProductCategoryRepository::class)->getSubIds($product_category_id);
        array_unshift($ids,$product_category_id);
        $products = $this->join('product_product_category','product_product_category.product_id','=','products.id')
            ->whereIn('product_product_category.product_category_id',$ids)
            ->orderBy('products.order','desc')
            ->orderBy('products.created_at','desc')
            ->orderBy('products.id','desc')
            ->limit($limit)
            ->get(['products.*']);
        return $products;
    }


}