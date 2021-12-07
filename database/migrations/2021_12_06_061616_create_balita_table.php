<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->string('nama_balita');
            $table->string('anak_ke');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->integer('no_kk')->unique;
            $table->integer('nik_balita')->unique;
            $table->float('bb_lahir');
            $table->float('tb_lahir');
            $table->string('kia');
            $table->string('imd');
            $table->string('nama_ortu');
            $table->integer('nik_ortu')->unique;
            $table->string('no_hp')->unique;
            $table->text('alamat');
            $table->integer('rt');
            $table->integer('rw');
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
        Schema::dropIfExists('balita');
    }
}
