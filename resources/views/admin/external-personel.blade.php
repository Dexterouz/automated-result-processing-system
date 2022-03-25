@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>External Personnel</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">External Personnel</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('admin.add.personel') }}" class="btn btn-success btn-icon btn-left">
                <i class="fas fa-plus"></i>
                    Add New Personnel
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <x-alert type="success"></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>External Personnel</h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped v_center">
                        <tr>
                            <th>Image</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</td>
                            <th>Account Status</th>
                            <th>Action</th>
                        </tr>
                        @if ($personels->count() > 0)
                            @foreach ($personels as $personel)
                                <tr>
                                    <td>
                                        <img alt="image"
                                            src="{{ asset("images/personel/{$personel->image}") }}"
                                            class="rounded-circle"
                                            width="35"
                                            data-toggle="tooltip"
                                            title="{{ ucwords($personel->first_name.' '.$personel->last_name) }}"
                                        >
                                    </td>
                                    <td>{{ ucwords($personel->first_name.' '.$personel->last_name) }}</td>
                                    <td>{{ $personel->gender }}</td>
                                    <td>{{ $personel->phone }}</td>
                                    <td>{{ $personel->email }}</td>
                                    <td>
                                        <span class="badge badge-{{ $personel->account_status == 'active' ? 'success' : 'warning' }}">{{ ucfirst($personel->account_status) }}</span>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('admin.edit.personel', $personel) }}" data-toggle="tooltip" title="Edit" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('admin.restrict.personel', $personel) }}" id="restrict{{ $personel->id }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            @if ($personel->account_status == 'active')
                                                <input type="hidden" name="status" value="inactive">
                                                <a href="#" data-toggle="tooltip" title="De-activate" data-confirm="Confirm Action?|Do you want to De-activate this personel?" data-confirm-yes="document.getElementById('restrict{{ $personel->id }}').submit()" class="text-warning">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            @else
                                                <input type="hidden" name="status" value="active">
                                                <a href="#" data-toggle="tooltip" title="Activate" data-confirm="Confirm Action?|Do you want to Activate this personel?" data-confirm-yes="document.getElementById('restrict{{ $personel->id }}').submit()" class="text-info">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            @endif
                                        </form>
                                        <form action="{{ route('admin.delete.personel', $personel) }}" id="delete{{ $personel->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" data-toggle="tooltip" title="Delete" data-confirm="Confirm Delete?|Do you want to continue?" data-confirm-yes="document.getElementById('delete{{ $personel->id }}').submit()" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <center><em>No External Personel</em></center>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection