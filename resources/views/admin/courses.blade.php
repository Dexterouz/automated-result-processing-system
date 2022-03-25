@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Courses</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Courses</div>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Select Level</h2>
    <p class="section-lead">All available courses for each level</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <a href="{{ route('admin.add.course') }}" class="btn btn-success btn-icon btn-left"><i class="fas fa-plus"></i> Add New Course</a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                <span class="fa-stack">
                    <span class="fas fa-circle-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x" style="font-size: 20px !important">
                        100
                    </strong>
                </span>
                </div>
                <div class="card-body">
                    <h4>100 Level</h4>
                    <p>General settings such as, site title, site description, address and so on.</p>
                    <a href="{{ route('admin.show.courses', '100l') }}" class="card-cta">Click <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                <span class="fa-stack">
                    <span class="fas fa-circle-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x" style="font-size: 20px !important">
                        200
                    </strong>
                </span>
                </div>
                <div class="card-body">
                    <h4>200 Level</h4>
                    <p>Search engine optimization settings, such as meta tags and social media.</p>
                    <a href="{{ route('admin.show.courses', '200l') }}" class="card-cta">Click <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                <span class="fa-stack">
                    <span class="fas fa-circle-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x" style="font-size: 20px !important">
                        300
                    </strong>
                </span>
                </i></div>
                <div class="card-body">
                    <h4>300 Level</h4>
                    <p>Email SMTP settings, notifications and others related to email.</p>
                    <a href="{{ route('admin.show.courses', '300l') }}" class="card-cta">Click <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                <span class="fa-stack">
                    <span class="fas fa-circle-o fa-stack-2x"></span>
                    <strong class="fa-stack-1x" style="font-size: 20px !important">
                        400
                    </strong>
                </span>
                </div>
                <div class="card-body">
                    <h4>400 Level</h4>
                    <p>PHP version settings, time zones and other environments.</p>
                    <a href="{{ route('admin.show.courses', '400l') }}" class="card-cta">Click <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection