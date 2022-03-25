<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\RegisteredCourse;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }

    public function index()
    {
        $student = auth('student')->user();
        $semester = Semester::where('default', 'yes')->first()->semester;
        $session = Session::where('default', 'yes')->first()->session;

        $courses = Course::where('level', $student->level)
            ->where('semester', $semester)
            ->get();

        $registered_courses = RegisteredCourse::where('semester', $semester)
            ->where('session', $session)
            ->where('student_id', $student->id)
            ->get();

        $total_unit = 0;
        foreach ($registered_courses as $registered) $total_unit += $registered->course->unit_load;

        return view('student.courses', [
            'student' => $student,
            'semester' => $semester,
            'session' => $session,
            'courses' => $courses,
            'total_unit' => $total_unit,
            'registered_courses' => $registered_courses,
        ]);
    }

    public function register(Request $request)
    {
        $student = auth('student')->user();
        $semester = Semester::where('default', 'yes')->first()->semester;
        $session = Session::where('default', 'yes')->first()->session;

        if ($request->course == null) {
            return back()->with('error', 'You must select a course to register');
        } else {
            foreach ($request->course as $course) {
                RegisteredCourse::create([
                    'course_id' => $course,
                    'student_id' => $student->id,
                    'semester' => $semester,
                    'session' => $session,
                ]);
            }

            return back()->with('success', 'Course registeration successfull!');
        }
    }
}
