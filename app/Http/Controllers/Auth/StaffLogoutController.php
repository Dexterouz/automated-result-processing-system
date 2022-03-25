<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffLogoutController extends Controller
{
    public function logout()
    {
        Auth::guard('staff')->logout();

        return redirect()->route('staff.login');
    }
}
