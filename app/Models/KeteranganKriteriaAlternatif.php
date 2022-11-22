<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class KeteranganKriteriaAlternatif extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'keterangan_kriteria_alternatifs';
    protected $primaryKey       = '';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['alternatif_id', 'keterangan_kriteria_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'keterangan' => 'required'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
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

    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function findPenilaianAlternatif($alternatif_id)
    {
        $alternatif = $this->db->table('alternatifs')->where('id', $alternatif_id)->get()->getFirstRow('array');
        $kriterias = $this->db->table('kriterias')->get()->getResultArray();
        $keterangan_kriterias = $this->db->table('keterangan_kriterias')
            ->join('keterangan_kriteria_alternatifs', 'keterangan_kriterias.id=keterangan_kriteria_alternatifs.keterangan_kriteria_id')
            ->where('alternatif_id', $alternatif_id)
            ->get()->getResultArray();

        $data = [
            'id' => $alternatif['id'],
            'kode_kelompok' => $alternatif['kode_kelompok'],
            'nama_kelompok' => $alternatif['nama_kelompok'],
            'kriteria' => array_map(function ($kriteria) use ($keterangan_kriterias) {
                return [
                    'kriteria_id' => $kriteria['id'],
                    'deskripsi' => $kriteria['deskripsi'],
                    'kode_kriteria' => $kriteria['kode_kriteria'],
                    'kriteria' => $kriteria['kriteria'],
                    'cost_benefit' => $kriteria['cost_benefit'],
                    'bobot_kriteria' => $kriteria['bobot_kriteria'],
                    'keterangan' => array_filter(array_map(function ($keterangan) use ($kriteria) {
                        if ($keterangan['kriteria_id'] == $kriteria['id']) {
                            return $keterangan;
                        }
                    }, $keterangan_kriterias))
                ];
            }, $kriterias)
        ];
        return $data;
    }

    public function findAllPenilaianAlternatif()
    {
        $alternatifs = $this->db->table('alternatifs')->get()->getResultArray();
        $kriterias = $this->db->table('kriterias')->get()->getResultArray();
        $keterangan_kriterias = $this->db->table('keterangan_kriterias')
            ->join('keterangan_kriteria_alternatifs', 'keterangan_kriterias.id=keterangan_kriteria_alternatifs.keterangan_kriteria_id')
            ->get()->getResultArray();

        $data = array_map(function ($alternatif) use ($kriterias, $keterangan_kriterias) {
            return [
                'id' => $alternatif['id'],
                'kode_kelompok' => $alternatif['kode_kelompok'],
                'nama_kelompok' => $alternatif['nama_kelompok'],
                'kriteria' => array_map(function ($kriteria) use ($keterangan_kriterias, $alternatif) {
                    return [
                        'kriteria_id' => $kriteria['id'],
                        'deskripsi' => $kriteria['deskripsi'],
                        'kode_kriteria' => $kriteria['kode_kriteria'],
                        'kriteria' => $kriteria['kriteria'],
                        'cost_benefit' => $kriteria['cost_benefit'],
                        'bobot_kriteria' => $kriteria['bobot_kriteria'],
                        'keterangan' => array_map(function ($keterangan) use ($alternatif) {
                            if ($keterangan['alternatif_id'] == $alternatif['id']) {
                                return $keterangan;
                            }
                        }, $keterangan_kriterias)
                    ];
                }, $kriterias)
            ];
        }, $alternatifs);

        return $data;
    }

    public function getKriteria()
    {
        $kriterias = $this->db->table('kriterias')->get()->getResultArray();
        $keterangan_kriterias = $this->db->table('keterangan_kriterias')->get()->getResultArray();

        $data = array_map(function ($kriteria) use ($keterangan_kriterias) {
            return [
                'id' => $kriteria['id'],
                'kode_kriteria' => $kriteria['kode_kriteria'],
                'kriteria' => $kriteria['kriteria'],
                'deskripsi' => $kriteria['deskripsi'],
                'cost_benefit' => $kriteria['cost_benefit'],
                'bobot_kriteria' => $kriteria['bobot_kriteria'],
                'keterangan' => array_filter(array_map(function ($keterangan) use ($kriteria) {
                    if ($keterangan['kriteria_id'] == $kriteria['id']) {
                        return $keterangan;
                    }
                }, $keterangan_kriterias))
            ];
        }, $kriterias);

        return $data;
    }
}
