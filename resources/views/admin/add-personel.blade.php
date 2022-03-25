@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Add New Personel</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.external.personel') }}">Personels</a></div>
        <div class="breadcrumb-item">Add New Personel</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>New Personel Form</h4>
            </div>
            <div class="card-body p-0">
                <form method="post" action="{{ route('admin.add.personel') }}" enctype="multipart/form-data">
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
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
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
                            <label>Gender</label>
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
                            <label>Account Status</label>
                            <select name="account_status" class="form-control">
                                <option value="">-- Select --</option>
                                <option {{ old('account_status') == 'active' ? 'selected' : '' }} value="active">Active</option>
                                <option {{ old('account_status') == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                            </select>
                            @error('account_status')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Add Personel</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection