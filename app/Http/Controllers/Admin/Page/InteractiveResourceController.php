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
class InteractiveResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'interactive';
        $this->category_id = 23;
        $this->url = guard_url('page/interactive');
        $this->title = trans('interactive.name');
        $this->view_folder = 'page.common';
    }
}