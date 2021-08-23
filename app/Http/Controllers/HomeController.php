<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Redirect;
use Log;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function href(Request $request)
    {
        $url = $request->url;

        echo '<meta name="referrer" content="never"><meta http-equiv="refresh" content="0; URL='.$url.'">';

        exit();
        header('location:'.$url);exit();
        return redirect($url);
    }

}
