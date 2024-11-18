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
                <a href="{{ url('/member/profile') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/member/profile/' . $profile->id_profile) }}" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Gambar</label>
                        <div class="col-11">
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            @if ($profile->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset($profile->gambar) }}" alt="Gambar Profile" class="img-fluid"
                                        style="max-width: 300px;">
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
                            @if ($profile->gambar_eng)
                                <div class="mt-2">
                                    <img src="{{ asset($profile->gambar_eng) }}" alt="Gambar Profile Eng" class="img-fluid"
                                        style="max-width: 300px;">
                                </div>
                            @endif
                            @error('gambar_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Judul</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ old('judul', $profile->judul) }}" required>
                            @error('judul')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Judul Eng</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="judul_eng" name="judul_eng"
                                value="{{ old('judul_eng', $profile->judul_eng) }}" required>
                            @error('judul_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Deskripsi</label>
                        <div class="col-11">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $profile->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Deskripsi Eng</label>
                        <div class="col-11">
                            <textarea class="form-control" id="deskripsi_eng" name="deskripsi_eng" required>{{ old('deskripsi_eng', $profile->deskripsi_eng) }}</textarea>
                            @error('deskripsi_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/profile') }}">Kembali</a>
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
