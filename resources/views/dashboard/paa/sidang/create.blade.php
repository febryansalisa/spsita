@extends('templates.master')

@section('title') Create Sidang @endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Sidang</h1>
</div>

<form action="{{ route('sidang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="ruang_sidang">Ruang Sidang</label>
        <input name="ruang_sidang" type="text" class="form-control" id="ruang_sidang"
            placeholder="Online / Ruangan A / dll" required>
    </div>

    <div class="form-group">
        <label for="tgl_sidang">Tanggal Sidang</label>
        <input name="tgl_sidang" type="date" class="form-control" id="tgl_sidang" required>
    </div>

    <div class="form-group">
        <label for="jam_mulai_sidang">Jam Mulai Sidang</label>
        <input name="jam_mulai_sidang" type="time" class="form-control" id="jam_mulai_sidang" required>
    </div>

    <div class="form-group">
        <label for="jam_selesai_sidang">Jam Selesai Sidang</label>
        <input name="jam_selesai_sidang" type="time" class="form-control" id="jam_selesai_sidang" required>
    </div>

    <div class="form-group">
        <label for="id_pengajuan_sidang">Pengajuan Sidang Mahasiswa</label>
        <select name="id_pengajuan_sidang" class="form-control" id="id_pengajuan_sidang" required>
            <option value="">-- Pilih Pengajuan Sidang Mahasiswa --</option>
            @foreach ($listPengajuanSidang as $pengajuan)
            <option value="{{ $pengajuan->id }}">{{ $pengajuan->mahasiswa->nama }} - {{ $pengajuan->tanggal_daftar_sidang }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_dosen_penguji1">Dosen Penguji 1</label>
        <select name="id_dosen_penguji1" class="form-control" id="id_dosen_penguji1" required>
            <option value="">-- Pilih Dosen Penguji 1 --</option>
            @foreach ($listDosen as $dosen)
            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_dosen_penguji2">Dosen Penguji 2</label>
        <select name="id_dosen_penguji2" class="form-control" id="id_dosen_penguji2" required>
            <option value="">-- Pilih Dosen Penguji 2 --</option>
            @foreach ($listDosen as $dosen)
            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection