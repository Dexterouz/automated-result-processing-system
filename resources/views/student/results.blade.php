@extends('layouts.student')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>My Result</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('student.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">View Result</div>
        </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('student')->user()->first_name) }}!</h2>
    <p class="section-lead">Fetch all your result for each session and semester</p>

    @if (!isset($results))
    <div class="row">
        <div class="col-12">
            <form action="{{ route('student.result') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label>Session</label>
                                <select name="session" class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->session }}">{{ $session->session }}</option>
                                    @endforeach
                                </select>
                                @error('session')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Semester</label>
                                <select name="semester" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                </select>
                                @error('semester')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="100l">100L</option>
                                    <option value="200l">200L</option>
                                    <option value="300l">300L</option>
                                    <option value="400l">400L</option>
                                </select>
                                @error('level')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif

    @if (isset($results))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Result</h4>
                    <div class="card-header-form">
                    <button class="btn btn-primary btn-icon btn-left"><i class="fas fa-file-pdf"></i> Print</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Unit</th>
                                <th>C.A</th>
                                <th>Exam</th>
                                <th>Grade</th>
                            </tr>
                            @forelse ($results as $result)
                            <tr>
                                <td class="align-middle">{{ strtoupper($result->course_code) }}</td>
                                <td>{{ ucwords($result->course_title) }}</td>
                                <td>{{ $result->session }}</td>
                                <td>{{ $result->semester }}</td>
                                <td>{{ $result->unit_load }}</td>
                                <td>{{ $result->ca_score }}</td>
                                <td>{{ $result->exam_score }}</td>
                                <td>{{ $result->grade }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8"><center><em>No result found</em></center></td>
                                </tr>
                            @endforelse
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