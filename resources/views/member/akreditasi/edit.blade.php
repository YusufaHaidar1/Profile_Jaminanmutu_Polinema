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
        <a href="{{ url('/member/akreditasi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('/member/akreditasi/'.$akreditasi->id_akreditasi) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            {!! method_field('PUT')!!}
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Jenjang</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ old('jenjang', $akreditasi->jenjang) }}" required>
                @error('jenjang')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">SK</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="sk" name="sk" value="{{ old('sk', $akreditasi->sk) }}" required>
                @error('sk')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nama</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $akreditasi->nama) }}" required>
                @error('nama')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nama Eng</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama_eng" name="nama_eng" value="{{ old('nama_eng', $akreditasi->nama_eng) }}" required>
                @error('nama_eng')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Skor</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="skor" name="skor" value="{{ old('skor', $akreditasi->skor) }}" required>
                @error('skor')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Masa Berlaku Dari</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="masa_berlaku_dari" name="masa_berlaku_dari" value="{{ old('masa_berlaku_dari', $akreditasi->masa_berlaku_dari) }}" required>
                @error('masa_berlaku_dari')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Masa Berlaku Sampai</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="masa_berlaku_sampai" name="masa_berlaku_sampai" value="{{ old('masa_berlaku_sampai', $akreditasi->masa_berlaku_sampai) }}" required>
                @error('masa_berlaku_sampai')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Dokumen</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="dokumen" name="dokumen" value="{{ old('dokumen', $akreditasi->dokumen) }}" required>
                @error('dokumen')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/akreditasi') }}">Kembali</a>
                </div>
            </div>
        </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush