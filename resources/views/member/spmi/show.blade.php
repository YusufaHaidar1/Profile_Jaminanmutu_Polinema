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
        @else
        <table class="table table-bordered table-striped table-hover tablesm">
            <tr>
                <th>ID</th>
                <td>{{ $spmi->id_spmi }}</td>
            </tr>
            <tr>
                <th>SPMI</th>
                <td>{{ $spmi->spmi }}</td>
            </tr>
            
            <tr>
                <th>Dokumen</th>
                <td>
                    @if($spmi->file)
                    <a href="{{ url('/storage/' . $spmi->file) }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fas fa-file-pdf"></i> Lihat Dokumen
                    </a>
                    @else
                    <span class="text-muted">Tidak ada dokumen</span>
                    @endif
                </td>
            </tr>
        </table>
        @endempty
        <a href="{{ url('/member/spmi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
