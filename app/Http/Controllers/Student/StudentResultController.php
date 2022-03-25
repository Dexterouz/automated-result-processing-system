<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Semester;
use App\Models\Session;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }

    public function index()
    {
        $student = auth('student')->user();
        $sessions = Session::all();

        return view('student.results', [
            'student' => $student,
            'sessions' => $sessions,
        ]);
    }

    public function retrieve(Request $request)
    {
        $student = auth('student')->user();
        $this->validate($request, [
            'session' => ['required'],
            'semester' => ['required'],
            'level' => ['required'],
        ]);

        $results = Result::where('matric_no', $student->matric_no)
            ->where('session', $request->session)
            ->where('semester', $request->semester)
            ->where('level', $request->level)
            ->get();

        return view('student.results', compact('results'));
    }
}
