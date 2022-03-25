<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest.staff');
    }

    public function index()
    {
        return view('auth.staff');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'staff_no' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::guard('staff')->attempt($request->only('staff_no', 'password'))) {
            return back()->with('error', 'Invalid sign in details');
        }

        return redirect()->route('staff.dashboard');
    }
}
