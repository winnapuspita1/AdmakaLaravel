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
        Schema::table('users', function (Blueprint $table) {
            
            $table->enum('role', ['superadmin', 'admin', 'mahasiswa'])->default('mahasiswa');
        });
        
        // Insert some stuff
        DB::table('users')->insert(
           array(
               'name' => 'AKUN Super Admin',
               'email' => 'superadmin@superadmin.com',
               'password' => '$2y$10$tWeK.zlb2A23W1CLngNqHet3FNkMYPm9IEqXoeLFQugALrftIE4Hu',
               'email_verified_at' => date('Y-m-d H:i:s'),
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
            
               'role' => 'superadmin'
           )
        );

        DB::table('users')->insert(
           array(
               'name' => 'AKUN Admin',
               'email' => 'admin@admin.com',
               'password' => '$2y$10$yfxmdaDAtyU.NWjuBzFgEOiB8LXFir2MXyDzsTwjT3suwcK1rdPEW',
               'email_verified_at' => date('Y-m-d H:i:s'),
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
            
               'role' => 'admin'
           )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
