@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/admin/user') }}" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Role</label>
            <div class="col-11">
                <select class="form-control" id="id_group" name="id_group" required>
                    <option value="">- Pilih Group -</option>
                @foreach($group as $item)
                    <option value="{{ $item->id_group }}">{{ $item->name}}</option>
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
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Email</label>
            <div class="col-11">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">No HP</label>
            <div class="col-11">
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Password</label>
            <div class="col-11">
                <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
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
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush