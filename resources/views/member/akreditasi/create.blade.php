@extends('layouts.cms.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/member/akreditasi') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
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
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">SK</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="sk" name="sk" value="{{ old('sk') }}" required>
                    @error('sk')
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
                <label class="col-1 control-label col-form-label">Nama English</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="nama_eng" name="nama_eng" value="{{ old('nama_eng') }}" required>
                    @error('nama_eng')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Skor</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="skor" name="skor" value="{{ old('skor') }}" required>
                    @error('skor')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Masa Berlaku Dari</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="masa_berlaku_dari" name="masa_berlaku_dari" required>
                    @error('masa_berlaku_dari')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Masa Berlaku Sampai</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="masa_berlaku_sampai" name="masa_berlaku_sampai" required>
                    @error('masa_berlaku_sampai')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Dokumen</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="dokumen" name="dokumen" required>
                    @error('dokumen')
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