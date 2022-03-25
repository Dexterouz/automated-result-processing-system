@extends('layouts.staff')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('staff.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('staff')->user()->first_name) }}!</h2>
    <p class="section-lead">List of all students that are offering your course</p>

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
                            </tr>
                            @if ($registered_courses->count() > 0)
                                @foreach ($registered_courses as $registered)
                                <tr>
                                    <td><img alt="image" src="{{ asset("images/student/{$registered->student->image}") }}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian"></td>
                                    <td>{{ ucwords($registered->student->first_name." ".$registered->student->last_name) }}</td>
                                    <td>{{ $registered->student->gender }}</td>
                                    <td>{{ $registered->student->phone }}</td>
                                    <td>{{ $registered->student->email }}</td>
                                    <td>{{ $registered->student->matric_no }}</td>
                                    <td>{{ $registered->student->level }}</td>
                                    <td>{{ ucfirst($registered->student->programme) }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8"><center><em>No student found</em></center></td>
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