@extends('layouts.cms.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($akreditasi)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        @else
    <table class="table table-bordered table-striped table-hover tablesm">
        <tr>
            <th>ID</th>
            <td>{{ $akreditasi->id_akreditasi }}</td>
        </tr>
        <tr>
            <th>Jenjang</th>
            <td>{{ $akreditasi->jenjang }}</td>
        </tr>
        <tr>
            <th>SK</th>
            <td>{{ $akreditasi->sk }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $akreditasi->nama }}</td>
        </tr>
        <tr>
            <th>Nama Eng</th>
            <td>{{ $akreditasi->nama_eng }}</td>
        </tr>
        <tr>
            <th>Masa Berlaku Dari</th>
            <td>{{ $akreditasi->masa_berlaku_dari }}</td>
        </tr>
        <tr>
            <th>Masa Berlaku Sampai</th>
            <td>{{ $akreditasi->masa_berlaku_sampai }}</td>
        </tr>
        <tr>
            <th>Dokumen</th>
            <td>{{ $akreditasi->dokumen }}</td>
        </tr>
       
        </table>
    @endempty
    <a href="{{ url('/member/akreditasi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush