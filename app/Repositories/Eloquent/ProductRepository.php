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

}