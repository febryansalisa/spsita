<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
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

    public function update(Request $request, Bimbingan $bimbingan)
    {
        //
    }

    public function destroy(Bimbingan $bimbingan)
    {
        //
    }
}
