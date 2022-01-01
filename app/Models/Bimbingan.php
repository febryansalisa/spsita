<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table = 'bimbingan';

    protected $fillable = [
        'tanggal_bimbingan', 'jam_bimbingan', 'id_dosen', 'id_mahasiswa', 'link_meet_bimbingan', 'file_ta', 'komentar_ta', 'judul_ta', 'status_ta', 'tahapan_bimbingan'
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa', 'id');
    }
}
