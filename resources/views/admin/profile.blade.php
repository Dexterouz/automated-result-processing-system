@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ auth()->user()->first_name }}!</h2>
    <p class="section-lead">Change information about yourself on this page.</p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Username</div>
                            <div class="profile-widget-item-value">Admin</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Role</div>
                            <div class="profile-widget-item-value">{{ auth()->user()->role }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">
                        {{ ucwords(auth()->user()->first_name." ".auth()->user()->last_name) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <x-alert type="success"></x-alert>
            <div class="card">
                <form method="post" action="{{ route('admin.profile') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ auth()->user()->first_name }}">
                                @error('first_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ auth()->user()->last_name }}">
                                @error('last_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" readonly value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}">
                                @error('username')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-md-12 col-12">
                            <label>Role</label>
                            <select class="form-control">
                                <option value="">-- Select --</option>
                                <option value="superuser">Superuser</option>
                                <option value="admin">Admin</option>
                            </select>
                            </div>
                        </div> --}}
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