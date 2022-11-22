<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $cost_benefit = ['cost', 'benefit'];
        $data = [
            'kriteria' => $this->faker()->name(),
            'kode_kriteria' => $this->faker()->randomNumber(),
            'deskripsi' => $this->faker()->text(70),
            'cost_benefit' => $cost_benefit[$this->faker()->numberBetween(0,1)],
            'bobot_kriteria' => $this->faker()->numberBetween(1, 5)
        ];

        $this->db->table('kriterias')->insert($data);
    }
}
