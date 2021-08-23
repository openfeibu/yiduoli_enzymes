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
class ServiceConceptResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'service_concept';
        $this->category_id = 23;
        $this->url = guard_url('page/service_concept');
        $this->title = trans('service_concept.name');
        $this->view_folder = 'page.common';
    }
}