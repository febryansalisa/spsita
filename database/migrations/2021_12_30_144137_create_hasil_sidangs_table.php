<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_sidang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sidang');
            $table->foreign('id_sidang')->references('id')->on('sidang');
            $table->decimal('nilai_presentasi');
            $table->decimal('nilai_buku_ta');
            $table->decimal('total_nilai');
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
        Schema::dropIfExists('hasil_sidang');
    }
}
