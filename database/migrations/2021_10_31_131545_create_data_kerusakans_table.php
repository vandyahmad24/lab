<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKerusakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kerusakan', function (Blueprint $table) {
            $table->id();
            $table->integer('alat_id');
            $table->integer('pic_id');
            $table->date('tanggal_temuan');
            $table->text('jenis_kerusakan');
            $table->text('akibat');
            $table->text('faktor');
            $table->text('rencana');
            $table->string('foto');
            $table->string('status_permintaan')->nullable();
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
        Schema::dropIfExists('data_kerusakan');
    }
}
