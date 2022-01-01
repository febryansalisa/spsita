@extends('templates.master')

@section('title') Edit Bimbingan @endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Bimbingan</h1>
</div>

<form action="{{ route('bimbingan.update', $bimbingan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="id_dosen" value="{{ auth()->id() }}">

    <div class="form-group">
        <label for="tanggal_bimbingan">Tanggal Bimbingan</label>
        <input name="tanggal_bimbingan" type="date" class="form-control" id="tanggal_bimbingan"
            value="{{ $bimbingan->tanggal_bimbingan }}" required>
    </div>

    <div class="form-group">
        <label for="jam_bimbingan">Jam Bimbingan</label>
        <input name="jam_bimbingan" type="time" class="form-control" id="jam_bimbingan"
            value="{{ $bimbingan->jam_bimbingan }}" required>
    </div>

    <div class="form-group">
        <label for="id_mahasiswa">Jam Bimbingan</label>
        <select name="id_mahasiswa" class="form-control" id="id_mahasiswa" required>
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach ($listMahasiswa as $mahasiswa)
            <option value="{{ $mahasiswa->id }}" {{ $mahasiswa->id == $bimbingan->id_mahasiswa ? 'selected' : '' }}>
                {{ $mahasiswa->nama }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="link_meet_bimbingan">Link Meet Bimbingan</label>
        <input name="link_meet_bimbingan" type="text" class="form-control" id="link_meet_bimbingan"
            placeholder="http://www.example.com" value="{{ $bimbingan->link_meet_bimbingan }}" required>
    </div>

    <div class="form-group">
        <label for="tahapan_bimbingan">Tahapan Bimbingan</label>
        <input name="tahapan_bimbingan" type="text" class="form-control" id="tahapan_bimbingan"
            placeholder="Tahap 1, Tahap 2, dll" value="{{ $bimbingan->tahapan_bimbingan }}" required>
    </div>

    <div class="form-group">
        <label for="komentar_ta">Komentar</label>
        <textarea name="komentar_ta" class="form-control" id="komentar_ta" required>{{ $bimbingan->komentar_ta }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection