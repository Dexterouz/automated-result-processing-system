<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class AdminSessionSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sessions = Session::get();
        return view('admin.session-setting', compact('sessions'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'session' => ['required']
        ]);

        Session::create([
            'session' => $request->session,
            'default' => "no",
        ]);

        return back()->with('success', 'New session added successfully!');
    }

    public function update(Request $request, Session $session)
    {
        dd($session, $request);
        $this->validate($request, [
            'default' => ['required'],
        ]);

        $message = $request->default == "yes" ? "Session set as default" : "Session unset as default";

        $session->update([
            'default' => $request->default,
        ]);

        return back()->with('success', $message);
    }

    public function delete(Session $session)
    {
        $session->delete();

        return back()->with('success', 'Session deleted!');
    }
}
