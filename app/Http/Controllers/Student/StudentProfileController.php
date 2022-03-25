<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }

    public function index()
    {
        $student = auth('student')->user();
        return view('student.profile', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required'],
            'dob' => ['required'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Your profile has been updated!');
    }
}
