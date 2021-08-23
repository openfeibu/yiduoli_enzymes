<?php

namespace App\Repositories\Eloquent;

use App\Models\Subsidiary;
use App\Repositories\Eloquent\SubsidiaryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class SubsidiaryRepository extends BaseRepository implements SubsidiaryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.subsidiary.subsidiary.search');
    }
    public function model()
    {
        return config('model.subsidiary.subsidiary.model');
    }
    public function getAll()
    {
        return $this->model
            ->orderBy('order','desc')
            ->orderBy('id','asc')
            ->get();
    }
    public function getAllSubsidiaries()
    {
        return $this->orderBy('order','desc')->orderBy('id','asc')->get(['*','name as title'])->toArray();

    }
    public function getSelectTree($parent_id=0)
    {

        $data = [];
        $subsidiaries = $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
        foreach ($subsidiaries as $key => $subsidiary)
        {
            $data[$key] = [
                'title' => $subsidiary->name,
                'label' => $subsidiary->name,
                'id' => $subsidiary->id,
                'parent_id' => $subsidiary->parent_id,
                'order' => $subsidiary->order,
                'spread' => false,
            ];
            $data[$key]['children'] = $this->getSelectTree($subsidiary->id);
        }
        return $data;
    }
    public function getTree($parent_id=0)
    {

        $data = [];
        $subsidiaries = $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
        foreach ($subsidiaries as $key => $subsidiary)
        {
            $data[$key] = [
                'title' => $subsidiary->name,
                'name' => $subsidiary->name,
                'label' => $subsidiary->name,
                'id' => $subsidiary->id,
                'parent_id' => $subsidiary->parent_id,
                'order' => $subsidiary->order,
                'spread' => false,
                'content' => $subsidiary->content,
                'url' => $subsidiary->url,
            ];
            $data[$key]['children'] = $this->getSelectTree($subsidiary->id);
        }
        return $data;
    }
    public function getSubIds($parent_id=0,$sub_ids=[]){
        $ids = Subsidiary::where('parent_id',$parent_id)->pluck('id')->toArray();
        $sub_ids = array_merge($sub_ids,$ids);
        foreach ($ids as $key=> $id)
        {
            $sub_ids = $this->getSubIds($id,$sub_ids);
        }
        return $sub_ids;
    }
    public function getSubsidiary($parent_id=0)
    {
        return $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
    }

}