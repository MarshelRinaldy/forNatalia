<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoController extends Controller
{
    public function dashboard_mo(){
        return view('mo.dashboardMo');
    }
}
