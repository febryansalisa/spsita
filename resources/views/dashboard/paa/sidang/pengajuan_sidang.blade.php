@extends('templates.master')

@section('title') Pengajuan Sidang @endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i> {{ session()->get('success') }}
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Sidang</h1>
</div>

<div class="table-responsive my-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                <th scope="col">Mahasiswa</th>
                <th scope="col">Tanggal Pengajuan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuanSidang as $pengajuan)
            <tr>
                <td>{{ $pengajuan->mahasiswa->nama }}</td>
                <td>{{ $pengajuan->tanggal_daftar_sidang }}</td>
                <td>{{ $pengajuan->status_pengajuan == 0 ? 'Belum Disetujui' : 'Sudah Disetujui' }}</td>
                <td>
                    <div class="btn-toolbar">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <form action="{{ route('pengajuan-sidang.update', [$pengajuan->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-xs btn-block btn-info">
                                        Approve
                                    </button>
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ route('pengajuan-sidang.destroy', [$pengajuan->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-xs btn-block btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this pengajuan?');">
                                        <i class="fa fa-times-circle"></i> Tolak
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('custom_scripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/dashboard/js/demo/datatables-demo.js') }}"></script>
@endsection