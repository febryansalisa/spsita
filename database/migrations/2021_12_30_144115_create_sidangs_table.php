<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang', function (Blueprint $table) {
            $table->id();
            $table->string('ruang_sidang');
            $table->text('catatan');
            $table->unsignedBigInteger('id_dosen_penguji1');
            $table->foreign('id_dosen_penguji1')->references('id')->on('users');
            $table->unsignedBigInteger('id_dosen_penguji2');
            $table->foreign('id_dosen_penguji2')->references('id')->on('users');
            $table->date('tgl_sidang');
            $table->timestamp('waktu_mulai_sidang');
            $table->timestamp('waktu_selesai_sidang');
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
        Schema::dropIfExists('sidang');
    }
}
