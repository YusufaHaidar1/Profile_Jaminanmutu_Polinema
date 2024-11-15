@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/admin/sidebar') }}" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Parent</label>
            <div class="col-11">
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">- Pilih Parent -</option>
                    @foreach($menuss as $menu)
                        <option value="{{ $menu->id_menu }}" @if(isset($sidebar) && $menu->id_menu == $sidebar->parent_id) selected @endif>{{ $menu->label }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Label</label>
            <div class="col-11">
                <input type="text" class="form-control" id="label" name="label" value="{{ old('label') }}" required>
            @error('label')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Link</label>
            <div class="col-11">
                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
            @error('link')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-1 control-label col-form-label"></label>
            <div class="col-11">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-sm btn-default ml-1" href="{{ url('/admin/sidebar') }}">Kembali</a>
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