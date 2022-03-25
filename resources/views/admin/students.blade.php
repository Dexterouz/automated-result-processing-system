@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Students</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Students</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('admin.add.student') }}" class="btn btn-success btn-icon btn-left">
                    <i class="fas fa-plus"></i>
                    Add New Student
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
                <h4>Students</h4>
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
                            <th>Image</th>
                            <th>Fullname</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>Email</td>
                            <th>Matric no.</th>
                            <th>Level</th>
                            <th>Programme</th>
                            <th>Action</th>
                        </tr>
                        @if ($students->count() > 0)
                            @foreach ($students as $student)
                            <tr>
                                <td>
                                    <img alt="image"
                                        src="{{ asset("images/student/{$student->image}") }}"
                                        class="rounded-circle"
                                        width="35"
                                        data-toggle="tooltip"
                                        title="{{ ucwords($student->first_name.' '.$student->last_name) }}
                                    ">
                                </td>
                                <td>{{ ucwords($student->first_name.' '.$student->last_name) }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->matric_no }}</td>
                                <td>{{ $student->level }}</td>
                                <td>{{ strtoupper($student->programme) }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.edit.student', $student) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.delete.student', $student) }}" id="delete{{ $student->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" data-toggle="tooltip" title="Delete" data-confirm="Confirm Delete?|Do you want to continue?" data-confirm-yes="document.getElementById('delete{{ $student->id }}').submit()" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><center><em>No Student found</em></center></td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection