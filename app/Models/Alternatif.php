<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alternatifs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['simluhtan', 'nama_kelompok', 'nama_ketua', 'nomor_hp', 'kabupaten', 'kecamatan', 'desa'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        // 'simluhtan' => 'required|is_unique[alternatifs.simluhtan]',
        'nama_kelompok' => 'required',
        'nama_ketua' => 'required',
        'nomor_hp' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'desa' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
