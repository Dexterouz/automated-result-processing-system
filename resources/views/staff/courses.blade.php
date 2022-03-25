@extends('layouts.staff')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Courses</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('staff.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Courses</div>
    </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('staff')->user()->first_name) }}!</h2>
    <p class="section-lead">List of all course(s) that you are offering.</p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Course(s)</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Session</th>
                                <th>Semester</td>
                                <th>Unit</th>
                                <th>Level</th>
                            </tr>
                            @if ($courses->count() > 0)
                                @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ strtoupper($course->course_code) }}</td>
                                    <td>{{ ucwords($course->course_title) }}</td>
                                    <td>{{ $session }}</td>
                                    <td>{{ $course->semester }}</td>
                                    <td>{{ $course->unit_load }}</td>
                                    <td>{{ $course->level }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><center><em>No course(s) found</em></center></td>
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