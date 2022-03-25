@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Add New Student</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.students') }}">Students</a></div>
        <div class="breadcrumb-item">Add New Student</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>New Student Form</h4>
            </div>
            <div class="card-body p-0">
                <form method="post" action="{{ route('admin.add.student') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <x-alert type="success"></x-alert>
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12 col-12">
                            <label class="text-center">Image</label>
                            <input name="image" class="dropify" type="file" />
                            @error('image')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Date of birth</label>
                            <input type="text" name="dob" class="form-control" placeholder="e.g 12/03/1994" value="{{ old('dob') }}">
                            @error('dob')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Programme</label>
                        <select name="programme" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ old('programme') == 'b.sc' ? 'selected' : '' }} value="b.sc">B.sc</option>
                            <option {{ old('programme') == 'msc' ? 'selected' : '' }} value="msc">Msc</option>
                            <option {{ old('programme') == 'phd' ? 'selected' : '' }} value="phd">Phd</option>
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
                            <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">Male</option>
                            <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>Religion</label>
                        <select name="religion" class="form-control">
                            <option value="">-- Select --</option>
                            <option {{ old('religion') == 'christianity' ? 'selected' : '' }} value="christianity">Christianity</option>
                            <option {{ old('religion') == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                            <option {{ old('religion') == 'others' ? 'selected' : '' }} value="others">Others</option>
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
                            <label>Session</label>
                            <select name="session" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ old('session') == '2021/2022' ? 'selected' : 'selected' }} value="2021/2022">2021/2022</option>
                                <option {{ old('session') == '2022/2023' ? 'selected' : '' }} value="2022/2023">2022/2023</option>
                                <option {{ old('session') == '2022/2024' ? 'selected' : '' }} value="2022/2024">2022/2024</option>
                            </select>
                            @error('session')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                        <label for="">Address</label>
                        <textarea name="address" cols="30" rows="10" placeholder="Enter your home address" class="form-control">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Add Student</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection