<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAddStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.add-student');
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

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:students'],
            'phone' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'programme' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'level' => ['required', 'string'],
            'address' => ['required', 'string'],
            'image' => ['required'],
            'session' => ['required', 'string'],
        ]);

        // generate matric number
        $session = explode('/', $request->session);
        $matric_no = $session[0]."/".rand(100000,900000);

        // upload image
        if($request->hasFile('image')) {
            $image = $this->formatImage($request);
        }

        // create student
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($matric_no),
            'phone' => $request->phone,
            'dob' => $request->dob,
            'programme' => $request->programme,
            'gender' => $request->gender,
            'department' => 'computer science',
            'faculty' => 'physical science',
            'religion' => $request->religion,
            'level' => $request->level,
            'address' => $request->address,
            'image' => $image,
            'matric_no' => $matric_no,
        ]);

        return back()->with('success', 'New student added successfully!');
    }
}
