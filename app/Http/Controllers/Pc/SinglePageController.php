<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use App\Repositories\Eloquent\QuestionRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class SinglePageController extends BaseController
{
    public function __construct(
        PageRepository $page_repository,
        PageCategoryRepository $category_repository
    )
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
    }
    public function about(Request $request)
    {
        $route_name = Route::currentRouteName();
        $nav = app(NavRepository::class)->where('slug',$route_name)->first();

        $navs = app(NavRepository::class)->where('parent_id',$nav->parent_id)->get();

        $questions = app(QuestionRepository::class)->orderBy('id','asc')->get();

        return $this->response->title("关于我们")
            ->view('about')
            ->data(compact('nav','navs','questions'))
            ->output();
    }
    public function IndustrialEnzyme(Request $request)
    {
        $slug = 'industrial_enzyme';
        $page =  $this->page_repository->findBySlug($slug);

        $route_name = Route::currentRouteName();
        $nav = app(NavRepository::class)->where('slug',$route_name)->first();

        $navs = app(NavRepository::class)->where('parent_id',$nav->parent_id)->get();

        return $this->response->title($page['title'])
            ->view('industrial_enzyme')
            ->data(compact('page','slug','nav','navs'))
            ->output();
    }
}
