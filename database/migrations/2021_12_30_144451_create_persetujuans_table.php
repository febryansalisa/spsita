<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersetujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bimbingan');
            $table->foreign('id_bimbingan')->references('id')->on('bimbingan');
            $table->text('laporan_ta');
            $table->string('status_persetujuan');
            $table->text('file_ta');
            $table->text('file_kartu_kendali');
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
        Schema::dropIfExists('persetujuan');
    }
}
