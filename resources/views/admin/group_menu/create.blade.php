@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/admin/group_menu') }}" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Group</label>
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
            <label class="col-1 control-label col-form-label">Menu</label>
            <div class="col-11">
                <select class="form-control" id="id_menu" name="id_menu" required>
                    <option value="">- Pilih Menu -</option>
                @foreach($menu as $item)
                    <option value="{{ $item->id_menu }}">{{ $item->label}}</option>
                @endforeach
                </select>
                @error('id_menu')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label"></label>
            <div class="col-11">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-sm btn-default ml-1" href="{{ url('/admin/group_menu') }}">Kembali</a>
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