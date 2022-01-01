<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function index()
    {
        $data['listBimbingan'] = Bimbingan::where('id_dosen', auth()->id())->get();
        return view('dashboard.dosen.bimbingan.index', $data);
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


    public function edit($id)
    {
        //
    }

    public function update(Request $request, Bimbingan $bimbingan)
    {
        //
    }

    public function destroy(Bimbingan $bimbingan)
    {
        //
    }
}
