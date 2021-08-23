<?php

namespace App\Http\Controllers\Pc;

use App\Models\Page;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class LeftPageBaseController extends BaseController
{
    public function __construct(
        PageRepository $page_repository,
        PageCategoryRepository $category_repository
    )
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
        $this->route_slug = $this->category_slug = $this->main_url = $this->view_folder = '';
    }

    public function index(Request $request)
    {
        $pages = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->get();
        $page = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->first();

        return $this->response->title($page->title)
            ->view($this->view_folder.'.index')
            ->data([
                'pages' => $pages,
                'page' => $page,
                'route_slug' => $this->route_slug,
            ])
            ->output();
    }

    public function show(Request $request,Page $page)
    {
        $pages = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->get();

        return $this->response->title($page->title)
            ->view($this->view_folder.'.show')
            ->data([
                'pages' => $pages,
                'page' => $page,
                'route_slug' => $this->route_slug,
            ])
            ->output();
    }
}
