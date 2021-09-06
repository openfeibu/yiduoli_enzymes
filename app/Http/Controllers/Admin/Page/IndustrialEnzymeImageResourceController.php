<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\SinglePageResourceController as BaseController;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class IndustrialEnzymeImageResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'industrial_enzyme_image';
        $this->category_id = 2;
        $this->url = guard_url('page/industrial_enzyme_image/show');
        $this->title = trans('page.industrial_enzyme_image.name');
        $this->view_folder = 'page.industrial_enzyme_image';
    }
}