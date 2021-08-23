<?php namespace App\Widgets;

use App\Models\Permission;
use App\Models\ProductCategory;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\ProductCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Tree,Route;
use Teepluss\Theme\Theme;
use Teepluss\Theme\Widget;
use App\Models\NavCategory;

class WebBreadcrumb extends Widget {

    /**
     * Widget template.
     *
     * @var string
     */
    public $template = 'breadcrumb';

    /**
     * Watching widget tpl on everywhere.
     *
     * @var boolean
     */
    public $watch = false;

    /**
     * Arrtibutes pass from a widget.
     *
     * @var array
     */
    public $attributes = array();

    /**
     * Turn on/off widget.
     *
     * @var boolean
     */
    public $enable = true;

    /**
     * Code to start this widget.
     *
     * @return void
     */
    public function init(Theme $theme)
    {

    }

    /**
     * Logic given to a widget and pass to widget's view.
     *
     * @return array
     */
    public function run()
    {

        if(isset($this->attributes['nav_id']) && $this->attributes['nav_id'])
        {
            $nav = app(NavRepository::class)->where('id',$this->attributes['nav_id'])->first();
        }else{
            $route_name = Route::currentRouteName();
            $nav = app(NavRepository::class)->where('slug',$route_name)->first();
        }

        if(!$nav)
        {
            $breadcrumbs = [];
        }
        else{
            $breadcrumbs = app(NavRepository::class)->navList($nav->id);
        }
        if(isset($this->attributes['product_category_id']) && $this->attributes['product_category_id'] && !Input::get('search_key'))
        {
            $product_category_breadcrumbs = app(ProductCategoryRepository::class)->getBreadCrumbs([],$this->attributes['product_category_id']);
            $breadcrumbs = array_merge($breadcrumbs,$product_category_breadcrumbs);

        }
        if(isset($this->attributes['top_product_category_id']) && $this->attributes['top_product_category_id'] && !Input::get('search_key'))
        {

            $top_product_category = app(ProductCategory::class)->where('id',$this->attributes['top_product_category_id'])->first();
            if($top_product_category)
            {
                $arr[] = [
                    'is_menu' => 1,
                    'name' => $top_product_category->name ,
                    'url' => '/product?product_category_id='.$top_product_category->id,
                    'class' => 'top_product_category_name'
                ];
                $breadcrumbs = array_merge($breadcrumbs,$arr);
            }


        }
        $count = count($breadcrumbs);

        $this->setAttribute('breadcrumbs',$breadcrumbs);
        $this->setAttribute('count',$count);

        $attrs = $this->getAttributes();

        return $attrs;
    }

}