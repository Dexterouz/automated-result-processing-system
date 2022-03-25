@extends('layouts.student')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('student.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ ucfirst(auth('student')->user()->first_name) }}!</h2>
    <p class="section-lead">Change information about yourself on this page.</p>

    <x-alert type="success"></x-alert>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('images/student/'.$student->image) }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Matric No.</div>
                            <div class="profile-widget-item-value">{{ $student->matric_no }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Level</div>
                            <div class="profile-widget-item-value">{{ $student->level }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">
                        {{ ucwords($student->first_name." ".$student->last_name) }}
                        <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> Regular Student</div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" action="{{ route('student.profile.update', $student) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}">
                                @error('first_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $student->first_name }}">
                                @error('last_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $student->email }}">
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
                            <div class="form-group col-md-12 col-12">
                                <label>Date of birth</label>
                                <input type="text" name="dob" class="form-control" placeholder="e.g 12/03/1994" value="{{ $student->dob }}">
                                @error('dob')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ $student->gender == "male" ? "selected" : "" }} value="male">Male</option>
                                <option {{ $student->gender == "female" ? "selected" : "" }} value="female">Female</option>
                                @error('gender')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                            <label>Religion</label>
                            <select name="religion" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ $student->religion == "christianity" ? "selected" : "" }} value="christianity">Christianity</option>
                                <option {{ $student->religion == "islam" ? "selected" : "" }} value="islam">Islam</option>
                                <option {{ $student->religion == "others" ? "selected" : "" }} value="others">Others</option>
                                @error('religion')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="10" placeholder="Enter your home address" class="form-control">{{ $student->address }}</textarea>
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection