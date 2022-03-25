@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Course Allocation</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Course Allocation</div>
    </div>
    </div>

    <div class="row">
    <div class="col-12 p-3">
        <a href="{{ route('admin.add.course') }}" class="btn btn-success btn-icon btn-left">
            <i class="fas fa-plus"></i>
            Add Course
        </a>
    </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center">{{ $semester == '1' ? 'First' : 'Second' }} semester course allocation for the session: <b>{{ $session }}</b></div>
            </div>
        </div>
    </div>
    </div>

    <x-alert type="success"></x-alert>
    <x-alert type="danger"></x-alert>

    <!-- 100L-->
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>100 Level</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped v_center">
                        <tr>
                            <th>Lecturer</th>
                            <th></th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($level_100 as $course)
                        <tr>
                            <form action="{{ route('admin.assign.course', $course) }}" id="action{{ $course->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <td>
                                    <div class="form-group">
                                    <label></label>
                                    <select name="staff" class="form-control">
                                        <option value="">-- Select --</option>
                                        @foreach ($staffs as $staff)
                                            <option {{ $course->staff_id == $staff->id ? 'selected' : '' }} value="{{ $staff->id }}">{{ $staff->first_name." ".$staff->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('staff')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </td>
                                <td class="text-center"><i class="fas fa-arrow-right"></i></td>
                                <td>
                                    {{ $course->course_title." ({$course->course_code})" }}
                                </td>
                                <td>
                                    @if ($course->staff_id == null)
                                        <input type="hidden" name="action" value="assign">
                                        <button
                                            class="btn btn-primary"
                                            data-toggle="tooltip"
                                            title="Assign"
                                            name="assign"
                                            data-confirm="Confirm Action?|Do you want to continue?"
                                            data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                            Assign
                                        </button>
                                    @else
                                        <input type="hidden" name="action" value="reset">
                                        <button
                                            class="btn btn-danger"
                                            data-toggle="tooltip"
                                            title="Reset"
                                            name="reset"
                                            data-confirm="Confirm Action?|Do you want to continue?"
                                            data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                            Reset
                                        </button>
                                    @endif
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- 200L-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>200 Level</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Lecturer</th>
                                <th></th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($level_200 as $course)
                            <tr>
                                <form action="{{ route('admin.assign.course', $course) }}" id="action{{ $course->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <div class="form-group">
                                        <label></label>
                                        <select name="staff" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach ($staffs as $staff)
                                                <option {{ $course->staff_id == $staff->id ? 'selected' : '' }} value="{{ $staff->id }}">{{ $staff->first_name." ".$staff->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('staff')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </td>
                                    <td class="text-center"><i class="fas fa-arrow-right"></i></td>
                                    <td>
                                        {{ $course->course_title." ({$course->course_code})" }}
                                    </td>
                                    <td>
                                        @if ($course->staff_id == null)
                                            <input type="hidden" name="action" value="assign">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="tooltip"
                                                title="Assign"
                                                name="assign"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Assign
                                            </button>
                                        @else
                                            <input type="hidden" name="action" value="reset">
                                            <button
                                                class="btn btn-danger"
                                                data-toggle="tooltip"
                                                title="Reset"
                                                name="reset"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Reset
                                            </button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 300L-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>300 Level</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Lecturer</th>
                                <th></th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($level_300 as $course)
                            <tr>
                                <form action="{{ route('admin.assign.course', $course) }}" id="action{{ $course->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <div class="form-group">
                                        <label></label>
                                        <select name="staff" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach ($staffs as $staff)
                                                <option {{ $course->staff_id == $staff->id ? 'selected' : '' }} value="{{ $staff->id }}">{{ $staff->first_name." ".$staff->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('staff')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </td>
                                    <td class="text-center"><i class="fas fa-arrow-right"></i></td>
                                    <td>
                                        {{ $course->course_title." ({$course->course_code})" }}
                                    </td>
                                    <td>
                                        @if ($course->staff_id == null)
                                            <input type="hidden" name="action" value="assign">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="tooltip"
                                                title="Assign"
                                                name="assign"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Assign
                                            </button>
                                        @else
                                            <input type="hidden" name="action" value="reset">
                                            <button
                                                class="btn btn-danger"
                                                data-toggle="tooltip"
                                                title="Reset"
                                                name="reset"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Reset
                                            </button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 400L-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>400 Level</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped v_center">
                            <tr>
                                <th>Lecturer</th>
                                <th></th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($level_400 as $course)
                            <tr>
                                <form action="{{ route('admin.assign.course', $course) }}" id="action{{ $course->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <div class="form-group">
                                        <label></label>
                                        <select name="staff" class="form-control">
                                            <option value="">-- Select --</option>
                                            @foreach ($staffs as $staff)
                                                <option {{ $course->staff_id == $staff->id ? 'selected' : '' }} value="{{ $staff->id }}">{{ $staff->first_name." ".$staff->last_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('staff')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </td>
                                    <td class="text-center"><i class="fas fa-arrow-right"></i></td>
                                    <td>
                                        {{ $course->course_title." ({$course->course_code})" }}
                                    </td>
                                    <td>
                                        @if ($course->staff_id == null)
                                            <input type="hidden" name="action" value="assign">
                                            <button
                                                class="btn btn-primary"
                                                data-toggle="tooltip"
                                                title="Assign"
                                                name="assign"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Assign
                                            </button>
                                        @else
                                            <input type="hidden" name="action" value="reset">
                                            <button
                                                class="btn btn-danger"
                                                data-toggle="tooltip"
                                                title="Reset"
                                                name="reset"
                                                data-confirm="Confirm Action?|Do you want to continue?"
                                                data-confirm-yes="document.getElementById('action{{ $course->id }}').submit()">
                                                Reset
                                            </button>
                                        @endif
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection