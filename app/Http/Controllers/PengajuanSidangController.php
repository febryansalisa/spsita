<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSidang;
use Illuminate\Http\Request;

class PengajuanSidangController extends Controller
{
    public function index()
    {
        $data['pengajuanSidang'] =  PengajuanSidang::with('mahasiswa')
            ->where('status_pengajuan', 0)
            ->get();
        return view('dashboard.paa.sidang.pengajuan_sidang', $data);
    }

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

    public function update(Request $request, PengajuanSidang $pengajuanSidang)
    {
        $pengajuanSidang->update([
            'status_pengajuan' => 1
        ]);

        return redirect()->route('pengajuan-sidang.index')->with('success', 'Berhasil approve pengajuan sidang');
    }

    public function destroy(PengajuanSidang $pengajuanSidang)
    {
        $pengajuanSidang->update([
            'status_pengajuan' => 2
        ]);

        return redirect()->route('pengajuan-sidang.index')->with('success', 'Berhasil tolak pengajuan sidang');
    }
}
