<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class AcademicReport extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.product.academic_report';

    protected $appends = ['product'];

    public function getProductAttribute()
    {
        return $this->attributes ? Product::where('id',$this->attributes['product_id'])->first(['id','product_category_id','title']) : '';
    }
}