@extends('templates.master')

@section('title') Create Bimbingan @endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Bimbingan</h1>
</div>

<form action="{{ route('bimbingan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_dosen" value="{{ auth()->id() }}">

    <div class="form-group">
        <label for="tanggal_bimbingan">Tanggal Bimbingan</label>
        <input name="tanggal_bimbingan" type="date" class="form-control" id="tanggal_bimbingan" required>
    </div>

    <div class="form-group">
        <label for="jam_bimbingan">Jam Bimbingan</label>
        <input name="jam_bimbingan" type="time" class="form-control" id="jam_bimbingan" required>
    </div>

    <div class="form-group">
        <label for="id_mahasiswa">Jam Bimbingan</label>
        <select name="id_mahasiswa" class="form-control" id="id_mahasiswa" required>
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach ($listMahasiswa as $mahasiswa)
            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="link_meet_bimbingan">Link Meet Bimbingan</label>
        <input name="link_meet_bimbingan" type="text" class="form-control" id="link_meet_bimbingan"
            placeholder="http://www.example.com" required>
    </div>

    <div class="form-group">
        <label for="tahapan_bimbingan">Tahapan Bimbingan</label>
        <input name="tahapan_bimbingan" type="text" class="form-control" id="tahapan_bimbingan"
            placeholder="Tahap 1, Tahap 2, dll" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection