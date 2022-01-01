@extends('templates.master')

@section('title') Bimbingan @endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i> {{ session()->get('success') }}
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Bimbingan</h1>
</div>

<a href="{{ route('bimbingan.create') }}" class="btn btn-primary">Buat Bimbingan</a>

<div class="table-responsive my-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
            <tr>
                <th scope="col">Tahapan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>
                <th scope="col">Mahasiswa</th>
                <th scope="col">Link Meet</th>
                <th scope="col">Judul TA</th>
                <th scope="col">File TA</th>
                <th scope="col">Status</th>
                <th scope="col">Komentar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listBimbingan as $bimbingan)
            <tr>
                <td>{{ $bimbingan->tahapan_bimbingan }}</td>
                <td>{{ $bimbingan->tanggal_bimbingan }}</td>
                <td>{{ $bimbingan->jam_bimbingan }}</td>
                <td>{{ $bimbingan->mahasiswa->nama }}</td>
                <td>{{ $bimbingan->link_meet_bimbingan }}</td>
                <td>{{ $bimbingan->judul_ta }}</td>
                <td>
                    @if ($bimbingan->file_ta)
                    <a href="{{ Storage::url($bimbingan->file_ta) }}" target="_blank">File Tugas Akhir</a>
                    @else

                    @endif
                </td>
                <td>{{ $bimbingan->status_ta }}</td>
                <td>{{ $bimbingan->komentar_ta }}</td>
                <td>
                    <div class="btn-toolbar">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a href="{{ route('bimbingan.edit', [$bimbingan->id]) }}"
                                    class="btn btn-xs btn-block btn-info">
                                    Edit
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <form action="{{ route('bimbingan.destroy', [$bimbingan->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-xs btn-block btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this bimbingan?');">
                                        <i class="fa fa-times-circle"></i> Delete
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