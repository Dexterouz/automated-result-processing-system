<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class StaffCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.staff');
    }

    public function index()
    {
        $staff = auth('staff')->user();
        $session = Session::where('default', 'yes')->first()->session;
        $semester = Semester::where('default', 'yes')->first()->semester;

        $courses = Course::where('staff_id', $staff->id)
            ->where('semester', $semester)
            ->get();

        return view('staff.courses', compact('courses', 'session'));
    }
}
