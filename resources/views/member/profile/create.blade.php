@extends('layouts.cms.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/member/profile') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group row">
                <label class="col-1 control-label col-form-label">Jenjang</label>
                <div class="col-11">
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="">- Pilih Jenjang -</option>
                        <option value="institusi">Institusi</option>
                        <option value="d3">Program Studi D-III</option>
                        <option value="d4">Program Studi D-IV</option>
                        <option value="s2">Program Studi S2</option>
                    </select>
                    @error('jenjang')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div> --}}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Gambar</label>
                    <div class="col-11">
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        @error('gambar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Gambar Eng</label>
                    <div class="col-11">
                        <input type="file" class="form-control" id="gambar_eng" name="gambar_eng" accept="image/*"
                            required>
                        @error('gambar_eng')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">judul</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                            required>
                        @error('judul')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">judul_eng</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="judul_eng" name="judul_eng"
                            value="{{ old('judul_eng') }}" required>
                        @error('judul_eng')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">deskripsi</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="{{ old('deskripsi') }}" required>
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">deskripsi_eng</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="deskripsi_eng" name="deskripsi_eng"
                            value="{{ old('deskripsi_eng') }}" required>
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
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
