<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\RegisteredCourse;
use App\Models\Session;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RegisteredCoursesExport implements FromView
{
    public function view(): View
    {
        $staff = auth('staff')->user();

        $course = Course::where('staff_id', $staff->id)->first();
        $registered_courses = RegisteredCourse::where('course_id', $course->id)->get();

        return view('exports.template', [
            'registered_courses' => $registered_courses,
        ]);
    }
}
