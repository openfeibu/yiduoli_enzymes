<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Question;
use App\Repositories\Eloquent\QuestionRepository;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class QuestionResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type QuestionRepository $question
     *
     */
    public function __construct(QuestionRepository $question)
    {
        parent::__construct();
        $this->repository = $question;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request){
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->orderBy('id','asc')
                ->get();
            return $this->response
                ->success()
                ->data($data->toArray())
                ->output();
        }
        return $this->response->title(trans('question.name'))
            ->view('question.index')
            ->output();
    }
    public function create(Request $request)
    {
        $question = $this->repository->newInstance([]);

        return $this->response->title(trans('question.name'))
            ->view('question.create')
            ->data(compact('question'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $question = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('question.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('question' ))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function show(Request $request,Question $question)
    {
        if ($question->exists) {
            $view = 'question.show';
        } else {
            $view = 'question.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('question.name'))
            ->data(compact('question'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Question $question)
    {
        try {
            $attributes = $request->all();

            $question->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('question.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('question'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function destroy(Request $request,Question $question)
    {
        try {
            $question->forceDelete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }

}