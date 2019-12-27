<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return view('dashboard.index');
        } else {
            return redirect()->route('admin.login');
        }
    }
}
