<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\FeedbackRepository;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth,Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class FeedBackController extends BaseController
{
    public function __construct(FeedbackRepository $feedbackRepository)
    {
        parent::__construct();
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index(Request $request)
    {
        $nav = get_nav();
        return $this->response->title($nav['name'])
            ->view('feedback.index')
            ->output();
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $ip = $request->getClientIp();

        $attributes['ip'] = $ip;
        $last = $this->feedbackRepository->where('ip',$ip)->orderBy('id','desc')->first();
        if($last && date('Y-m-d H:i:s',strtotime('-60second')) < $last->created_at)
        {
            return $this->response->message("短时间内请勿多次提交！")
                ->status("error")
                ->code(400)
                ->url(url('/feedback/'))
                ->redirect();
        }
        $rules = [
            'name' => "required",
            'phone' => "required|regex:/^1[3456789][0-9]{9}$/",
            //'email' => "required|email",
            'content' => "required|min:20",
        ];
        $messages = [
            'name.required' => '姓名必填！',
            'phone.required' => '手机号码必填！',
            'email.required' => '邮箱必填！',
            'email.email' => '邮箱格式不正确！',
            'content.required' => '内容必填！',
            'content.min' => '内容不得少于10个字！'
        ];
        $validator = Validator::make($attributes, $rules,$messages);
        if ($validator->fails()) {
            return $this->response->message($validator->errors()->first())
                ->status("error")
                ->code(400)
                ->url(url('/feedback/'))
                ->redirect();
        }
        $this->feedbackRepository->create($attributes);

        return $this->response->message("感谢您的留言！")
            ->status("success")
            ->code(0)
            ->url(url('/feedback/'))
            ->redirect();
    }
}
