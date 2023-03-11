<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('email')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk', ['pria', 'wanita']);
            $table->string('alamat');
            $table->string('kampus');
            $table->string('jurusan');
            $table->string('prodi')->nullable();
            $table->string('no_hp');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('berkas_pribadi')->nullable();
            $table->string('berkas_beasiswa')->nullable();
            $table->float('hasil', 8,5)->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
};
