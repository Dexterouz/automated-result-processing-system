<?php

namespace App\Http\Controllers\Staff;

use App\Exports\RegisteredCoursesExport;
use App\Http\Controllers\Controller;
use App\Imports\ResultsImport;
use App\Models\Course;
use App\Models\RegisteredCourse;
use App\Models\Result;
use App\Models\Semester;
use App\Models\Session;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffManageResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.staff');
    }

    public function index()
    {
        $staff = auth('staff')->user();
        $semester = Semester::where('default', 'yes')->first();
        $session = Session::where('default', 'yes')->first();

        $course = Course::where('staff_id', $staff->id)->first();

        $registered_courses = RegisteredCourse::where('course_id', $course->id ?? 0)
            ->where('semester', $semester->semester)
            ->where('session', $session->session)
            ->get();

        // Check if any result has been submitted by a particular staff
        $results = Result::where('staff_id', $staff->id)
            ->where('course_code', $course->course_code ?? 0)
            ->where('semester', $semester->semester)
            ->where('session', $session->session)
            ->get();

            // dd($results->count());

        return view('staff.manage-result', compact('registered_courses', 'results', 'course'));
    }

    public function grade(int $score): string
    {
        $grade = "";
        try {
            if(!is_integer($score)) {
                throw new Exception("{$score} is not an integer");
            } else {
                switch ($score) {
                    case $score >= 70:
                        $grade = "A";
                        break;

                    case ($score >= 60 && $score <= 69):
                        $grade = "B";
                        break;

                    case ($score >= 50 && $score <= 59):
                        $grade = "C";
                        break;

                    case ($score >= 40 && $score <= 49):
                        $grade = "D";
                        break;
                    default:
                        $grade = "F";
                        break;
                }
            }
        } catch (Exception $e) {
            print "An Exception has occurred!. Message: {$e->getMessage()}";
        }

        return $grade;
    }

    public function registerResults(Request $request)
    {
        $staff = auth('staff')->user();

        for ($count = 0; $count < count($request->student_matric_no); $count++) {
            if (empty($request->exam_score[$count]) || empty($request->ca_score[$count])) {
                return back()->with('error', 'You have an empty box');
            } else {
                // calculate total score
                $total_score = (int) ($request->exam_score[$count] + $request->ca_score[$count]);

                // store result in database
                Result::create([
                    'staff_id' => $staff->id,
                    'course_code' => $request->course_code[$count],
                    'course_title' => $request->course_title[$count],
                    'unit_load' => $request->unit_load[$count],
                    'level' => $request->level[$count],
                    'semester' => $request->semester[$count],
                    'session' => $request->session[$count],
                    'matric_no' => $request->student_matric_no[$count],
                    'exam_score' => $request->exam_score[$count],
                    'ca_score' => $request->ca_score[$count],
                    'grade' => $this->grade($total_score),
                ]);
            }
        }

        return back()->with('success', 'Results submitted successfully!');
    }

    public function edit(Request $request, $course_code)
    {
        $staff = auth('staff')->user();
        $session = Session::where('default', 'yes')->first()->session;
        $semester = Semester::where('default', 'yes')->first()->semester;

        $results = Result::where('course_code', $course_code)
            ->where('staff_id', $staff->id)
            ->where('session', $session)
            ->where('semester', $semester)
            ->get();
        return view('staff.edit-result', compact('results'));
    }

    public function update(Request $request, Result $result)
    {
        // dd($result->where('id', 9)->get());
        // dd($request);
        $staff = auth('staff')->user();

        for ($count = 0; $count < count($request->student_matric_no); $count++) {
            if (empty($request->exam_score[$count]) || empty($request->ca_score[$count])) {
                return back()->with('error', 'You have an empty box');
            } else {
                // calculate total score
                $total_score = (int) ($request->exam_score[$count] + $request->ca_score[$count]);

                // store result in database
                $result->where([
                    ['id', '=', $request->id[$count]],
                    ['staff_id', '=', $staff->id],
                ])->update([
                    'exam_score' => $request->exam_score[$count],
                    'ca_score' => $request->ca_score[$count],
                    'grade' => $this->grade($total_score),
                ]);
            }
        }

        return back()->with('success', 'Results updated successfully!');
    }

    public function export()
    {
        return Excel::download(new RegisteredCoursesExport, 'template.xlsx');
    }

    public function import(Request $request)
    {
        if (empty($request->file('result_sheet'))) {
            return back()->with('error', 'Result sheet is required');
        } else {
            if ($request->file('result_sheet')->extension() !== "xlsx") {
                return back()->with('error', 'Imported file must be .xlsx file');
            } else {
                Excel::import(new ResultsImport, $request->file('result_sheet'));
                return back()->with('success', 'Result sheet import was successful!');
            }
        }
    }
}
