<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Video;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\VideoRepository;
use Mockery\CountValidator\Exception;
use Illuminate\Http\Request;

/**
 * Resource controller class for video.
 */
class VideoResourceController extends BaseController
{
    /**
     * Initialize video resource controller.
     *
     * @param type VideoRepository $repository
     *
     */
    public $main_url;

    public function __construct(VideoRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->main_url = 'video';

    }
    public function index(Request $request){
        $limit = $request->input('limit',config('app.limit'));

        if ($this->response->typeIs('json')) {
            $videos = $this->repository
                ->orderBy('hot_recommend','desc')
                ->orderBy('order','desc')
                //->orderBy('updated_at','desc')
                ->orderBy('id','desc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($videos->total())
                ->data($videos->toArray()['data'])
                ->output();

        }
        return $this->response->title(trans('video.name'))
            ->view('video.index')
            ->output();
    }
    public function create(Request $request)
    {
       // dd(app(PermissionRepository::class)->menus());exit;
        $video = $this->repository->newInstance([]);

        return $this->response->title(trans('video.name'))
            ->view('video.create')
            ->data(compact('video'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            
            $video = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('video.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url.'/'))
                ->redirect();
        }
    }
    public function show(Request $request,Video $video)
    {
        if ($video->exists) {
            $view = 'video.show';
        } else {
            $view = 'video.create';
        }

        return $this->response->title(trans('video.name'))
            ->data(compact('video'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Video $video)
    {
        try {
            $attributes = $request->all();
            $video->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('video.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url.'/' . $video->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Video $video)
    {
        try {
            $this->repository->forceDelete([$video->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('video.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('video.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function updateRecommend(Request $request)
    {
        $attributes = $request->all();

        if(isset($attributes['home_recommend']))
        {
            $data['home_recommend'] = $attributes['home_recommend'] ? 1 : 0;
        }
        if(isset($attributes['hot_recommend']))
        {
            $data['hot_recommend'] = $attributes['hot_recommend'] ? 1 : 0;
        }
        if(isset($data) && $data)
        {
            $this->repository->update($data,$attributes['id']);
        }

        return $this->response->message(trans('app.success.action'))
            ->success()
            ->redirect();
    }

}