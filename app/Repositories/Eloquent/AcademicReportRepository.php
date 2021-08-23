<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\AcademicReportRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class AcademicReportRepository extends BaseRepository implements AcademicReportRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product.academic_report.search');
    }
    public function model()
    {
        return config('model.product.academic_report.model');
    }

}