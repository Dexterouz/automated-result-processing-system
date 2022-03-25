@extends('layouts.staff')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Manage Result</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('staff.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Manage Result</div>
    </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('staff')->user()->first_name) }}!</h2>
    <p class="section-lead">
        Here you can upload results and edit uploaded result.
        @if ($results->count() !== 0)
            <span class="text-danger">Note:</span> To upload result by spreadsheet,
            click on this <a href="{{ route('export.template') }}" class="link">link</a> to download the template
        @endif
    </p>

    <x-alert type="error"></x-alert>
    <x-alert type="success"></x-alert>
    @if ($results->count() > 0)
        <p>
            <div class="text-center">
                <span class="fas fa-check-circle fa-4x text-success"></span>
                Your course <b>{{ $course->course_title." ({$course->course_code})" }}</b>
                has been submitted. if you wish to make some changes, please click on
                <a href="{{ route('staff.edit.result', $course->course_code) }}" class="btn btn-primary">Edit</a>
            </div>
        </p>
    @else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Course(s)</h4>
                    <div class="card-header-form">
                        <form action="{{ route('staff.import.results') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="input-group row align-items-center">
                                <div class="col-sm-6 col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="result_sheet" class="custom-file-input">
                                        <label class="custom-file-label">Import spreadsheet</label>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-md-right">
                                    <button class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Image</th>
                                <th>Matric No.</th>
                                <th>Student</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Unit</th>
                                <th>Level</th>
                                <th>Exam Score</th>
                                <th>C.A Score</th>
                            </tr>
                            @if ($registered_courses->count() > 0)
                                <form action="{{ route('staff.submit.results') }}" method="post" id="submit-result">
                                    @csrf
                                    @foreach ($registered_courses as $registered)
                                    <tr>
                                        <td>
                                            <img src="{{ asset("images/student/{$registered->student->image}") }}" alt="image" class="rounded-circle" width="35">
                                        </td>
                                        <td>
                                            <input type="hidden" name="student_matric_no[]" value="{{ $registered->student->matric_no }}">
                                            {{ $registered->student->matric_no }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="student_name[]" value="{{ ucwords($registered->student->last_name." ".$registered->student->first_name) }}">
                                            {{ ucwords($registered->student->last_name[0].".".$registered->student->first_name) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="course_title[]" value="{{ ucwords($registered->course->course_title) }}">
                                            {{ ucwords($registered->course->course_title) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="course_code[]" value="{{ $registered->course->course_code }}">
                                            {{ strtoupper($registered->course->course_code) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="session[]" value="{{ $registered->session }}">
                                            {{ $registered->session }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="semester[]" value="{{ $registered->course->semester }}">
                                            {{ $registered->course->semester }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="unit_load[]" value="{{ $registered->course->unit_load }}">
                                            {{ $registered->course->unit_load }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="level[]" value="{{ $registered->course->level }}">
                                            {{ $registered->course->level }}
                                        </td>
                                        <td>
                                            <div class="form-group col-md-6 col-12">
                                                <label></label>
                                                <input type="number" name="exam_score[]" value="{{ old("exam_score[]") }}" class="result-box" required="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-md-6 col-12">
                                                <label></label>
                                                <input type="number" name="ca_score[]" value="{{ old("ca_score[]") }}" class="result-box" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="10">
                                            <button type="submit" data-toggle="tooltip" title="Submit" data-confirm="Confirm Action?|Do you want to submit?" data-confirm-yes="document.getElementById('submit-result').submit()" class="btn btn-primary">Submit</button>
                                        </td>
                                    </tr>
                                </form>
                            @else
                                <tr>
                                    <td colspan="11">
                                        <center><em>No course(s) found</em></center>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
</section>
@endsection