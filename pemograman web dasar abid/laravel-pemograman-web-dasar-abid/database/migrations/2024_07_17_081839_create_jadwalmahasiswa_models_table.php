<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->string('ruangan');
            $table->time('jam');
            $table->string('dosen');
            $table->timestamps();
    
            $table->foreign('npm')->references('npm')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalmahasiswa');
    }
};
