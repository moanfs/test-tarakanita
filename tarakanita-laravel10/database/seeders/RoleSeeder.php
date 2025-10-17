<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name_role' => 'superadmin',
                'description' => 'Akses penuh ke semua fitur.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name_role' => 'admin',
                'description' => 'Akses terbatas untuk manajemen data.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name_role' => 'petugas',
                'description' => 'Akses hanya untuk operasional harian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
