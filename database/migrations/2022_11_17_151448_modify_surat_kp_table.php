<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySuratKpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_kp', function (Blueprint $table) {
            # code
            $table->integer('id_mahasiswa')->nullable()->change();
            $table->string('email')->nullable()->after('nim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_kp', function (Blueprint $table) {
            # code
            $table->integer('id_mahasiswa')->nullable()->change();
            $table->string('email')->nullable()->after('nim');
        });
    }
}
