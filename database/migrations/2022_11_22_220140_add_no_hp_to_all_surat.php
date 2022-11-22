<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoHpToAllSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_aktif_kuliah', function (Blueprint $table) {
            $table->string('no_hp');
        });
        Schema::table('surat_kp', function (Blueprint $table) {
            $table->string('no_hp');
        });
        Schema::table('surat_magang', function (Blueprint $table) {
            $table->string('no_hp');
        });
        Schema::table('surat_pengambilan_data', function (Blueprint $table) {
            $table->string('no_hp');
        });
        Schema::table('permohonan_transkrip_nilai', function (Blueprint $table) {
            $table->string('no_hp');
        });
        Schema::table('surat_rekomendasi', function (Blueprint $table) {
            $table->string('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::table('all_surat', function (Blueprint $table) {
    //         //
    //     });
    // }
}
