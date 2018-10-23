<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller
{
    //

    public function index()
    {
    	// $dashboards = Dashboard::orderBy('created', 'desc')->get();

    	return view('dashboard.index');
    }
}
