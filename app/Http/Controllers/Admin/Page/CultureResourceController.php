<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\PageBaseResourceController as BaseController;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Repositories\Eloquent\PageCategoryRepositoryInterface;
use App\Http\Requests\PageRequest;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class CultureResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type PageRepositoryInterface $page
     * @param type PageCategoryRepositoryInterface $category
     */
    public function __construct(PageRepositoryInterface $page,
                                PageCategoryRepositoryInterface $category)
    {
        parent::__construct($page,$category);
        $this->category_slug = 'culture';
        $this->main_url = 'page/culture';
        $this->view_folder = $this->category_slug;
        $category_data = $category->where(['slug' => $this->category_slug])->first();
        $this->category_data = $category_data;
        $this->category_id = $category_data['id'];
        $this->repository = $page;
        $this->repository = $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }
    public function index(PageRequest $request){
        $limit = $request->input('limit',config('app.limit'));

        $childs = $this->category_repository->where(['parent_id' => $this->category_id])->all(['id'])->toArray();
        if($childs){
            $child_ids = array_column($childs, 'id');
            $this->repository = $this->repository->whereIn('category_id' , $child_ids);
        }else{
            $this->repository = $this->repository->where(['category_id' => $this->category_id]);
        }

        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->setPresenter(\App\Repositories\Presenter\PageListPresenter::class)
                ->orderBy('order','asc')
                ->orderBy('id','asc')
                ->getDataTable($limit);
            return $this->response
                ->success()
                ->count($data['recordsTotal'])
                ->data($data['data'])
                ->output();
        }
        return $this->response->title(trans($this->category_slug.'.name'))
            ->view($this->category_slug.'.index')
            ->output();
    }
    public function show(PageRequest $request,Page $culture)
    {
        return parent::show($request,$culture);
    }
    public function update(PageRequest $request,Page $culture)
    {
        return parent::update($request,$culture);
    }
    public function destroy(PageRequest $request,Page $culture)
    {
        return parent::destroy($request,$culture);
    }

}