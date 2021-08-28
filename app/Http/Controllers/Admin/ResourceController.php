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
        $product_count = Product::count();
        $feedbacks = Feedback::orderBy('id','desc')->limit(10)->get();
        $today_feedback_count = Feedback::whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->count();
        $feedback_count = Feedback::count();
        return $this->response->title(trans('app.home'))
            ->view('home')
            ->data(compact('news_count','product_count','feedbacks','today_feedback_count','feedback_count'))
            ->output();
    }
    public function dashboard()
    {
        return $this->response->title('测试')
            ->view('dashboard')
            ->output();
    }
}
