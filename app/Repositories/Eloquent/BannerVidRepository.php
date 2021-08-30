<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BannerVidRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class BannerVidRepository extends BaseRepository implements BannerVidRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.banner_vid.banner_vid.search');
    }
    public function model()
    {
        return config('model.banner_vid.banner_vid.model');
    }

}