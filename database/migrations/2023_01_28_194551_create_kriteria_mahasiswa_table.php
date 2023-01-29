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
        Schema::create('kriteria_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->float('normalisasi', 8, 3)->nullable();
            $table->float('tertimbang', 8,3)->nullable();
            $table->float('jarak', 8,8)->nullable();
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
        Schema::dropIfExists('kriteria_mahasiswa');
    }
};
