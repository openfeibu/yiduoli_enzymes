<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\SubsidiaryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Log;

class SubsidiaryController extends BaseController
{
    public function __construct(SubsidiaryRepository $subsidiary)
    {
        parent::__construct();
        $this->repository = $subsidiary;
    }

    public function getSubsidiaryTree(Request $request)
    {
        $subsidiaries = $this->repository->getSelectTree();
        return $subsidiaries;
    }
}
