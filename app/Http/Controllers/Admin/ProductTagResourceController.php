<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\ProductTag;
use App\Repositories\Eloquent\ProductTagRepository;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class ProductTagResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type ProductTagRepository $product_tag
     *
     */
    public function __construct(ProductTagRepository $product_tag)
    {
        parent::__construct();
        $this->repository = $product_tag;
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
        return $this->response->title(trans('product_tag.name'))
            ->view('product_tag.index')
            ->output();
    }
    public function create(Request $request)
    {
        $product_tag = $this->repository->newInstance([]);

        return $this->response->title(trans('product_tag.name'))
            ->view('product_tag.create')
            ->data(compact('product_tag'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $product_tag = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product_tag.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product_tag/' ))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product_tag/'))
                ->redirect();
        }
    }
    public function show(Request $request,ProductTag $product_tag)
    {
        if ($product_tag->exists) {
            $view = 'product_tag.show';
        } else {
            $view = 'product_tag.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('product_tag.name'))
            ->data(compact('product_tag'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,ProductTag $product_tag)
    {
        try {
            $attributes = $request->all();

            $product_tag->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('product_tag.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product_tag/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product_tag/'))
                ->redirect();
        }
    }
    public function destroy(Request $request,ProductTag $product_tag)
    {
        try {
            $product_tag->forceDelete();

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product_tag.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('product_tag'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product_tag'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product_tag.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('product_tag'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product_tag'))
                ->redirect();
        }
    }

}