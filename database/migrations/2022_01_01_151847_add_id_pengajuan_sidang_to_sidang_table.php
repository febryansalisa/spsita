<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPengajuanSidangToSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sidang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengajuan_sidang');
            $table->foreign('id_pengajuan_sidang')->references('id')->on('pengajuan_sidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sidang', function (Blueprint $table) {
            $table->dropForeign(['id_pengajuan_sidang']);
            $table->dropColumn(['id_pengajuan_sidang']);
        });
    }
}
