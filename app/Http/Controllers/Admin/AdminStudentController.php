<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::paginate(50);
        return view('admin.students', compact('students'));
    }

    public function delete(Student $student)
    {
        $student->delete();

        return back()->with('success', 'Student deleted successfully!');
    }
}
