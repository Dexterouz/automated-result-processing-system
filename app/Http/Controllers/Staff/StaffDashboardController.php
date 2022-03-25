<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.staff');
    }

    public function index()
    {
        $staff = auth('staff')->user();
        return view('staff.dashboard', compact('staff'));
    }
}
