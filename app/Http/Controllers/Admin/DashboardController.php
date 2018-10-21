<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:is_admin');
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.dashboard');
    }
}
