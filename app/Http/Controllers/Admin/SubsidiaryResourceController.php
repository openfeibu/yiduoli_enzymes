<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\SubsidiaryRepository;
use Tree;

class SubsidiaryResourceController extends BaseController
{
    public function __construct(SubsidiaryRepository $subsidiary)
    {
        parent::__construct();
        $this->repository = $subsidiary;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $subsidiaries = $this->repository->orderBy('order','desc')->orderBy('id','asc')->get()->toArray();
            $subsidiaries = Tree::getTree($subsidiaries);
            return $this->response
                ->success()
                ->data($subsidiaries)
                ->output();
        }

        return $this->response->title(trans('subsidiary.names'))
            ->view('subsidiary.index', true)
            ->output();
    }
    /*
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $subsidiaries = $this->repository
                ->orderBy('order','desc')
                ->orderBy('id','asc')
                ->get();

            return $this->response
                ->success()
                ->data($subsidiaries->toArray())
                ->output();
        }
        return $this->response->title(trans('subsidiary.name'))
            ->view('subsidiary.index')
            ->output();
    }
    */
    public function create(Request $request)
    {
        $subsidiary = $this->repository->newInstance([]);
        $subsidiaries = $this->repository->getAllSubsidiaries();
        $subsidiaries = Tree::getTree($subsidiaries);
        $parent_id = $request->get('parent_id',0);

        return $this->response->title(trans('subsidiary.names'))
            ->view('subsidiary.create')
            ->data(compact('subsidiary','subsidiaries','parent_id'))
            ->output();
    }

    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $subsidiary = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('subsidiary.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('subsidiary'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
    public function show(Request $request,Subsidiary $subsidiary)
    {
        if ($subsidiary->exists) {
            $view = 'subsidiary.show';
        } else {
            $view = 'subsidiary.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('subsidiary.name'))
            ->data(compact('subsidiary'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Subsidiary $subsidiary)
    {
        try {
            $attributes = $request->all();
            isset($attributes['name']) ? $attributes['name'] = trim($attributes['name'], chr(0xc2) . chr(0xa0)) : '';
            $subsidiary->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('subsidiary.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('subsidiary' ))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('subsidiary/' . $subsidiary->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Subsidiary $subsidiary)
    {
        try {
            $sub_ids = $this->repository->getSubIds($subsidiary->id);
            Subsidiary::whereIn('id',$sub_ids)->delete();
            $this->repository->forceDelete([$subsidiary->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('subsidiary.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('subsidiary'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('subsidiary.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('subsidiary'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('subsidiary'))
                ->redirect();
        }
    }
}
