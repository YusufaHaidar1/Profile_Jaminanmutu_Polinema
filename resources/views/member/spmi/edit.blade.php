@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($spmi)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('/member/spmi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('/member/spmi/'.$spmi->id_spmi) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">SPMI</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="spmi" name="spmi" value="{{ old('spmi', $spmi->spmi) }}" required>
                    @error('spmi')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Dokumen</label>
                <div class="col-11">
                    <div class="mb-2">
                        <a href="{{ url('/storage/' . $spmi->file) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-file-pdf"></i> Lihat Dokumen
                        </a>
                    </div>
                    <input type="file" class="form-control-file" id="file" name="file" accept=".pdf">
                    <small class="form-text text-muted">Unggah dokumen baru jika ingin mengganti (PDF).</small>
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
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
