@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('/member/spmi/create')}}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (@session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (@session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_spmi">
                <thead>
                    <tr><th>ID</th><th>SPMI</th><th>File</th><th>Aksi</th></tr>
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
        var dataTable = $('#table_spmi').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('/member/spmi/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.id_spmi = $('#id_spmi').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex", // nomor urut
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "spmi",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "file",
                    className: "",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `<a href="/storage/${data}" target="_blank" class="btn btn-info btn-sm">Download</a>`;
                    }
                },
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#id_spmi').on('change', function() {
            dataTable.ajax.reload();
        });
    });
</script>
@endpush
