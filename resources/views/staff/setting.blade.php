@extends('layouts.staff')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Settings</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('staff.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">General Settings</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">All About General Settings</h2>
        <p class="section-lead">You can adjust all general settings here</p>

        <x-alert type="success"></x-alert>
        <x-alert type="error"></x-alert>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Jump To</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="#" class="nav-link active">Change Password</a></li>
                            {{-- <li class="nav-item"><a href="#" class="nav-link">Email</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form id="setting-form" action="{{ route('staff.setting') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Old Password</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter old password">
                                    @error('old_password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                            <label for="site-title" class="form-control-label col-sm-3 text-md-right">New Password</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
                                @error('new_password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Cofirm New Password</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary" id="save-btn">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection