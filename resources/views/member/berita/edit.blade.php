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
        <a href="{{ url('/member/berita') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('/member/berita/'.$berita->id_berita) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            {!! method_field('PUT')!!}
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Penulis</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $berita->penulis) }}" required>
                @error('penulis')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Tanggal</label>
                <div class="col-11">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}" required>
                @error('tanggal')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Judul</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                @error('judul')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Judul Eng</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="judul_eng" name="judul_eng" value="{{ old('judul_eng', $berita->judul_eng) }}" required>
                @error('judul_eng')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Deskripsi</label>
                <div class="col-11">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Deskripsi Eng</label>
                <div class="col-11">
                    <textarea class="form-control" id="deskripsi_eng" name="deskripsi_eng" required>{{ old('deskripsi_eng', $berita->deskripsi_eng) }}</textarea>
                    @error('deskripsi_eng')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Gambar</label>
                <div class="col-11">
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    @if($berita->gambar)
                        <div class="mt-2">
                            <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid" style="max-width: 300px;">
                        </div>
                    @endif
                    @error('gambar')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Gambar Eng</label>
                <div class="col-11">
                    <input type="file" class="form-control" id="gambar_eng" name="gambar_eng" accept="image/*">
                    @if($berita->gambar_eng)
                        <div class="mt-2">
                            <img src="{{ asset($berita->gambar_eng) }}" alt="Gambar Berita Eng" class="img-fluid" style="max-width: 300px;">
                        </div>
                    @endif
                    @error('gambar_eng')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/berita') }}">Kembali</a>
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