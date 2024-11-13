@extends('layouts.admin.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($user)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('/admin/user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('/admin/user/'.$user->id_user) }}" class="form-horizontal">
            @csrf
            {!! method_field('PUT')!!}
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Group</label>
                <div class="col-11">
                    <select class="form-control" id="id_group" name="id_group" required>
                        <option value="">- Pilih Group -</option>
                    @foreach($role as $item)
                        <option value="{{ $item->id_group }}" @if($item->id_group == $user->id_group) selected @endif>{{ $item->nama}}</option>
                    @endforeach
                    </select>
                    @error('id_group')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nama</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                @error('nama')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Email</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">No HP</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" required>
                @error('no_hp')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Password</label>
                <div class="col-11">
                    <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @else
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('/admin/user') }}">Kembali</a>
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