@extends('layouts.personel')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('personel.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
    <h2 class="section-title">Welcome, {{ $personel->first_name }}!</h2>
    <p class="section-lead">Change information about yourself on this page.</p>

    <x-alert type="success"></x-alert>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset("images/personel/{$personel->image}") }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Staff ID</div>
                            <div class="profile-widget-item-value"></div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Level</div>
                            <div class="profile-widget-item-value"></div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">
                        {{ ucwords($personel->first_name." ".$personel->last_name) }}
                        <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> External Officer</div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form action="{{ route('personel.profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $personel->first_name }}">
                                @error('first_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $personel->last_name }}">
                                @error('last_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $personel->email }}">
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $personel->phone }}">
                                @error('phone')
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