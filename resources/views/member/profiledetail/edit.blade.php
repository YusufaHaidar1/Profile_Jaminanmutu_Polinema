@extends('layouts.cms.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($profiledetail)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('/member/profiledetail') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/member/profiledetail/' . $profiledetail->id_detail_profile) }}"
                    class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">ID profile</label>
                        <div class="col-11">
                            <select class="form-control" id="id_profile" name="id_profile" required>
                                <option value="">- Pilih ID profile -</option>
                                @foreach ($profile as $item)
                                    <option value="{{ $item->id_profile }}" @if ($item->id_profile == $profiledetail->id_profile) selected @endif>
                                        {{ $item->id_profile }}</option>
                                @endforeach
                            </select>
                            @error('id_profile')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Jenis</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="jenis" name="jenis"
                                value="{{ old('jenis', $profiledetail->jenis) }}" required>
                            @error('jenis')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Jenis Eng</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="jenis_eng" name="jenis_eng"
                                value="{{ old('jenis_eng', $profiledetail->jenis_eng) }}" required>
                            @error('jenis_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Detail profile</label>
                        <div class="col-11">
                            <textarea class="form-control" id="detail_profile" name="detail_profile" required>{{ old('detail_profile', $profiledetail->detail_profile) }}</textarea>
                            @error('detail_profile')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Detail profile Eng</label>
                        <div class="col-11">
                            <textarea class="form-control" id="detail_profile_eng" name="detail_profile_eng" required>{{ old('detail_profile_eng', $profiledetail->detail_profile_eng) }}</textarea>
                            @error('detail_profile_eng')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/profiledetail') }}">Kembali</a>
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
