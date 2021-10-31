<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pemeliharaan', function (Blueprint $table) {
            $table->id();
            $table->integer('alat_id');
            $table->date('tanggal_pemeliharaan');
            $table->integer('pic_id');
            $table->string('status_pelaksanaan');
            $table->date('tanggal_pengecekan')->nullable();
            $table->string('jenis_pemeliharaan')->nullable();
            $table->string('kondisi_alat')->nullable();
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
        Schema::dropIfExists('jadwal_pemeliharaan');
    }
}
