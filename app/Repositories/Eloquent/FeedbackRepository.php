<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\FeedbackRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class FeedbackRepository extends BaseRepository implements FeedbackRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.feedback.feedback.search');
    }
    public function model()
    {
        return config('model.feedback.feedback.model');
    }

}