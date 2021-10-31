<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKalibrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kalibrasi', function (Blueprint $table) {
            $table->id();
            $table->integer('alat_id');
            $table->string('jenis_kalibrasi');
            $table->string('tanggal_kalibrasi');
            $table->string('status_kalibrasi');
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
        Schema::dropIfExists('jadwal_kalibrasi');
    }
}
