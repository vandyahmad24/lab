<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kategori_id');
            $table->string('merek');
            $table->string('tipe');
            $table->string('no_seri');
            $table->string('software');
            $table->string('tahun_perolehan');
            $table->integer('lokasi_id');
            $table->string('kondisi');
            $table->string('status_pengunaan');
            $table->string('kalibrasi');
            $table->string('periode_pemeliharaan');
            $table->string('periode_kalibrasi');
            $table->string('ik_alat');
            $table->string('manual_book');
            $table->integer('pic_id');
            $table->string('komponen_alat');
            $table->string('bahan_habis_pakai');
            $table->string('foto');
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
        Schema::dropIfExists('alat');
    }
}
