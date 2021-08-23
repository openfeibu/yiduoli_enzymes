<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class ScientificController extends BaseController
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

    public function scientific_research_team(Request $request)
    {
        $slug = 'scientific_research_team';
        return $this->left_page_show($request,$slug);

    }

    public function scientific_research_structure(Request $request)
    {
        $slug = 'scientific_research_structure';
        return $this->left_page_show($request,$slug);
    }
    public function scientific_research_equipment(Request $request)
    {
        $slug = 'scientific_research_equipment';
        return $this->left_page_show($request,$slug);
    }

    public function joint_research_institute(Request $request)
    {
        $slug = 'joint_research_institute';
        $category = $this->category_repository->findBySlug($slug);

        $pages =  $this->page_repository
            ->where('category_id',$category->id)
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->get();
        $nav = get_nav();

        $nav_tab_id = $nav->parent_id;

        return $this->response->title($nav['category'])
            ->view('scientific.left_page_list')
            ->data(compact('pages','slug','nav','nav_tab_id'))
            ->output();
    }

    public function left_page_show($request, $slug)
    {

        $page =  $this->page_repository->findBySlug($slug);
        $nav = get_nav();
        $nav_tab_id = $nav->parent_id;

        return $this->response->title($page['title'])
            ->view('scientific.left_page_show')
            ->data(compact('page','slug','nav','nav_tab_id'))
            ->output();
    }

}
