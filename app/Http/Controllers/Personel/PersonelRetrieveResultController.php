<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Session;
use Illuminate\Http\Request;

class PersonelRetrieveResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.personel');
    }

    public function index()
    {
        $personel = auth('personel')->user();
        $sessions = Session::all();
        return view('personel.retrieve-result', compact('sessions', 'personel'));
    }

    public function retrieve(Request $request)
    {
        $this->validate($request, [
            'session' => ['required'],
            'semester' => ['required'],
            'level' => ['required'],
        ]);

        $results = Result::where('session', $request->session)
            ->where('semester', $request->semester)
            ->where('level', $request->level)
            ->get();

        return view('personel.retrieve-result', compact('results'));
    }
}
