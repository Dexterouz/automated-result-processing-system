@extends('layouts.staff')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Manage Result</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('staff.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('staff.manage.result') }}">Manage Result</a></div>
        <div class="breadcrumb-item">Edit Result</div>
    </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('staff')->user()->first_name) }}!</h2>
    <p class="section-lead">
        Here you can edit submitted result.
    </p>

    <x-alert type="error"></x-alert>
    <x-alert type="success"></x-alert>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Result(s)</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Matric No.</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Unit Load</th>
                                <th>Level</th>
                                <th>Exam Score</th>
                                <th>C.A Score</th>
                                <th>Grade</th>
                            </tr>
                            @if ($results->count() > 0)
                                <form action="{{ route('staff.update.result') }}" method="POST" id="update-result">
                                    @csrf
                                    @method('PUT')
                                    @foreach ($results as $result)
                                    <tr>
                                        <input type="hidden" name="id[]" value="{{ $result->id }}">
                                        <td>
                                            <input type="hidden" name="student_matric_no[]" value="{{ $result->matric_no }}">
                                            {{ $result->matric_no }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="course_title[]" value="{{ ucwords($result->course_title) }}">
                                            {{ ucwords($result->course_title) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="course_code[]" value="{{ $result->course_code }}">
                                            {{ strtoupper($result->course_code) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="session[]" value="{{ $result->session }}">
                                            {{ $result->session }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="semester[]" value="{{ $result->semester }}">
                                            {{ $result->semester }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="unit_load[]" value="{{ $result->unit_load }}">
                                            {{ $result->unit_load }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="level[]" value="{{ $result->level }}">
                                            {{ $result->level }}
                                        </td>
                                        <td>
                                            <div class="form-group col-md-6 col-12">
                                                <label></label>
                                                <input type="number" name="exam_score[]" value="{{ $result->exam_score }}" class="result-box" required="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group col-md-6 col-12">
                                                <label></label>
                                                <input type="number" name="ca_score[]" value="{{ $result->ca_score }}" class="result-box" required="">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $result->grade }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="10">
                                            <button type="submit" data-toggle="tooltip" title="Save" data-confirm="Confirm Action?|Do you want to submit?" data-confirm-yes="document.getElementById('update-result').submit()" class="btn btn-primary">Save</button>
                                        </td>
                                    </tr>
                                </form>
                            @else
                                <tr>
                                    <td>
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
    </div>
</section>
@endsection