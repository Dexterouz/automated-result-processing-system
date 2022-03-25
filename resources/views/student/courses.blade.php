@extends('layouts.student')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Course Registeration</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('student.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Course Registeration</div>
        </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst($student->first_name) }}!</h2>
    <p class="section-lead">{{ $semester == '1' ? 'First' : 'Second' }} semester course registeration form for the session <b>{{ $session }}</b></p>
    <x-alert type="error"></x-alert>
    <x-alert type="success"></x-alert>
    @if ($registered_courses->count() > 0)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registered Courses</h4>
                    <div class="card-header-form">
                        {{-- <button class="btn btn-primary btn-icon btn-left"><i class="fas fa-pencil-alt"></i> Edit</button> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>S/N</th>
                                <th>Session</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Semester</th>
                                <th>Unit</th>
                                <th>Submitted</th>
                            </tr>
                            @for ($i = 0; $i < $registered_courses->count(); $i++)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $registered_courses[$i]->session }}</td>
                                <td class="align-middle">{{ strtoupper($registered_courses[$i]->course->course_code) }}</td>
                                <td>{{ ucwords($registered_courses[$i]->course->course_title) }}</td>
                                <td>{{ $registered_courses[$i]->semester }}</td>
                                <td>{{ $registered_courses[$i]->course->unit_load }}</td>
                                <td><i class="fas fa-check text-success"></i></td>
                            </tr>
                            @endfor
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="align-middle">Total Unit Registered</td>
                                <td>{{ $total_unit }}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Course Registeration Form</h4>
                </div>
                <form action="{{ route('student.register.course') }}" id="register" method="post">
                    @csrf
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped v_center">
                                <tr>
                                    <th class="text-center">Option</th>
                                    <th>Session</th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Semester</th>
                                    <th>Unit</th>
                                </tr>
                                @if ($courses->count() > 0)
                                    @foreach ($courses as $course)
                                    <tr>
                                        <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" name="course[]" value="{{ $course->id }}" class="custom-control-input" id="checkbox-{{ $loop->index }}">
                                            <label for="checkbox-{{ $loop->index }}" class="custom-control-label">&nbsp;</label>
                                        </div>
                                        </td>
                                        <td>{{ $session }}</td>
                                        <td class="align-middle">{{ strtoupper($course->course_code) }}</td>
                                        <td>{{ ucwords($course->course_title) }}</td>
                                        <td>{{ $course->semester }}</td>
                                        <td>{{ $course->unit_load }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" data-toggle="tooltip" title="Submit" data-confirm="Confirm Action?|Do you want to submit?" data-confirm-yes="document.getElementById('register').submit()" class="btn btn-primary">Submit</button>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td><center><em>No course found</em></center></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    </div>
</section>
@endsection