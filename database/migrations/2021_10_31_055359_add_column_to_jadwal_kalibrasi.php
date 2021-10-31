<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJadwalKalibrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_kalibrasi', function (Blueprint $table) {
            $table->string('remark')->nullable();
            $table->string('sertifikat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_kalibrasi', function (Blueprint $table) {
            $table->dropColumn('paid');

        });
    }
}
