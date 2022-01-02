<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\PengajuanSidang;
use App\Models\Sidang;
use Illuminate\Http\Request;

class SidangController extends Controller
{
    public function index()
    {
        //
    }

    public function jadwalMahasiswa()
    {
        $data['totalBimbingan'] = Bimbingan::where('id_mahasiswa', auth()->id())
            ->where('status_ta', 'Sudah Dicek')
            ->count();
        $data['approvedPengajuanSidang'] = PengajuanSidang::where('id_mahasiswa', auth()->id())
            ->where('status_pengajuan', '=', 1)
            ->first();
        $data['pengajuanSidang'] = PengajuanSidang::where('id_mahasiswa', auth()->id())
            ->where('status_pengajuan', '=', 1)
            ->get();
        $data['jadwalSidang'] = Sidang::whereHas('pengajuan_sidang', function ($query) {
            $query->where('id_mahasiswa', auth()->id());
        })->first();

        return view('dashboard.mahasiswa.sidang.index', $data);
    }

    public function jadwalDosen()
    {
        $data['listJadwalSidang'] = Sidang::where(function ($query) {
            $query->where('id_dosen_penguji1', auth()->id())
                ->orWhere('id_dosen_penguji1', auth()->id());
        })->get();

        return view('dashboard.dosen.sidang.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
