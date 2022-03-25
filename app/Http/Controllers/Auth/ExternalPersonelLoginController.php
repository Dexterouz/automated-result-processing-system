<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalPersonelLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest.personel', 'personel.access'])
            ->except('logout');
    }

    public function index()
    {
        return view('auth.external');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::guard('personel')->attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Invalid sign in details');
        }

        return redirect()->route('personel.dashboard');
    }
}
