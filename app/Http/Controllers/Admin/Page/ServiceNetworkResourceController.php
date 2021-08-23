<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\SinglePageResourceController as BaseController;
use App\Http\Requests\PageRequest;
use App\Repositories\Eloquent\PageRepository;
use Illuminate\Http\Request;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class ServiceNetworkResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'service_network';
        $this->category_id = 23;
        $this->url = guard_url('page/service_network');
        $this->title = trans('service_network.name');
        $this->view_folder = 'page.common';
    }
}