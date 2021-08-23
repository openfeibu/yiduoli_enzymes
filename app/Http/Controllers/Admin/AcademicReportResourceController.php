<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\AcademicReportRepository;
use App\Models\AcademicReport;

/**
 * Resource controller class for academic_report.
 */
class AcademicReportResourceController extends BaseController
{

    /**
     * Initialize academic_report resource controller.
     *
     * @param type AcademicReportRepository $academic_report
     *
     */
    public function __construct(AcademicReportRepository $academic_report)
    {
        parent::__construct();
        $this->repository = $academic_report;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }

    /**
     * Display a list of academic_report.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit');
        $product_id = $request->get('product_id','');
        $reports = $this->repository;
        if($product_id)
        {
            $reports = $reports->where('product_id',$product_id);
        }
        $reports = $reports->orderBy('updated_at','desc')->orderBy('id','desc')->paginate($limit);

        if ($this->response->typeIs('json')) {
            return $this->response
                ->success()
                ->count($reports->total())
                ->data($reports->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('academic_report.names'))
            ->view('academic_report.index', true)
            ->data([
                'product_id' => $product_id
            ])
            ->output();
    }

    /**
     * Display academic_report.
     *
     * @param Request $request
     * @param AcademicReport   $academic_report
     *
     * @return Response
     */
    public function show(Request $request, AcademicReport $academic_report)
    {

        if ($academic_report->exists) {
            $view = 'academic_report.show';
        } else {
            $view = 'academic_report.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('academic_report.name'))
            ->data(compact('academic_report'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new academic_report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $product_id = $request->get('product_id','');
        $academic_report = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('academic_report.name')) 
            ->view('academic_report.create', true) 
            ->data(compact('academic_report','product_id'))
            ->output();
    }

    /**
     * Create new academic_report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $attributes              = $request->all();

            $academic_report                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('academic_report.name')]))
                ->http_code(204)
                ->status('success')
                ->url(guard_url('academic_report?product_id='.$academic_report->product_id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('academic_report?product_id='.$request->get('product_id')))
                ->redirect();
        }

    }

    /**
     * Update the academic_report.
     *
     * @param Request $request
     * @param AcademicReport   $academic_report
     *
     * @return Response
     */
    public function update(Request $request, AcademicReport $academic_report)
    {
        try {
            $attributes = $request->all();

            $academic_report->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('academic_report.name')]))
                ->http_code(204)
                ->status('success')
                ->url(guard_url('academic_report?product_id=' . $academic_report->product_id))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('academic_report?product_id=' . $academic_report->product_id))
                ->redirect();
        }

    }

    /**
     * Remove the academic_report.
     *
     * @param Request $request
     * @param AcademicReport   $academic_report
     *
     * @return Response
     */
    public function destroy(Request $request, AcademicReport $academic_report)
    {
        try {

            $academic_report->forceDelete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('academic_report.name')]))
                ->http_code(202)
                ->status('success')
                ->url(guard_url('academic_report/academic_report/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('academic_report/academic_report/' . $academic_report->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple academic_report.
     *
     * @param Request $request
     * @param $type
     *
     * @return Response
     */
    public function delete(Request $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->forceDelete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('academic_report.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('academic_report/academic_report'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('academic_report/academic_report'))
                ->redirect();
        }

    }

    /**
     * Restore deleted academic_reports.
     *
     * @param Request   $request
     *
     * @return Response
     */
    public function restore(Request $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('academic_report.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('academic_report/academic_report'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('academic_report/academic_report/'))
                ->redirect();
        }

    }

}