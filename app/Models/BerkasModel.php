<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'berkas';
    protected $primaryKey           = 'id_berkas';
    protected $useAutoIncrement      = true;
    protected $insertID             = 0;
    protected $returnType               = 'object';
    protected $useSoftDeletes        = false;
    protected $protectFields         = true;
    protected $allowedFields        = ['kode_kelompok', 'nama_kelompok', 'nama_ketua', 'nomor_hp', 'kabupaten', 'kecamatan', 'desa', 'berkas', 'keterangan'];



    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_kelompok' => 'required',
        'nama_kelompok' => 'required',
        'nama_ketua' => 'required',
        'nomor_hp' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'desa' => 'required',
        'berkas' => 'required',
        'keterangan' => 'required'

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
