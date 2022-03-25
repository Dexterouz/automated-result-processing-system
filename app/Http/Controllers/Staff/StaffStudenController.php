<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\RegisteredCourse;
use Illuminate\Http\Request;

class StaffStudenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.staff');
    }

    public function index()
    {
        $staff = auth('staff')->user();
        $course = Course::where('staff_id', $staff->id)->first();
        $registered_courses = RegisteredCourse::where('course_id', $course->id ?? 0)
            ->get();
        return view('staff.students', compact('registered_courses'));
    }
}
