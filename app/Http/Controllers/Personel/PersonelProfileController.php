<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use Illuminate\Http\Request;

class PersonelProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.personel');
    }

    public function index()
    {
        $personel = auth('personel')->user();
        return view('personel.profile', compact('personel'));
    }

    public function update(Request $request)
    {
        $auth = auth('personel')->user();
        $personel = Personel::find($auth->id);

        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        $personel->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Your profile has been updated successfully');
    }
}
