@extends('templates.master')

@section('title') Jadwal Sidang Mahasiswa @endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i> {{ session()->get('success') }}
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Sidang</h1>
</div>

@if($totalBimbingan >= 8 && $approvedPengajuanSidang)
<a href="#" class="btn btn-primary">Pengajuan Sidang</a>
@else
<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Minimal 8x bimbingan untuk bisa melakukan pengajuan sidang
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($jadwalSidang)
<div class="table-responsive my-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                <th scope="col">Ruang Sidang</th>
                <th scope="col">Tanggal Sidang</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Dosen Penguji 1</th>
                <th scope="col">Dosen Penguji 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $jadwalSidang->ruang_sidang }}</td>
                <td>{{ $jadwalSidang->tanggal_sidang }}</td>
                <td>{{ $jadwalSidang->waktu_mulai_sidang }}</td>
                <td>{{ $jadwalSidang->waktu_selesai_sidang }}</td>
                <td>{{ $jadwalSidang->dosen_penguji_pertama->nama }}</td>
                <td>{{ $jadwalSidang->dosen_penguji_kedua->nama }}</td>
            </tr>
        </tbody>
    </table>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Belum ada jadwal sidang
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('custom_scripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/dashboard/js/demo/datatables-demo.js') }}"></script>
@endsection