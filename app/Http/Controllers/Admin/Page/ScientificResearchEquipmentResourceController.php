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
class ScientificResearchEquipmentResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
        $this->slug = 'scientific_research_equipment';
        $this->category_id = 27;
        $this->url = guard_url('page/scientific_research_equipment');
        $this->title = trans('scientific_research_equipment.name');
        $this->view_folder = 'page.common';
    }
}