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
               'name' => 'Super Admin',
               'email' => '180155201039@student.umrah.ac.id',
               'password' => '$2y$10$tzSHgN4oRT0gGA0ob3xXE.hoTcOv.gV1iT72j/NE/J6WWkU9jcbmO',
               'email_verified_at' => date('Y-m-d H:i:s'),
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
            
               'role' => 'superadmin'
           )
        );

        DB::table('users')->insert(
           array(
               'name' => 'Admin',
               'email' => '18015520103.9@student.umrah.ac.id',
               'password' => '$2y$10$tzSHgN4oRT0gGA0ob3xXE.hoTcOv.gV1iT72j/NE/J6WWkU9jcbmO',
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
