<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonelDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.personel');
    }

    public function index()
    {
        $personel = auth('personel')->user();
        return view('personel.dashboard', compact('personel'));
    }
}
