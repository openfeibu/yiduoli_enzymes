<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Models\Page;
use App\Models\Product;
use App\Models\Video;
use Route,Auth;
use App\Http\Controllers\Admin\Controller as BaseController;
use App\Traits\AdminUser\AdminUserPages;
use App\Http\Response\ResourceResponse;
use App\Traits\Theme\ThemeAndViews;
use App\Traits\AdminUser\RoutesAndGuards;

class ResourceController extends BaseController
{
    use AdminUserPages,ThemeAndViews,RoutesAndGuards;

    public function __construct()
    {
        parent::__construct();
        if (!empty(app('auth')->getDefaultDriver())) {
            $this->middleware('auth:' . app('auth')->getDefaultDriver());
           // $this->middleware('role:' . $this->getGuardRoute());
            $this->middleware('permission:' .Route::currentRouteName());
            $this->middleware('active');
        }
        $this->response = app(ResourceResponse::class);
        $this->setTheme();
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $news_count = Page::where('category_id',1)->count();
        $video_count = Video::count();
        $product_count = Product::count();
        $company_announcement_count = Page::where('category_id',30)->count();
        $feedbacks = Feedback::orderBy('id','desc')->limit(10)->get();
        return $this->response->title(trans('app.home'))
            ->view('home')
            ->data(compact('news_count','video_count','product_count','company_announcement_count','feedbacks'))
            ->output();
    }
    public function dashboard()
    {
        return $this->response->title('测试')
            ->view('dashboard')
            ->output();
    }
}
