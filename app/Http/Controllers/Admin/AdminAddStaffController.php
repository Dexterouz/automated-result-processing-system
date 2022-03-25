<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAddStaffController extends Controller
{
    public function index()
    {
        return view('admin.add-staff');
    }

    public function formatImage($request)
    {
        // image name
        $student_name = $request->first_name." ".$request->last_name;
        $exp_str = explode(' ', $student_name);
        $image_name = strtolower(implode('-', $exp_str));

        $image = $request->file('image');
        $new_name = $image_name."-".substr(uniqid(), -4, 4).".".$image->extension();
        $image->move('images/staff', $new_name);

        return $new_name;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:staffs'],
            'phone' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'position' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'level' => ['required', 'string'],
            'address' => ['required', 'string'],
            'image' => ['required'],
        ]);

        $staff_no = "UNN/STAFF/".rand(1000,9000);

        // upload image
        if($request->hasFile('image')) {
            $image = $this->formatImage($request);
        }

        Staff::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'staff_no' => $staff_no,
            'email' => $request->email,
            'password' => Hash::make($staff_no),
            'phone' => $request->phone,
            'dob' => $request->dob,
            'programme' => $request->programme,
            'gender' => $request->gender,
            'department' => 'computer science',
            'faculty' => 'physical science',
            'religion' => $request->religion,
            'position' => $request->position,
            'level' => $request->level,
            'address' => $request->address,
            'image' => $image,
        ]);

        return back()->with('success', 'Staff added successfully!');
    }
}
