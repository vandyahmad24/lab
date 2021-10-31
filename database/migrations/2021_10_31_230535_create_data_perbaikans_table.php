<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_perbaikan', function (Blueprint $table) {
            $table->id();
            $table->integer('alat_id');
            $table->integer('pic_id');
            $table->string('tanggal_perbaikan');
            $table->text('jenis_kerusakan');
            $table->text('jenis_perbaikan');
            $table->string('vendor');
            $table->string('bukti_perbaikan');
            $table->string('kondisi_alat');
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
        Schema::dropIfExists('data_perbaikan');
    }
}
