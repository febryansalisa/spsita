<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSidang;
use Illuminate\Http\Request;

class PengajuanSidangController extends Controller
{
    // public function create()
    // {
    //     return view('dashboard.mahasiswa.sidang.pengajuan_sidang');
    // }

    public function store(Request $request)
    {
        PengajuanSidang::create([
            'id_mahasiswa' => auth()->id(),
            'tanggal_daftar_sidang' => Date('Y-m-d h:i:s'),
            'status_pengajuan' => 0
        ]);

        return redirect()->route('jadwal-sidang.mahasiswa')->with('success', 'Berhasil melakukan pengajuan sidang');
    }
}
