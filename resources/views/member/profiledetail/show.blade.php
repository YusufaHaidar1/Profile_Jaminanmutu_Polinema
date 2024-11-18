@extends('layouts.cms.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($profiledetail)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover tablesm">
                    <tr>
                        <th>ID profile detail</th>
                        <td>{{ $profiledetail->id_detail_profile }}</td>
                    </tr>
                    <tr>
                        <th>jenis</th>
                        <td>{{ $profiledetail->jenis }}</td>
                    </tr>
                    <tr>
                        <th>jenis eng</th>
                        <td>{{ $profiledetail->jenis_eng }}</td>
                    </tr>
                    <tr>
                        <th>detail profile</th>
                        <td>{{ $profiledetail->detail_profile }}</td>
                    </tr>
                    <tr>
                        <th>detail profile Eng</th>
                        <td>{{ $profiledetail->detail_profile_eng }}</td>
                    </tr>



                </table>
            @endempty
            <a href="{{ url('/member/profiledetail') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
