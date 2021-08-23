<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class InvestorRelationController extends BaseController
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
    public function company_information(Request $request)
    {
        $slug = 'company_information';
        $page =  $this->page_repository->findBySlug($slug);

        return $this->response->title($page['title'])
            ->view('page.show')
            ->data(compact('page'))
            ->output();
    }
    public function company_announcement(Request $request)
    {
        $slug = 'company_announcement';
        $page =  $this->page_repository->findBySlug($slug);
        return $this->response->title($page['title'])
            ->setReferrer('never')
            ->view('page.show')
            ->data(compact('page'))
            ->output();
    }
    public function interactive(Request $request)
    {
        $slug = 'interactive';
        $page =  $this->page_repository->findBySlug($slug);

        return $this->response->title($page['title'])
            ->setReferrer('never')
            ->view('page.show')
            ->data(compact('page'))
            ->output();
    }
    /*
    public function company_announcement(Request $request)
    {
        $slug = 'company_announcement';
        $category = $this->category_repository->where(['slug' => $slug])->first();

        $pages = $this->page_repository
            ->where(['category_id' => $category->id])
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->paginate(10);

        return $this->response->title($category['name'])
            ->view('investor_relations.company_announcement')
            ->data(compact('pages'))
            ->output();
    }
    */
}
