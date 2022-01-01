<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    use HasFactory;

    protected $table = 'sidang';

    protected $fillable = [
        'id_pengajuan_sidang', 'ruang_sidang', 'id_dosen_penguji1', 'id_dosen_penguji2', 'tgl_sidang', 'jam_mulai_sidang', 'jam_selesai_sidang',
    ];

    public function pengajuan_sidang()
    {
        return $this->belongsTo(PengajuanSidang::class, 'id_pengajuan_sidang', 'id');
    }

    public function dosen_penguji_pertama()
    {
        return $this->belongsTo(User::class, 'id_dosen_penguji1', 'id');
    }

    public function dosen_penguji_kedua()
    {
        return $this->belongsTo(User::class, 'id_dosen_penguji2', 'id');
    }
}
