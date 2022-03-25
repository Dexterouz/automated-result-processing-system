@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Semester settings</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Semester settings</div>
    </div>
    </div>
    <div class="row">
    <div class="col-12">
        <x-alert type="success"></x-alert>
        <div class="card">
            <div class="card-header">
                <h4>Semester</h4>
                <div class="card-header-form">
                    <form action="{{ route('admin.semester.setting') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="semester" placeholder="Add new semester" required>
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped v_center">
                        <tr>
                            <th class="p-0 text-center">Default</th>
                            <th>S/N</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                        @if ($semesters->count() > 0)
                            @foreach ($semesters as $semester)
                            <tr>
                                <td class="p-0 text-center">
                                    <i class="fas {{ $semester->default == "yes" ? "fa-check text-success" : "fa-times text-warning" }}"></i>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $semester->semester }}</td>
                                <td class="d-flex align-items-center">
                                    <form action="{{ route('admin.update.semester', $semester) }}" id="change{{ $semester->id }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        @if ($semester->default == "yes")
                                            <input type="hidden" name="default" value="no">
                                            <a href="#" data-toggle="tooltip" title="Unset Default" data-confirm="Confirm Action?|Do you want to continue?" data-confirm-yes="document.getElementById('change{{ $semester->id }}').submit()" class="text-danger"><i class="fas fa-times"></i></a>
                                        @else
                                            <input type="hidden" name="default" value="yes">
                                            <a href="#" data-toggle="tooltip" title="Set Default" data-confirm="Confirm Action?|Do you want to continue?" data-confirm-yes="document.getElementById('change{{ $semester->id }}').submit()" class="text-success"><i class="fas fa-check"></i></a>
                                        @endif
                                    </form>
                                    <form action="{{ route('admin.delete.semester', $semester) }}" id="delete{{ $semester->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" data-toggle="tooltip" title="Delete" data-confirm="Confirm Delete?|Do you want to continue?" data-confirm-yes="document.getElementById('delete{{ $semester->id }}').submit()" class="text-danger"><i class="fas fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4"><center><em>No session found</em></center></td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection