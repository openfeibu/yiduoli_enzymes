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
class CompanyAnnouncementResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'company_announcement';
        $this->category_id = 30;
        $this->url = guard_url('page/company_announcement');
        $this->title = trans('company_announcement.name');
        $this->view_folder = 'page.common';
    }
}