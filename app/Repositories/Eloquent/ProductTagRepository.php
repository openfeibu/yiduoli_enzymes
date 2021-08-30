<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductTagRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductTagRepository extends BaseRepository implements ProductTagRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product.product_tag.search');
    }
    public function model()
    {
        return config('model.product.product_tag.model');
    }

}