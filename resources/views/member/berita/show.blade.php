@extends('layouts.cms.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($berita)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        @else
    <table class="table table-bordered table-striped table-hover tablesm">
        <tr>
            <th>ID</th>
            <td>{{ $berita->id_berita }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $berita->penulis }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $berita->tanggal }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $berita->judul }}</td>
        </tr>
        <tr>
            <th>Judul Eng</th>
            <td>{{ $berita->judul_eng }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $berita->deskripsi }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $berita->deskripsi_eng }}</td>
        </tr>
        <tr>
            <th>Gambar</th>
            <td>{{ $berita->gambar }}</td>
        </tr>
        <tr>
            <th>Gambar Eng</th>
            <td>{{ $berita->gambar_eng }}</td>
        </tr>
        </table>
    @endempty
    <a href="{{ url('/member/berita') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush