@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Edit Student</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.students') }}">Students</a></div>
        <div class="breadcrumb-item">Edit Student</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>New Student Form</h4>
            </div>
            <div class="card-body p-0">
                <form method="post" action="{{ route('admin.edit.student', $student) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-alert type="success"></x-alert>
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12 col-12">
                            <label class="text-center">Image</label>
                            <input name="image" class="dropify" data-default-file="{{ asset("images/student/{$student->image}") }}" type="file" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}">
                            @error('first_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}">
                            @error('last_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $student->email }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Date of birth</label>
                            <input type="text" name="dob" class="form-control" placeholder="e.g 12/03/1994" value="{{ $student->dob }}">
                            @error('dob')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Programme</label>
                        <select name="programme" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $student->programme == 'b.sc' ? 'selected' : '' }} value="b.sc">B.sc</option>
                            <option {{ $student->programme == 'msc' ? 'selected' : '' }} value="msc">Msc</option>
                            <option {{ $student->programme == 'phd' ? 'selected' : '' }} value="phd">Phd</option>
                        </select>
                        @error('programme')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                        <label>Sex</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $student->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                            <option {{ $student->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Religion</label>
                        <select name="religion" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $student->religion == 'christianity' ? 'selected' : '' }} value="christianity">Christianity</option>
                            <option {{ $student->religion == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                            <option {{ $student->religion == 'others' ? 'selected' : '' }} value="others">Others</option>
                        </select>
                        @error('religion')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ $student->level == '100l' ? 'selected' : '' }} value="100l">100L</option>
                            <option {{ $student->level == '200l' ? 'selected' : '' }} value="200l">200L</option>
                            <option {{ $student->level == '300l' ? 'selected' : '' }} value="300l">300L</option>
                            <option {{ $student->level == '400l' ? 'selected' : '' }} value="400l">400L</option>
                        </select>
                        @error('level')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                        <label for="">Address</label>
                        <textarea name="address" cols="30" rows="10" placeholder="Enter your home address" class="form-control">{{ $student->address }}</textarea>
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