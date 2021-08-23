<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Product extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    protected $config = 'model.product.product';

    protected $appends = ['images','image','product_category_name','product_category_ids'];

    public function getImagesAttribute()
    {
        //return $this->attributes ? ContractImage::where('contract_id',$this->attributes['id'])->orderBy('order','asc')->orderBy('id','asc')->pluck('url')->toArray() : [];
        return $this->attributes ? ProductImage::where('product_id',$this->attributes['id'])->orderBy('order','asc')->orderBy('id','asc')->pluck('url') : '';
    }
    public function getImageAttribute()
    {
        return $this->attributes ? ProductImage::where('product_id',$this->attributes['id'])->orderBy('order','asc')->orderBy('id','asc')->value('url') : '';
    }
    public function getProductCategoryNameAttribute()
    {
        return $this->attributes ? ProductCategory::where('id',$this->attributes['product_category_id'])->value('name') : '';
    }
    public function getParametersAttribute()
    {
        return $this->attributes ? unserialize($this->attributes['parameters']) : [];
    }
    public function product_categories()
    {
        return $this->belongsToMany(config('model.product.product_category.model'));
    }
    public function getProductCategoryIdsAttribute()
    {
        return $this->attributes ? $this->product_categories()->pluck('product_category_id')->toArray() : [];
    }
}