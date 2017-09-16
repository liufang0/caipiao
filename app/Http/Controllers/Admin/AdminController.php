<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drawing;
use App\Models\Recharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function hk_notice()
    {
        $return['status'] = 0;
        if (Recharge::where('status', 1)->count() > 0)
            $return['status'] = 1;

        return $return;
    }

    public function tk_notice()
    {
        $return['status'] = 0;
        if (Drawing::where('status', 1)->count() > 0)
            $return['status'] = 1;

        return $return;
    }
}
