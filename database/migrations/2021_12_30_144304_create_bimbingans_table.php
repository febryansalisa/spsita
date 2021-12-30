<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bimbingan');
            $table->time('jam_bimbingan');
            $table->unsignedBigInteger('id_dosen_pembimbing');
            $table->foreign('id_dosen_pembimbing')->references('id')->on('users');
            $table->text('link_meet_bimbingan');
            $table->text('file_ta');
            $table->text('komentar_ta');
            $table->string('judul_ta')->nullable();
            $table->string('status_ta');
            $table->string('tahapan_bimbingan');
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
        Schema::dropIfExists('bimbingan');
    }
}
