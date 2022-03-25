<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personel;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $admins = User::get();
        $staffs = Staff::get()->count();
        $students = Student::get()->count();
        $personels = Personel::get()->count();

        return view('admin.dashboard', [
            'admins' => $admins,
            'staffs' => $staffs,
            'students' => $students,
            'personels' => $personels,
        ]);
    }
}
