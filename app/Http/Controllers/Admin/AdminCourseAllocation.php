<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Session;
use App\Models\Staff;
use Illuminate\Http\Request;

class AdminCourseAllocation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $semester = Semester::where('default', 'yes')->get();
        $session = Session::where('default', 'yes')->get();

        foreach ($semester as $default) $semester = $default->semester;
        foreach ($session as $default) $session = $default->session;

        $staffs = Staff::all();
        $level_100 = Course::where(['level' => '100l', 'semester' => $semester])->get();
        $level_200 = Course::where(['level' => '200l', 'semester' => $semester])->get();
        $level_300 = Course::where(['level' => '300l', 'semester' => $semester])->get();
        $level_400 = Course::where(['level' => '400l', 'semester' => $semester])->get();
        return view('admin.course-allocation', [
            'semester' => $semester,
            'session' => $session,
            'staffs' => $staffs,
            'level_100' => $level_100,
            'level_200' => $level_200,
            'level_300' => $level_300,
            'level_400' => $level_400,
        ]);
    }

    public function assign(Request $request, Course $course)
    {
        if ($request->action == "assign") {
            $this->validate($request, [
                'staff' => ['required']
            ]);

            $course->update([
                'staff_id' => $request->staff,
            ]);

            return back()->with('success', 'Course assigned successfully!');
        } else {
            $this->validate($request, [
                'staff' => ['required']
            ]);

            $course->update([
                'staff_id' => 0,
            ]);

            return back()->with('success', 'Course assigned reset successfully!');
        }
    }
}
