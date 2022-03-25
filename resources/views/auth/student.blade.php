@extends('layouts.app')

@section('title')
    Student
@endsection

@section('content')
<div class="card-body">
    <x-alert type="error"></x-alert>
    <form method="POST" action="{{ route('student.login') }}">
        @csrf
        <div class="form-group">
            <label for="matric_no">Matric No.</label>
            <input id="matric_no" type="text" class="form-control" name="matric_no">
            @error('matric_no')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">Password</label>
                <div class="float-right">
                    <a href="auth-forgot-password.html" class="text-small">
                    Forgot Password?
                    </a>
                </div>
            </div>
            <input id="password" type="password" class="form-control" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
            </button>
        </div>
        <div class="text-center"><a href="{{ route('index') }}">Back Home</a></div>
    </form>
</div>
@endsection