@extends('templates.master')

@section('title') Bimbingan Mahasiswa @endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i> {{ session()->get('success') }}
</div>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Bimbingan</h1>
</div>

@if ($listBimbingan->isNotEmpty())
<div class="row">
    @foreach ($listBimbingan as $bimbingan)
    <div class="col-md-6">
        <div class="card shadow my-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $bimbingan->tahapan_bimbingan }}</h6>
            </div>
            <div class="card-body">
                @if ($bimbingan->file_ta)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Tanggal Bimbingan</b> : {{ $bimbingan->tanggal_bimbingan }}</li>
                    <li class="list-group-item"><b>Jam Bimbingan</b> : {{ $bimbingan->jam_bimbingan }}</li>
                    <li class="list-group-item"><b>Link Meet</b> : <a href="{{ $bimbingan->link_meet_bimbingan }}" target="_blank">Link Meeting</a> </li>
                    <li class="list-group-item"><b>Judul TA</b> : {{ $bimbingan->judul_ta }}</li>
                    <li class="list-group-item">
                        <a href="{{ Storage::url($bimbingan->file_ta) }}" target="_blank">File Tugas Akhir</a>
                    </li>
                    <li class="list-group-item"><b>Komentar</b> : {{ $bimbingan->komentar_ta }} </li>
                    <li class="list-group-item"><b>Status TA</b> : {{ $bimbingan->status_ta }}</li>
                </ul>
                @else
                <form action="{{ route('bimbingan.update', $bimbingan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul_ta">Judul TA</label>
                        <input name="judul_ta" type="text" class="form-control" id="judul_ta" required>
                    </div>

                    <div class="form-group">
                        <label for="file_ta">File TA</label>
                        <input name="file_ta" type="file" class="form-control" id="file_ta" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Belum ada data bimbingan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection