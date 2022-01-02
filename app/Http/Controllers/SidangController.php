<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\PengajuanSidang;
use App\Models\Sidang;
use App\Models\User;
use Illuminate\Http\Request;

class SidangController extends Controller
{
    public function index()
    {
        $data['listJadwalSidang'] = Sidang::with('pengajuan_sidang.mahasiswa')->get();
        return view('dashboard.paa.sidang.index', $data);
    }

    public function jadwalMahasiswa()
    {
        $data['totalBimbinganValid'] = Bimbingan::where('id_mahasiswa', auth()->id())
            ->where('status_ta', 'Sudah Dicek')
            ->count();
        $data['approvedPengajuanSidang'] = PengajuanSidang::where('id_mahasiswa', auth()->id())
            ->where('status_pengajuan', '=', 1)
            ->first();
        $data['pengajuanSidang'] = PengajuanSidang::where('id_mahasiswa', auth()->id())
            ->where('status_pengajuan', '!=', 1)
            ->get();
        $data['totalPengajuanSidangBelumDisetujui'] = PengajuanSidang::where('id_mahasiswa', auth()->id())
            ->where('status_pengajuan', '=', 0)
            ->count();
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
        $data['listDosen'] = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'Dosen');
        })->get();
        $data['listPengajuanSidang'] = PengajuanSidang::with('mahasiswa')
            ->where('status_pengajuan', 1)
            ->get();
        return view('dashboard.paa.sidang.create', $data);
    }

    public function store(Request $request)
    {
        Sidang::create($request->all());
        return redirect()->route('sidang.index')->with('success', 'Berhasil menambahkan jadwal sidang baru');
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
