@extends('layouts.personel')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Email</h4>
                    </div>
                    <div class="card-body">
                        {{ $personel->email }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-mobile"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Phone</h4>
                    </div>
                    <div class="card-body">
                        {{ $personel->phone }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection