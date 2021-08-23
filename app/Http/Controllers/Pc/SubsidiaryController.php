<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\SubsidiaryRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Subsidiary;
use App\Http\Controllers\Pc\Controller as BaseController;

class SubsidiaryController extends BaseController
{
    public function __construct(
        SubsidiaryRepository $subsidiary_repository
    )
    {
        parent::__construct();
        $this->repository = $subsidiary_repository;

    }
    public function index(Request $request)
    {
        $first_subsidiary = $this->repository->where('parent_id',0)->orderBy('order','desc')->orderBy('id','asc')->first();
        if(!$first_subsidiary)
        {
            return redirect('/');
        }
        return  redirect()->route('pc.subsidiary.show',['id' => $first_subsidiary->id]);
    }

    public function show(Request $request ,Subsidiary $subsidiary)
    {
        $top_subsidiaries = $this->repository->where('parent_id',0)->orderBy('order','desc')->orderBy('id','asc')->get();

        $children_subsidiaries = $this->repository->where('parent_id',$subsidiary->id)->orderBy('order','desc')->orderBy('id','asc')->get();
        return $this->response->title($subsidiary['title'])
            ->view('subsidiary.show')
            ->data(compact('subsidiary','top_subsidiaries','children_subsidiaries'))
            ->output();
    }

}
