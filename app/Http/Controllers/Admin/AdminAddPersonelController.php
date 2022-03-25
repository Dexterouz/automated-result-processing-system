<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAddPersonelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.add-personel');
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

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:personels'],
            'phone' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'image' => ['required'],
            'account_status' => ['required', 'string'],
        ]);

        // upload image
        if ($request->hasFile('image')) {
            $image = $this->formatImage($request);
        }

        Personel::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'image' => $image,
            'account_status' => $request->account_status,
        ]);

        return back()->with('success', 'New external personel added successfully!');
    }
}
