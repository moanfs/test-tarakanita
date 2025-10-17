<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Roles Admin
        $roles = [
            [
                'id'          => 1,
                'name'        => 'super admin',
                'description' => 'Memiliki akses penuh dan dapat mengelola peran pengguna.'
            ],
            [
                'id'          => 2,
                'name'        => 'admin',
                'description' => 'Memiliki akses (CRUD) pada data, tidak dapat mengelola peran pengguna.'
            ],
            [
                'id'          => 2,
                'name'        => 'petugas',
                'description' => 'Memiliki akses melihat data saja'
            ],
        ];
        $this->db->table('roles')->insertBatch($roles);


        // Data Admin
        $users = [
            [
                // super admin
                'role_id'  => 1,
                'username' => 'superadmin',
                'email'    => 'superadmin@mail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                // admin
                'role_id'  => 2,
                'username' => 'admin',
                'email'    => 'admin@mail.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('admins')->insertBatch($users);
    }
}
