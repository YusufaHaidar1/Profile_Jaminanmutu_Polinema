@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('/member/berita/create')}}">Tambah</a>
            </div>
        </div>
            <div class="card-body">
                @if (@session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (@session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <table class="table table-bordered table-striped table-hover table-sm" id="table_berita">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Judul Eng</th>
                        <th>Deskripsi</th>
                        <th>Deskripsi Eng</th>
                        <th>Gambar</th>
                        <th>Gambar Eng</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                </table>
            </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')

<script>
    $(document).ready(function() {
    var dataLevel = $('#table_berita').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('/member/berita/list') }}",
            type: "POST",
            data: function (d) {
                d.id_berita = $('#id_berita').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
            { data: "penulis", className: "", orderable: true, searchable: true },
            { data: "tanggal", className: "", orderable: true, searchable: true },
            { data: "judul", className: "", orderable: true, searchable: true },
            { data: "judul_eng", className: "", orderable: true, searchable: true },
            { data: "deskripsi", className: "", orderable: true, searchable: true },
            { data: "deskripsi_eng", className: "", orderable: true, searchable: true },
            { data: "gambar", className: "", orderable: false, searchable: false }, // Image column
            { data: "gambar_eng", className: "", orderable: false, searchable: false }, // Image Eng column
            { data: "aksi", className: "", orderable: false, searchable: false }
        ]
    });

    $('#id_berita').on('change', function() {
        dataLevel.ajax.reload();
    });
});
</script>
@endpush