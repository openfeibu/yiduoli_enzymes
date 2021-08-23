<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\FeedbackRepository;

class FeedbackResourceController extends BaseController
{
    public function __construct(FeedbackRepository $feedback)
    {
        parent::__construct();
        $this->repository = $feedback;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $feedbacks = $this->repository
                ->orderBy('id','desc')
                ->paginate($limit);
            return $this->response
                ->success()
                ->count($feedbacks->total())
                ->data($feedbacks->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('feedback.index')
            ->output();
    }
    public function create(Request $request)
    {
        $feedback = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('feedback.create')
            ->data(compact('feedback'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $feedback = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('feedback.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('feedback/' . $feedback->id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('feedback'))
                ->redirect();
        }
    }
    public function show(Request $request,Feedback $feedback)
    {
        if ($feedback->exists) {
            $view = 'feedback.show';
        } else {
            $view = 'feedback.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('feedback.name'))
            ->data(compact('feedback'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Feedback $feedback)
    {
        try {
            $attributes = $request->all();

            $feedback->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('feedback.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('feedback/' . $feedback->id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('feedback/' . $feedback->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Feedback $feedback)
    {
        try {
            $this->repository->forceDelete([$feedback->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('feedback.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('feedback'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('feedback'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('feedback.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('feedback'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('feedback'))
                ->redirect();
        }
    }
}
