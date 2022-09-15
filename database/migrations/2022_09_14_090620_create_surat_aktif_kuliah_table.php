<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratAktifKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_aktif_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');            
            $table->string('nim');            
            $table->string('program_studi');            
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('keperluan');
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
        Schema::dropIfExists('surat_aktif_kuliah');
    }
}