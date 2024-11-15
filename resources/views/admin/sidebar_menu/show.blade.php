@extends('layouts.cms.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($sidebar)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        @else
    <table class="table table-bordered table-striped table-hover tablesm">
        <tr>
            <th>ID</th>
            <td>{{ $sidebar->id_menu }}</td>
        </tr>
        <tr>
            <th>Group</th>
            <td>{{ $sidebar->group->name }}</td>
        </tr>
        <tr>
            <th>Level</th>
            <td>{{ $sidebar->level }}</td>
        </tr>
        <tr>
            <th>Parent ID</th>
            <td>{{ $sidebar->parent_id }}</td>
        </tr>
        <tr>
            <th>Label</th>
            <td>{{ $sidebar->label }}</td>
        </tr>
        <tr>
            <th>Link</th>
            <td>{{ $sidebar->link }}</td>
        </tr>
        </table>
    @endempty
    <a href="{{ url('/admin/sidebar') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush