<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    public function announcementDashboard()
    {
        return view('announcement.index');
    }

    public function attendanceDashboard()
    {
        return view('attendance.index');
    }

    public function reportDashboard()
    {
        return view('report.index');
    }
}
