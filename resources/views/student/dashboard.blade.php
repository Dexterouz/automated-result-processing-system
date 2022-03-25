@extends('layouts.student')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Level</h4>
                    </div>
                    <div class="card-body">
                        {{ intval($student->level) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Session</h4>
                    </div>
                    <div class="card-body">
                        {{ $session }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-user-friends"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Semester</h4>
                    </div>
                    <div class="card-body">
                        {{ $semester == 1 ? 'First' : 'Second' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Details</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td>
                                First Name
                            </td>
                            <td>
                                {{ ucfirst($student->first_name) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Last Name
                            </td>
                            <td>
                                {{ ucfirst($student->last_name) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Birth Date
                            </td>
                            <td>
                                {{ $student->dob }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Matric No.
                            </td>
                            <td>
                                {{ $student->matric_no }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                {{ $student->email }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Phone Number
                            </td>
                            <td>
                                {{ $student->phone }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                {{ ucfirst($student->gender) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Department
                            </td>
                            <td>
                                {{ ucfirst($student->department) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Faculty
                            </td>
                            <td>
                                {{ ucfirst($student->faculty) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Programme
                            </td>
                            <td>
                                {{ ucfirst($student->programme) }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                {{ $student->address }}
                            </td>
                            </tr>
                            <tr>
                            <td>
                                Religion
                            </td>
                            <td>
                                {{ ucfirst($student->religion) }}
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection