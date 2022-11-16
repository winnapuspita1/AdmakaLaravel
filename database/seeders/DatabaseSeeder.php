<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'AKUN Super Admin',
                'email' => 'superadmin@superadmin.com',
                'password' => Hash::make('12341234'),
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nomor_hp' => '-',
                'role' => 'superadmin',
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'AKUN Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12341234'),
                'email_verified_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'nomor_hp' => '-',
                'role' => 'admin',
            ]
        );
    }
}
