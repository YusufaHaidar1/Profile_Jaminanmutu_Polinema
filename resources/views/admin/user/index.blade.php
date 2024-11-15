@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('/admin/user/create')}}">Tambah</a>
            </div>
        </div>
            <div class="card-body">
                @if (@session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (@session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Filter :</label>
                            <div class="col-3">
                                <select name="id_group" id="id_group" class="form-control" required>
                                    <option value="">- Semua -</option>
                                    @foreach ($group as $item)
                                        <option value="{{ $item->id_group }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                    <small class="form-text text-muted">Group Pengguna</small>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover table-sm" id="table_users">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Group</th>
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
        var dataUser = $('#table_users').DataTable({
            serverSide: true, // serverSide: true, jika ingin menggunakan server side processing
            ajax: {
            "url": "{{ url('/admin/user/list') }}",
            "dataType": "json",
            "type": "POST",
            "data": function ( d ) {
                d.id_role = $('#id_role').val();
            }
            },
            columns: [
                {
                data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                className: "text-center",
                orderable: false,
                searchable: false
                },
                {
                data: "nama",
                className: "",
                orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                data: "email",
                className: "",
                orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                data: "no_hp",
                className: "",
                orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                data: "group.name",
                className: "",
                orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                },
                {
                data: "aksi",
                className: "",
                orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                }
            ]
        });

        $('#id_role').on('change', function() {
            dataUser.ajax.reload();
        });
    });
</script>
@endpush