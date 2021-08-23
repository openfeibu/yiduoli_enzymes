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
class CompanyInformationResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'company_information';
        $this->category_id = 23;
        $this->url = guard_url('page/company_information');
        $this->title = trans('company_information.name');
        $this->view_folder = 'page.common';
    }
}