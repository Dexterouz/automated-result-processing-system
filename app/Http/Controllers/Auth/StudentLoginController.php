<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest.student')->except('logout');
    }

    public function index()
    {
        return view('auth.student');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'matric_no' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::guard('student')->attempt($request->only('matric_no', 'password'))) {
            return back()->with('error', 'Invalid sign in details');
        }

        return redirect()->route('student.dashboard');
    }
}
