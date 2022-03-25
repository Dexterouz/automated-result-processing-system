@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Add New Course</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.courses') }}">Courses</a></div>
        <div class="breadcrumb-item">Add New Course</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Add New Course Form</h4>
            </div>
            <div class="card-body p-0">
                <form method="post" action="{{ route('admin.add.course') }}">
                @csrf
                <div class="card-body">
                    <x-alert type="success"></x-alert>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Course Title</label>
                            <input type="text" class="form-control" name="course_title" value="{{ old('course_title') }}" placeholder="Enter course title">
                            @error('course_title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Course Code</label>
                            <input type="text" class="form-control" name="course_code" value="{{ old('course_code') }}" placeholder="Enter course code">
                            @error('course_code')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ old('level') == '100l' ? 'selected' : '' }} value="100l">100L</option>
                            <option {{ old('level') == '200l' ? 'selected' : '' }} value="200l">200L</option>
                            <option {{ old('level') == '300l' ? 'selected' : '' }} value="300l">300L</option>
                            <option {{ old('level') == '400l' ? 'selected' : '' }} value="400l">400L</option>
                        </select>
                        @error('level')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label>Semester</label>
                            <select name="semester" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ old('semester') == '1' ? 'selected' : '' }} value="1">1</option>
                                <option {{ old('semester') == '2' ? 'selected' : '' }} value="2">2</option>
                            </select>
                            @error('semester')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Unit Load</label>
                            <select name="unit_load" class="form-control">
                                <option value="">-- Select --</option>
                                @for ($i = 1; $i <= 10; $i++)
                                <option {{ old('unit_load') ==  $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('unit_load')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary btn-icon btn-left"><i class="fas fa-plus"></i> Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection