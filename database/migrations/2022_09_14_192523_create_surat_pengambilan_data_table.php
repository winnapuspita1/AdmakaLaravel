<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPengambilanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pengambilan_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama');            
            $table->string('nim');            
            $table->string('program_studi');            
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tujuan_surat');
            $table->string('alamat_surat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('judul_skripsi');
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
        Schema::dropIfExists('surat_pengambilan_data');
    }
}
