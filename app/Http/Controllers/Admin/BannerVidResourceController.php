<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\BannerVid;
use App\Repositories\Eloquent\BannerVidRepository;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class BannerVidResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type BannerVidRepository $bannerVidRepository
     *
     */
    public function __construct(BannerVidRepository $bannerVidRepository)
    {
        parent::__construct();
        $this->repository = $bannerVidRepository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request){
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->get();
            return $this->response
                ->success()
                ->data($data->toArray())
                ->output();
        }
        return $this->response->title(trans('banner_vid.name'))
            ->view('banner_vid.index')
            ->output();
    }
    public function create(Request $request)
    {
        $banner_vid = $this->repository->newInstance([]);

        return $this->response->title(trans('banner_vid.name'))
            ->view('banner_vid.create')
            ->data(compact('banner_vid'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $banner_vid = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('banner_vid.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('banner_vid/' ))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('banner_vid/'))
                ->redirect();
        }
    }
    public function show(Request $request,BannerVid $banner_vid)
    {
        if ($banner_vid->exists) {
            $view = 'banner_vid.show';
        } else {
            $view = 'banner_vid.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('banner_vid.name'))
            ->data(compact('banner_vid'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,BannerVid $banner_vid)
    {
        try {
            $attributes = $request->all();

            $banner_vid->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('banner_vid.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('banner_vid/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('banner_vid/'))
                ->redirect();
        }
    }
    public function destroy(Request $request,BannerVid $banner_vid)
    {
        try {
            $banner_vid->forceDelete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('banner_vid.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('banner_vid'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('banner_vid'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('banner_vid.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('banner_vid'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('banner_vid'))
                ->redirect();
        }
    }

}