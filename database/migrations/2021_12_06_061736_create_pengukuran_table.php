<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengukuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id');
            $table->foreignId('balita_id');
            $table->integer('usia');
            $table->float('bb');
            $table->float('tb');
            $table->string('cara_ukur');
            $table->string('vitamin');
            $table->string('asi');
            $table->string('pmt');
            $table->string('sumber_pmt');
            $table->string('tgl_pemberian');
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
        Schema::dropIfExists('pengukuran');
    }
}
