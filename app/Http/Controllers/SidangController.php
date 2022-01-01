<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\PengajuanSidang;
use App\Models\Sidang;
use Illuminate\Http\Request;

class SidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data['jadwalSidang'] = Sidang::whereHas('pengajuan_sidang', function ($query) {
            $query->where('id_mahasiswa', auth()->id());
        })->first();

        return view('dashboard.mahasiswa.sidang.index', $data);
    }

    public function jadwalDosen()
    {
        $data['jadwalSidang'] = Sidang::whereHas('pengajuan_sidang', function ($query) {
            $query->where('id_mahasiswa', auth()->id());
        })->first();

        return view('dashboard.mahasiswa.sidang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
