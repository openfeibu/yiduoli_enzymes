<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\VideoRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class VideoController extends BaseController
{
    public function __construct(VideoRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $hot_recommend_video = $this->repository
            ->where('hot_recommend',1)
            ->orderBy('hot_recommend','desc')
            ->orderBy('order','desc')
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')->first();

        $videos = $this->repository;
        if($hot_recommend_video)
        {
            $videos = $this->repository->where('id','<>',$hot_recommend_video->id);
        }

        $videos = $videos->orderBy('hot_recommend','desc')
            ->orderBy('order','desc')
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->paginate(9);

        return $this->response->title(trans('video.name'))
            ->view('video.index')
            ->data(compact('videos','hot_recommend_video'))
            ->output();
    }


}
