<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductVidRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductVidRepository extends BaseRepository implements ProductVidRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product_vid.product_vid.search');
    }
    public function model()
    {
        return config('model.product_vid.product_vid.model');
    }

}