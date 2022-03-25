<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPersonelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $personels = Personel::paginate(40);
        return view('admin.external-personel', compact('personels'));
    }

    public function restrict(Request $request, Personel $personel)
    {
        $message = ($request->status == "active") ? "Personel activated!" : "Personel De-activated!";
        $personel->update([
            'account_status' => $request->status,
        ]);

        return back()->with('success', $message);
    }

    public function delete(Personel $personel)
    {
        $personel->delete();

        return back()->with('success', 'Personel deleted successfully!');
    }
}
