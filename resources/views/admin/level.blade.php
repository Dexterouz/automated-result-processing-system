@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Course List for ({{ strtoupper($level) }})</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.add.course') }}">Courses</a></div>
        <div class="breadcrumb-item">Course List</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('admin.add.course') }}" class="btn btn-success btn-icon btn-left">
                <i class="fas fa-plus"></i>
                    Add New course
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Course List</h4>
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
                            <th>Course Title</th>
                            <th>Course Code</th>
                            <th>Unit Load</th>
                            <th>Level</th>
                            <th>Semester</td>
                            <th>Action</th>
                        </tr>
                        @if ($courses->count() > 0)
                            @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->course_title }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->unit_load }}</td>
                                <td>{{ $course->level }}</td>
                                <td>{{ $course->semester }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.edit.course', $course) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.delete.course', $course) }}" id="delete{{ $course->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" data-toggle="tooltip" title="Delete" data-confirm="Confirm Delete?|Do you want to continue?" data-confirm-yes="document.getElementById('delete{{ $course->id }}').submit()" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><center><em>No Course found</em></center></td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection