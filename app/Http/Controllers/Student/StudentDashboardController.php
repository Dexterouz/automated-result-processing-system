<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }

    public function index()
    {
        $semester = Semester::where('default', 'yes')->get();
        $session = Session::where('default', 'yes')->get();
        $student = auth('student')->user();

        foreach ($semester as $default) $semester = $default->semester;
        foreach ($session as $default) $session = $default->session;

        return view('student.dashboard', [
            'semester' => $semester,
            'session' => $session,
            'student' => $student,
        ]);
    }
}
