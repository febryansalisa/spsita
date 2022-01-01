<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BimbinganController extends Controller
{
    public function index()
    {
        $data['listBimbingan'] = Bimbingan::where('id_dosen', auth()->id())->get();
        return view('dashboard.dosen.bimbingan.index', $data);
    }

    public function bimbinganMahasiswa()
    {
        $data['listBimbingan'] = Bimbingan::where('id_mahasiswa', auth()->id())->get();
        return view('dashboard.mahasiswa.bimbingan.index', $data);
    }

    public function create()
    {
        $data['listMahasiswa'] = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Mahasiswa');
        })->get();

        return view('dashboard.dosen.bimbingan.create', $data);
    }

    public function store(Request $request)
    {
        Bimbingan::create($request->all());

        return redirect()->route('bimbingan.index')->with('success', 'Berhasil menambahkan bimbingan');
    }

    public function show($id)
    {
        //
    }


    public function edit(Bimbingan $bimbingan)
    {
        $data['listMahasiswa'] = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Mahasiswa');
        })->get();
        $data['bimbingan'] = $bimbingan;

        return view('dashboard.dosen.bimbingan.edit', $data);
    }

    public function update(Request $request, Bimbingan $bimbingan)
    {
        $formInput = $request->all();
        if ($request->hasFile('file_ta')) {
            $formInput['file_ta'] =  $request->file('file_ta')->store('public/file_ta');
        }
        $bimbingan->update($formInput);

        if (auth()->user()->role->nama_role == 'Mahasiswa')
            return redirect()->route('bimbingan.mahasiswa')->with('success', 'Berhasil upload file ta di bimbingan');


        return redirect()->route('bimbingan.index')->with('success', 'Berhasil update bimbingan');
    }

    public function destroy(Bimbingan $bimbingan)
    {
        Storage::delete($bimbingan->file_ta);
        $bimbingan->delete();

        return redirect()->route('bimbingan.index')->with('success', 'Berhasil menghapus bimbingan');
    }
}
