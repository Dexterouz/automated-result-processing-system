<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use Illuminate\Http\Request;

class AdminEditPersonelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Personel $personel)
    {
        return view('admin.edit-personel', compact('personel'));
    }

    public function formatImage($request)
    {
        // image name
        $student_name = $request->first_name." ".$request->last_name;
        $exp_str = explode(' ', $student_name);
        $image_name = strtolower(implode('-', $exp_str));

        $image = $request->file('image');
        $new_name = $image_name."-".substr(uniqid(), -4, 4).".".$image->extension();
        $image->move('images/personel', $new_name);

        return $new_name;
    }

    public function update(Request $request, Personel $personel)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'account_status' => ['required', 'string'],
        ]);

        $personel->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'account_status' => $request->account_status,
            'image' => $request->hasFile('image') ? $this->formatImage($request) : $personel->image,
        ]);

        return back()->with('success', 'Personel data updated successfully!');
    }
}
