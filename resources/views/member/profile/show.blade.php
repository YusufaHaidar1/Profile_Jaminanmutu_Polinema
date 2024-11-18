@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($profile)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID profile</th>
                        <td>{{ $profile->id_profile }}</td>
                    </tr>
                    <tr>
                        <th>gambar</th>
                        <td>{{ $profile->gambar }}</td>
                    </tr>
                    <tr>
                        <th>gambar eng</th>
                        <td>{{ $profile->gambar_eng }}</td>
                    </tr>
                    <tr>
                        <th>judul</th>
                        <td>{{ $profile->judul }}</td>
                    </tr>
                    <tr>
                        <th>judul Eng</th>
                        <td>{{ $profile->judul_eng }}</td>
                    </tr>
                    <tr>
                        <th>deskripsi</th>
                        <td>{{ $profile->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>deskripsii</th>
                        <td>{{ $profile->deskripsi_eng }}</td>
                    </tr>


                </table>
            @endempty
            <a href="{{ url('/member/profile') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
