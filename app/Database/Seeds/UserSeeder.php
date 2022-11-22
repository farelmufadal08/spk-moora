<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => $this->faker()->userName(),
            'nama' => $this->faker()->name(),
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin'
        ];
        $this->db->table('users')->insert($data);
    }
}
