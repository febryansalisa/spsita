<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_sidang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_persetujuan');
            $table->foreign('id_persetujuan')->references('id')->on('persetujuan');
            $table->unsignedBigInteger('id_sidang');
            $table->foreign('id_sidang')->references('id')->on('sidang');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('users');
            $table->timestamp('tanggal_daftar_sidang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_sidang');
    }
}
