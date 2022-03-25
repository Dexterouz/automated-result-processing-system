@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Staffs</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Staffs</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="{{ route('admin.add.staff') }}" class="btn btn-success btn-icon btn-left">
                <i class="fas fa-plus"></i>
                    Add New Staff
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Students</h4>
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
                            <th>Title</th>
                            <th>Fullname</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th>Email</td>
                            <th>Staff ID</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        @if ($staffs->count() > 0)
                            @foreach ($staffs as $staff)
                            <tr>
                                <td>
                                    <img
                                        alt="image"
                                        src="{{ asset("images/staff/{$staff->image}") }}"
                                        class="rounded-circle"
                                        width="35"
                                        data-toggle="tooltip"
                                        title="{{ ucwords($staff->first_name.' '.$staff->last_name) }}"
                                    >
                                </td>
                                <td>{{ $staff->title }}</td>
                                <td>{{ ucwords($staff->first_name.' '.$staff->last_name) }}</td>
                                <td>{{ $staff->gender }}</td>
                                <td>{{ $staff->phone }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->staff_no }}</td>
                                <td>{{ $staff->level }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.edit.staff', $staff) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('admin.delete.staff', $staff) }}" id="delete{{ $staff->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" data-toggle="tooltip" title="Delete" data-confirm="Confirm Delete?|Do you want to continue?" data-confirm-yes="document.getElementById('delete{{ $staff->id }}').submit()" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><center><em>No Staff found</em></center></td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection