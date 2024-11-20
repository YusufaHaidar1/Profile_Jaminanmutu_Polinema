@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($beranda)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID Beranda</th>
                        <td>{{ $beranda->id_beranda }}</td>
                    </tr>
                    <tr>
                        <th>judul</th>
                        <td>{{ $beranda->judul }}</td>
                    </tr>
                    <tr>
                        <th>judul Eng</th>
                        <td>{{ $beranda->judul_eng }}</td>
                    </tr>
                    <tr>
                        <th>deskripsi</th>
                        <td>{{ $beranda->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>deskripsii</th>
                        <td>{{ $beranda->deskripsi_eng }}</td>
                    </tr>


                </table>
            @endempty
            <a href="{{ url('/member/beranda') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
