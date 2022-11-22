<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class KeteranganKriteriaPengajuan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'keterangan_kriteria_pengajuans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pengajuan_id', 'keterangan_kriteria_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function findPenilaianPengajuan($pengajuan_id)
    {
        $pengajuan = $this->db->table('pengajuans')
            ->join('pengadaans', 'pengajuans.pengadaan_id=pengadaans.id')
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->where(['pengajuans.id' => $pengajuan_id, 'pengadaans.status' => true])
            ->select(['alternatifs.*', 'pengajuans.*'])
            ->get()->getFirstRow('array');

        $kriterias = $this->db->table('kriterias')->get()->getResultArray();
        $keterangan_kriterias = $this->db->table('keterangan_kriterias')
            ->join('keterangan_kriteria_pengajuans', 'keterangan_kriterias.id=keterangan_kriteria_pengajuans.keterangan_kriteria_id')
            ->where('pengajuan_id', $pengajuan_id)
            ->get()->getResultArray();

        $data = [
            'id' => $pengajuan['id'],
            'simluhtan' => $pengajuan['simluhtan'],
            'nama_kelompok' => $pengajuan['nama_kelompok'],
            'kriteria' => array_map(function ($kriteria) use ($keterangan_kriterias) {
                return [
                    'kriteria_id' => $kriteria['id'],
                    'deskripsi' => $kriteria['deskripsi'],
                    'kode_kriteria' => $kriteria['kode_kriteria'],
                    'kriteria' => $kriteria['kriteria'],
                    'cost_benefit' => $kriteria['cost_benefit'],
                    'bobot_kriteria' => $kriteria['bobot_kriteria'],
                    'keterangan' => array_merge(array_filter(array_map(function ($keterangan) use ($kriteria) {
                        if ($keterangan['kriteria_id'] == $kriteria['id']) {
                            return $keterangan;
                        }
                    }, $keterangan_kriterias)))
                ];
            }, $kriterias)
        ];
        return $data;
    }

    public function findAllPenilaianpengajuan()
    {
        $pengajuans = $this->db->table('pengajuans')
            ->join('pengadaans', 'pengajuans.pengadaan_id=pengadaans.id')
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->where('pengadaans.status', true)
            ->select(['alternatifs.*', 'pengajuans.*'])
            ->whereIn('pengajuans.status', ['diterima', 'menerima'])
            ->get()->getResultArray();

        $kriterias = $this->db->table('kriterias')->get()->getResultArray();
        $keterangan_kriterias = $this->db->table('keterangan_kriterias')
            ->join('keterangan_kriteria_pengajuans', 'keterangan_kriterias.id=keterangan_kriteria_pengajuans.keterangan_kriteria_id')
            ->get()->getResultArray();

        $data = array_map(function ($pengajuan) use ($kriterias, $keterangan_kriterias) {
            return [
                'id' => $pengajuan['id'],
                'simluhtan' => $pengajuan['simluhtan'],
                'nama_kelompok' => $pengajuan['nama_kelompok'],
                'status' => $pengajuan['status'],
                'kriteria' => array_map(function ($kriteria) use ($keterangan_kriterias, $pengajuan) {
                    return [
                        'kriteria_id' => $kriteria['id'],
                        'deskripsi' => $kriteria['deskripsi'],
                        'kode_kriteria' => $kriteria['kode_kriteria'],
                        'kriteria' => $kriteria['kriteria'],
                        'tipe_pilihan' => $kriteria['tipe_pilihan'],
                        'cost_benefit' => $kriteria['cost_benefit'],
                        'bobot_kriteria' => $kriteria['bobot_kriteria'],
                        'keterangan' => array_merge(array_filter(array_map(function ($keterangan) use ($pengajuan, $kriteria) {
                            if ($keterangan['pengajuan_id'] == $pengajuan['id'] && $keterangan['kriteria_id'] == $kriteria['id']) {
                                return $keterangan;
                            }
                        }, $keterangan_kriterias)))
                    ];
                }, $kriterias)
            ];
        }, $pengajuans);

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
                'tipe_pilihan' => $kriteria['tipe_pilihan'],
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
