<?php

namespace App\Models;

use CodeIgniter\Model;

class Homes extends Model
{

    public function tot_alternatif()
    {
        return $this->db->table('alternatifs')->countAll();
    }

    public function tot_user()
    {
        return $this->db->table('users')->countAll();
    }
    public function tot_kriteria()
    {
        return $this->db->table('kriterias')->countAll();
    }
    public function tot_keterangan()
    {
        return $this->db->table('keterangan_kriterias')->countAll();
    }
}
