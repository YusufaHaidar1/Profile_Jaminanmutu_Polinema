@extends('layouts.admin.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($group)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        @else
    <table class="table table-bordered table-striped table-hover tablesm">
        <tr>
            <th>ID</th>
            <td>{{ $group->id_group }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $group->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $group->description }}</td>
        </tr>
        </table>
    @endempty
    <a href="{{ url('/admin/group') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush