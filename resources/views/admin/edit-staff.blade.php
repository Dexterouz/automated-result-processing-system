@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Edit Staff</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.staffs') }}">Staffs</a></div>
        <div class="breadcrumb-item">Edit Staff</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Staff Form</h4>
            </div>
            <div class="card-body p-0">
                <form method="post" action="{{ route('admin.edit.staff', $staff) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-alert type="success"></x-alert>
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12 col-12">
                            <label class="text-center">Image</label>
                            <input name="image" class="dropify" data-default-file="{{ asset("images/staff/{$staff->image}") }}" type="file" />
                            @error('image')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $staff->first_name }}">
                            @error('first_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $staff->last_name }}">
                            @error('last_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $staff->email }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $staff->phone }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Date of birth</label>
                            <input type="text" name="dob" class="form-control" placeholder="e.g 12/03/1994" value="{{ $staff->dob }}">
                            @error('dob')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Title</label>
                        <select name="title" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $staff->title == 'Mr' ? 'selected' : '' }} value="Mr">Mr</option>
                            <option {{ $staff->title == 'Mrs' ? 'selected' : '' }} value="Mrs">Mrs</option>
                            <option {{ $staff->title == 'Miss' ? 'selected' : '' }} value="Miss">Miss</option>
                            <option {{ $staff->title == 'Dr' ? 'selected' : '' }} value="Dr">Dr</option>
                            <option {{ $staff->title == 'Prof' ? 'selected' : '' }} value="Prof">Prof</option>
                        </select>
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                        <label>Sex</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $staff->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                            <option {{ $staff->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Religion</label>
                        <select name="religion" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $staff->religion == 'christianity' ? 'selected' : '' }} value="christianity">Christianity</option>
                            <option {{ $staff->religion == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                            <option {{ $staff->religion == 'others' ? 'selected' : '' }} value="others">Others</option>
                        </select>
                        @error('religion')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ $staff->level == 'Lecturer 1' ? 'selected' : '' }} value="Lecturer 1">Lecturer 1</option>
                                <option {{ $staff->level == 'Lecturer 2' ? 'selected' : '' }} value="Lecturer 2">Lecturer 2</option>
                                <option {{ $staff->level == 'Senior Lecturer' ? 'selected' : '' }} value="Senior Lecturer">Senior Lecturer</option>
                            </select>
                            @error('level')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Position</label>
                            <select name="position" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ $staff->position == 'None' ? 'selected' : 'selected' }} value="None">None</option>
                                <option {{ $staff->position == 'Head Of Department' ? 'selected' : '' }} value="Head Of Department">Head Of Department</option>
                                <option {{ $staff->position == 'Exam Officer' ? 'selected' : '' }} value="Exam Officer">Exam Officer</option>
                                <option {{ $staff->position == 'Project Coordinator' ? 'selected' : '' }} value="Project Coordinator">Project Coordinator</option>
                            </select>
                            @error('position')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="">Address</label>
                            <textarea name="address" cols="30" rows="10" placeholder="Enter your home address" class="form-control">{{ $staff->address }}</textarea>
                            @error('address')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection