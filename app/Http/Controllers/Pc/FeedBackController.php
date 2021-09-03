<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\FeedbackRepository;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth,Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;
use Mail;

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
            'content' => "required|min:4",
        ];
        $messages = [
            'name.required' => '姓名必填！',
            'phone.required' => '手机号码必填！',
            'email.required' => '邮箱必填！',
            'email.email' => '邮箱格式不正确！',
            'content.required' => '内容必填！',
            'content.min' => '内容不得少于4个字！'
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

        $html = "<div class='1'>您好，有新的留言，请注意查看！<a href='".config('app.url')."/admin/feedback' target='_blank'>管理后台</a>";
        $html .="<p>姓名：".$attributes['name']."</p>";
        $html .="<p>手机号码：".$attributes['phone']."</p>";
        $html .="<p>留言内容：".$attributes['content']."</p>";
        $email = setting('notice_email');
        $send = Mail::html($html, function($message) use($email) {
            $message->from(config('mail.from')['address'],config('mail.from')['name']);
            $message->subject('[留言]');
            $message->to($email);
        });

        return $this->response->message("感谢您的留言！")
            ->status("success")
            ->code(0)
            ->url(url('/feedback/'))
            ->redirect();
    }
}
