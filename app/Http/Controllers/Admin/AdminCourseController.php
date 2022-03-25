<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.courses');
    }

    public function show(Request $request, $level)
    {
        $courses = Course::where(['level' => $level])->get();
        return view('admin.level', compact('courses', 'level'));
    }
}
