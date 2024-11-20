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
                <a href="{{ url('/member/beranda') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/member/beranda/' . $beranda->id_beranda) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Judul</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ old('judul', $beranda->judul) }}" required>
                            @error('judul')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Judul Eng</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="judul_eng" name="judul_eng"
                                value="{{ old('judul_eng', $beranda->judul_eng) }}" required>
                            @error('judul_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Deskripsi</label>
                        <div class="col-11">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $beranda->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Deskripsi Eng</label>
                        <div class="col-11">
                            <textarea class="form-control" id="deskripsi_eng" name="deskripsi_eng" required>{{ old('deskripsi_eng', $beranda->deskripsi_eng) }}</textarea>
                            @error('deskripsi_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/beranda') }}">Kembali</a>
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
