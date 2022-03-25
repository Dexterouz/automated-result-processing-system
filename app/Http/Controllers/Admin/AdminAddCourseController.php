<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminAddCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.add-course');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'course_code' => ['required'],
            'course_title' => ['required', 'string'],
            'level' => ['required', 'string'],
            'semester' => ['required', 'string'],
            'unit_load' => ['required', 'string'],
        ]);

        Course::create([
            'course_code' => $request->course_code,
            'course_title' => $request->course_title,
            'level' => $request->level,
            'semester' => $request->semester,
            'unit_load' => $request->unit_load,
        ]);

        return back()->with('success', 'New course added successfully!');
    }
}
