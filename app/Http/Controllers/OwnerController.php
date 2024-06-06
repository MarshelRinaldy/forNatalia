<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
     public function dashboard_owner(){
        return view('owner.dashboardOwner');
    }
}
