<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminEditStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Student $student)
    {
        return view('admin.edit-student', compact('student'));
    }

    public function formatImage($request)
    {
        // image name
        $student_name = $request->first_name." ".$request->last_name;
        $exp_str = explode(' ', $student_name);
        $image_name = strtolower(implode('-', $exp_str));

        $image = $request->file('image');
        $new_name = $image_name."-".substr(uniqid(), -4, 4).".".$image->extension();
        $image->move('images/student', $new_name);

        return $new_name;
    }


    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'programme' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'level' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'programme' => $request->programme,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'level' => $request->level,
            'address' => $request->address,
            'image' => $request->hasFile('image') ? $this->formatImage($request) : $student->image,
        ]);

        return back()->with('success', 'Student profile updated successfully!');
    }
}
