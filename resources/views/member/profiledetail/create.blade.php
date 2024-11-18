@extends('layouts.cms.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/member/profiledetail') }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Role</label>
                    <div class="col-11">
                        <select class="form-control" id="id_profile" name="id_profile" required>
                            <option value="">- Pilih Group -</option>
                            @foreach ($profile as $item)
                                <option value="{{ $item->id_profile }}">{{ $item->judul }}</option>
                            @endforeach
                        </select>
                        @error('id_profile')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">jenis</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}"
                            required>
                        @error('jenis')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">jenis_eng</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="jenis_eng" name="jenis_eng"
                            value="{{ old('jenis_eng') }}" required>
                        @error('jenis_eng')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">detail_profile</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="detail_profile" name="detail_profile"
                            value="{{ old('detail_profile') }}" required>
                        @error('detail_profile')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">detail_profile_eng</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="detail_profile_eng" name="detail_profile_eng"
                            value="{{ old('ddetail_profile_eng') }}" required>
                        @error('detail_profile_eng')
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
