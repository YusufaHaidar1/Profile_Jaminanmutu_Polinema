@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/member/spmi') }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">SPMI</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="spmi" name="spmi" value="{{ old('spmi') }}" required>
                    @error('spmi')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Dokumen (PDF)</label>
                <div class="col-11">
                    <input type="file" class="form-control-file" id="file" name="file" accept=".pdf" required>
                    <small class="form-text text-muted">Hanya file dengan format PDF yang diperbolehkan.</small>
                    @error('file')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('/member/spmi') }}">Kembali</a>
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
