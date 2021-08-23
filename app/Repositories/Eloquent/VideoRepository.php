<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\VideoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.video.video.search');
    }
    public function model()
    {
        return config('model.video.video.model');
    }

}