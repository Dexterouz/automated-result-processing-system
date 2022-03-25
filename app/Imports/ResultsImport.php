<?php

namespace App\Imports;

use App\Http\Controllers\Staff\StaffManageResultController;
use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResultsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $grade = new StaffManageResultController();
        $total_result = (int) ($row['exam_score'] + $row['ca_score']);
        $staff = auth('staff')->user();

        return new Result([
            'staff_id' => $staff->id,
            'matric_no' => $row['matric_no'],
            'course_title' => $row['course_title'],
            'course_code' => $row['course_code'],
            'session' => $row['session'],
            'semester' => $row['semester'],
            'unit_load' => $row['unit_load'],
            'level' => $row['level'],
            'exam_score' => $row['exam_score'],
            'ca_score' => $row['ca_score'],
            'grade' => $grade->grade($total_result),
        ]);
    }
}
