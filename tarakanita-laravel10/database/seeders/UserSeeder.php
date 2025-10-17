<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'role_id' => 1,
            'name' => 'Super Administrator',
            'username' => 'super admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'Petugas Lapangan',
            'username' => 'petugas',
            'email' => 'petugas@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
