@extends('layouts.cms.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($user)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        @else
    <table class="table table-bordered table-striped table-hover tablesm">
        <tr>
            <th>ID</th>
            <td>{{ $user->id_user }}</td>
        </tr>
        <tr>
            <th>Group</th>
            <td>{{ $user->group->name }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $user->no_hp }}</td>
        </tr>
        <tr>
            <th>Password</th>
            <td>********</td>
        </tr>
        </table>
    @endempty
    <a href="{{ url('/admin/user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush