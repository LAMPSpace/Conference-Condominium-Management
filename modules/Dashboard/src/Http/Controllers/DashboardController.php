<?php

namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        return view('Dashboard::index', compact('pageTitle'));
    }
}