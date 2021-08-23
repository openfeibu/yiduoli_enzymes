<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class CustomerServiceController extends BaseController
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
    public function service_concept(Request $request)
    {
        $slug = 'service_concept';
        $page =  $this->page_repository->findBySlug($slug);

        return $this->response->title($page['title'])
            ->view('page.show')
            ->data(compact('page'))
            ->output();
    }
    public function service_network(Request $request)
    {
        $slug = 'service_network';
        $page =  $this->page_repository->findBySlug($slug);

        return $this->response->title($page['title'])
            ->view('page.show')
            ->data(compact('page'))
            ->output();
    }
    public function contact_us()
    {
        $nav = get_nav();
        return $this->response->title($nav['name'])
            ->view('customer_service.contact_us')
            ->output();
    }
    public function feedback()
    {

    }
}
