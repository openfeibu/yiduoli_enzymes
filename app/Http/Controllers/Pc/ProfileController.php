<?php

namespace App\Http\Controllers\Pc;

use App\Models\Page;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\LeftPageBaseController as BaseController;

class ProfileController extends BaseController
{
    public function __construct(
        PageRepository $page_repository,
        PageCategoryRepository $category_repository
    )
    {
        parent::__construct($page_repository,$category_repository);
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
        $this->route_slug = $this->category_slug = 'profile';
        $this->category_data = $category_repository->where(['slug' => $this->category_slug])->first();
        $this->category_id = $this->category_data->id;
        $this->view_folder = 'left_page';
    }

    public function show(Request $request,Page $profile)
    {
        return parent::show($request,$profile);
    }

}
