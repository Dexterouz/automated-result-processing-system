<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminEditCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Course $course)
    {
        return view('admin.edit-course', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'course_code' => ['required'],
            'course_title' => ['required', 'string'],
            'level' => ['required', 'string'],
            'semester' => ['required', 'string'],
            'unit_load' => ['required', 'string'],
        ]);

        $course->update([
            'course_code' => $request->course_code,
            'course_title' => $request->course_title,
            'level' => $request->level,
            'semester' => $request->semester,
            'unit_load' => $request->unit_load,
        ]);

        return back()->with('success', 'Course updated successfully!');
    }
}
