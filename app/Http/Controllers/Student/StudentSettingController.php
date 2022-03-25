<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }

    public function index()
    {
        return view('student.setting');
    }

    public function passwordReset(Request $request)
    {
        $auth = auth('student')->user();

        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // check if old password is valid
        if (Hash::check($request->old_password, $auth->password)) {
            // check if new password is same as old password
            if (!Hash::check($request->new_password, $auth->password)) {
                $admin = Student::find($auth->id);

                // update new password
                $admin->update([
                    'password' => Hash::make($request->new_password)
                ]);

                return back()->with('success', 'password updated successfully!');
            } else {
                return back()->with('error', 'new password can not be same as old password');
            }
        } else {
            return back()->with('error', 'Your old password is incorrect');
        }
    }
}
