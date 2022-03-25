<?php

use App\Http\Controllers\Admin\AdminAddCourseController;
use App\Http\Controllers\Admin\AdminAddPersonelController;
use App\Http\Controllers\Admin\AdminAddStaffController;
use App\Http\Controllers\Admin\AdminAddStudentController;
use App\Http\Controllers\Admin\AdminCourseAllocation;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEditCourseController;
use App\Http\Controllers\Admin\AdminEditPersonelController;
use App\Http\Controllers\Admin\AdminEditStaffController;
use App\Http\Controllers\Admin\AdminEditStudentController;
use App\Http\Controllers\Admin\AdminPersonelController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSemesterSettingController;
use App\Http\Controllers\Admin\AdminSessionSettingController;
use App\Http\Controllers\Admin\AdminStaffController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminLogoutController;
use App\Http\Controllers\Auth\ExternalPersonelLoginController;
use App\Http\Controllers\Auth\ExternalPersonelLogoutController;
use App\Http\Controllers\Auth\StaffLoginController;
use App\Http\Controllers\Auth\StaffLogoutController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Auth\StudentLogoutController;
use App\Http\Controllers\Personel\PersonelDashboardController;
use App\Http\Controllers\Personel\PersonelProfileController;
use App\Http\Controllers\Personel\PersonelRetrieveResultController;
use App\Http\Controllers\Personel\PersonelSettingController;
use App\Http\Controllers\Staff\StaffCourseController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Staff\StaffManageResultController;
use App\Http\Controllers\Staff\StaffProfileController;
use App\Http\Controllers\Staff\StaffSettingController;
use App\Http\Controllers\Staff\StaffStudenController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\StudentResultController;
use App\Http\Controllers\Student\StudentSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

// Admin
Route::get('/admin', [AdminLoginController::class, 'index'])
    ->name('admin.login');
Route::post('/admin', [AdminLoginController::class, 'login']);

Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('admin/profile', [AdminProfileController::class, 'index'])
    ->name('admin.profile');
Route::put('admin/profile', [AdminProfileController::class, 'update']);

Route::get('admin/students', [AdminStudentController::class, 'index'])
    ->name('admin.students');
Route::delete('admin/add-student/{student}', [AdminStudentController::class, 'delete'])
    ->name('admin.delete.student');

Route::get('admin/add-student', [AdminAddStudentController::class, 'index'])
    ->name('admin.add.student');
Route::post('admin/add-student', [AdminAddStudentController::class, 'create']);

Route::get('admin/edit-student/{student}', [AdminEditStudentController::class, 'index'])
    ->name('admin.edit.student');
Route::put('admin/edit-student/{student}', [AdminEditStudentController::class, 'update']);

Route::get('admin/staffs', [AdminStaffController::class, 'index'])
    ->name('admin.staffs');

Route::delete('admin/staffs/{staff}', [AdminStaffController::class, 'delete'])
    ->name('admin.delete.staff');

Route::get('admin/add-staff', [AdminAddStaffController::class, 'index'])
    ->name('admin.add.staff');
Route::post('admin/add-staff', [AdminAddStaffController::class, 'create']);

Route::get('admin/edit-staff/{staff}', [AdminEditStaffController::class, 'index'])
    ->name('admin.edit.staff');
Route::put('admin/edit-staff/{staff}', [AdminEditStaffController::class, 'update']);

Route::get('admin/external-personel', [AdminPersonelController::class, 'index'])
    ->name('admin.external.personel');
Route::put('admin/external-personel/{personel}', [AdminPersonelController::class, 'restrict'])
    ->name('admin.restrict.personel');
Route::delete('admin/external-personel/{personel}', [AdminPersonelController::class, 'delete'])
    ->name('admin.delete.personel');

Route::get('admin/add-personel', [AdminAddPersonelController::class, 'index'])
    ->name('admin.add.personel');
Route::post('admin/add-personel', [AdminAddPersonelController::class, 'create']);

Route::get('admin/edit-personel/{personel}', [AdminEditPersonelController::class, 'index'])
    ->name('admin.edit.personel');
Route::put('admin/edit-personel/{personel}', [AdminEditPersonelController::class, 'update']);

// Course
Route::get('admin/courses', [AdminCourseController::class, 'index'])
    ->name('admin.courses');
Route::get('admin/courses/{level}', [AdminCourseController::class, 'show'])
    ->name('admin.show.courses');
Route::delete('admin/level/{course}', [AdminCourseController::class, 'delete'])
    ->name('admin.delete.course');

Route::get('admin/add-course', [AdminAddCourseController::class, 'index'])
    ->name('admin.add.course');
Route::post('admin/add-course', [AdminAddCourseController::class, 'create']);

Route::get('admin/edit-course/{course}', [AdminEditCourseController::class, 'index'])
    ->name('admin.edit.course');
Route::put('admin/edit-course/{course}', [AdminEditCourseController::class, 'update']);

Route::get('admin/course-allocation', [AdminCourseAllocation::class, 'index'])
    ->name('admin.course.allocation');
Route::put('admin/course-allocation/{course}', [AdminCourseAllocation::class, 'assign'])
    ->name('admin.assign.course');

Route::get('admin/session-setting', [AdminSessionSettingController::class, 'index'])
    ->name('admin.session.setting');
Route::post('admin/session-setting', [AdminSessionSettingController::class, 'create']);
Route::put('admin/session-setting/{session}/update', [AdminSessionSettingController::class, 'update'])
    ->name('admin.update.session');
Route::delete('admin/session-setting/{session}', [AdminSessionSettingController::class, 'delete'])
    ->name('admin.delete.session');

Route::get('admin/semester-setting', [AdminSemesterSettingController::class, 'index'])
    ->name('admin.semester.setting');
Route::post('admin/semester-setting', [AdminSemesterSettingController::class, 'create']);
Route::put('admin/semester-setting/{semester}', [AdminSemesterSettingController::class, 'update'])
    ->name('admin.update.semester');
Route::delete('admin/semester-setting/{semester}', [AdminSemesterSettingController::class, 'delete'])
    ->name('admin.delete.semester');

Route::get('/admin/logout', [AdminLogoutController::class, 'logout'])
    ->name('admin.logout');


// Student
Route::get('/student', [StudentLoginController::class, 'index'])
    ->name('student.login');
Route::post('/student', [StudentLoginController::class, 'login']);

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
    ->name('student.dashboard');

Route::get('/student/profile', [StudentProfileController::class, 'index'])
    ->name('student.profile');
Route::put('/student/profile/{student}', [StudentProfileController::class, 'update'])
    ->name('student.profile.update');

Route::get('/student/courses', [StudentCourseController::class, 'index'])
    ->name('student.courses');
Route::post('/student/courses', [StudentCourseController::class, 'register'])
    ->name('student.register.course');

Route::get('/student/results', [StudentResultController::class, 'index'])
    ->name('student.result');
Route::post('/student/results', [StudentResultController::class, 'retrieve']);

Route::get('/student/setting', [StudentSettingController::class, 'index'])
    ->name('student.setting');
Route::put('/student/setting', [StudentSettingController::class, 'passwordReset']);

Route::get('/student/logout', [StudentLogoutController::class, 'logout'])
    ->name('student.logout');


// Staff
Route::get('/staff', [StaffLoginController::class, 'index'])
    ->name('staff.login');
Route::post('/staff', [StaffLoginController::class, 'login']);

Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])
    ->name('staff.dashboard');

Route::get('/staff/profile', [StaffProfileController::class, 'index'])
    ->name('staff.profile');
Route::put('/staff/profile/{staff}', [StaffProfileController::class, 'update'])
    ->name('staff.profile.update');

Route::get('/staff/students', [StaffStudenController::class, 'index'])
    ->name('staff.students');

Route::get('/staff/courses', [StaffCourseController::class, 'index'])
    ->name('staff.courses');

Route::get('/staff/manage-result', [StaffManageResultController::class, 'index'])
    ->name('staff.manage.result');

Route::post('/staff/manage-result/import', [StaffManageResultController::class, 'import'])
    ->name('staff.import.results');

Route::post('/staff/manage-result', [StaffManageResultController::class, 'registerResults'])
    ->name('staff.submit.results');

Route::get('/staff/edit-result/{course_code}', [StaffManageResultController::class, 'edit'])
    ->name('staff.edit.result');
Route::put('/staff/edit-result', [StaffManageResultController::class, 'update'])
    ->name('staff.update.result');

Route::get('/download/template', [StaffManageResultController::class, 'export'])
    ->name('export.template');

Route::get('/staff/setting', [StaffSettingController::class, 'index'])
    ->name('staff.setting');
Route::put('/staff/setting', [StaffSettingController::class, 'passwordReset']);

Route::get('/staff/logout', [StaffLogoutController::class, 'logout'])
    ->name('staff.logout');


// External Personel
Route::get('/external-personel', [ExternalPersonelLoginController::class, 'index'])
    ->name('personel.login');
Route::post('/external-personel', [ExternalPersonelLoginController::class, 'login']);

Route::get('/personel/dashboard', [PersonelDashboardController::class, 'index'])
    ->name('personel.dashboard');

Route::get('/personel/profile', [PersonelProfileController::class, 'index'])
    ->name('personel.profile');
Route::put('/personel/profile', [PersonelProfileController::class, 'update']);

Route::get('/personel/retrieve-result', [PersonelRetrieveResultController::class, 'index'])
    ->name('personel.retrieve.result');
Route::post('/personel/retrieve-result', [PersonelRetrieveResultController::class, 'retrieve']);

Route::get('/personel/setting', [PersonelSettingController::class, 'index'])
    ->name('personel.setting');
Route::put('/personel/setting', [PersonelSettingController::class, 'passwordReset']);

Route::get('/personel/logout', [ExternalPersonelLogoutController::class, 'logout'])
    ->name('personel.logout');
