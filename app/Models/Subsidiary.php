<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Subsidiary extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.subsidiary.subsidiary';

    protected $appends = ['parent_name'];

    public function getParentNameAttribute()
    {
        return $this->attributes ? Subsidiary::where('id',$this->attributes['parent_id'])->value('name') : '';
    }
}