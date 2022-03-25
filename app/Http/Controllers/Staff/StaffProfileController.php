<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.staff');
    }

    public function index()
    {
        $staff = auth('staff')->user();
        return view('staff.profile', compact('staff'));
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
            'position' => $request->position,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'level' => $request->level,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Your profile has been updated!');
    }
}
