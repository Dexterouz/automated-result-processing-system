<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalPersonelLogoutController extends Controller
{
    public function logout()
    {
        Auth::guard('personel')->logout();

        return redirect()->route('personel.login');
    }
}
