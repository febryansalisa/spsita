@extends('templates.master')

@section('title') Jadwal Sidang Dosen @endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i> {{ session()->get('success') }}
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Sidang</h1>
</div>

<div class="table-responsive my-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                <th scope="col">Ruang Sidang</th>
                <th scope="col">Tanggal Sidang</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Dosen Penguji 1</th>
                <th scope="col">Dosen Penguji 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listJadwalSidang as $jadwalSidang)
            <tr>
                <td>{{ $jadwalSidang->ruang_sidang }}</td>
                <td>{{ $jadwalSidang->tanggal_sidang }}</td>
                <td>{{ $jadwalSidang->jam_mulai_sidang }}</td>
                <td>{{ $jadwalSidang->jam_selesai_sidang }}</td>
                <td>{{ $jadwalSidang->dosen_penguji_pertama->nama }}</td>
                <td>{{ $jadwalSidang->dosen_penguji_kedua->nama }}</td>
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