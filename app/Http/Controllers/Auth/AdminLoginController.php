<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index()
    {
        return view('auth.admin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Invalid login details');
        }

        return redirect()->route('admin.dashboard');
    }
}
