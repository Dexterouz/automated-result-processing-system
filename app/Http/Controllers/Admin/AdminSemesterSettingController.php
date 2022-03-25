<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class AdminSemesterSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $semesters = Semester::all();
        return view('admin.semester-setting', compact('semesters'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'semester' => ['required']
        ]);

        Semester::create([
            'semester' => $request->semester,
            'default' => "no"
        ]);

        return back()->with('success', 'Semester added successfully!');
    }

    public function update(Request $request, Semester $semester)
    {
        $this->validate($request, [
            'default' => ['required'],
        ]);

        $message = $request->default == "yes" ? "Semester set as default" : "Semester unset as default";

        $semester->update([
            'default' => $request->default,
        ]);

        return back()->with('success', $message);
    }

    public function delete(Semester $semester)
    {
        $semester->delete();

        return back()->with('success', 'Semester deleted!');
    }
}
