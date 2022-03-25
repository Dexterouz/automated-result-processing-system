<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class AdminEditStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Staff $staff)
    {
        return view('admin.edit-staff', compact('staff'));
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

    public function update(Request $request, Staff $staff)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'position' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'level' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);

        $staff->update([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'position' => $request->position,
            'level' => $request->level,
            'address' => $request->address,
            'image' => $request->hasFile('image') ? $this->formatImage($request) : $staff->image,
        ]);

        return back()->with('success', "Staff {$staff->first_name} {$staff->last_name} updated successfully");
    }
}
