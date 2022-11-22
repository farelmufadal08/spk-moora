<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;
use App\Models\KeteranganKriteriaPengajuan;

class KeteranganKriteriaPengajuanController extends BaseController
{

    protected $db, $model;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new KeteranganKriteriaPengajuan();
    }

    public function index()
    {
        $pengajuans = $this->db->table('pengajuans')
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->whereIn('status', ['diterima', 'menerima'])->select(['alternatifs.*', 'pengajuans.*'])
            ->get()->getResultArray();
        $data = [
            'pengajuans' => $pengajuans
        ];

        return view('keterangan_pengajuan/index', $data);
    }

    public function show($pengajuan_id)
    {
        $data = [
            'pengajuan_id' => $pengajuan_id,
            'penilaians' => $this->model->findPenilaianPengajuan($pengajuan_id),
            'kriterias' => $this->model->getKriteria()
        ];

        return view('keterangan_pengajuan/show', $data);
    }

    public function store($pengajuan_id)
    {
        $keterangans = $this->request->getPost('keterangan');
        $datas = array();
        foreach ($keterangans as $data) {
            if (is_array($data)) {
                array_push($datas, ...$data);
            } else {
                array_push($datas, $data);
            }
        }
        $validation = $this->model->getValidationRules();
        $validate = true;
        if ($validate) {
            $this->db->table('keterangan_kriteria_pengajuans')->where('pengajuan_id', $pengajuan_id)->whereIn('keterangan_kriteria_id', $datas)->delete();
            foreach ($datas as $data) {
                $this->db->table('keterangan_kriteria_pengajuans')->insert([
                    'pengajuan_id' => $pengajuan_id,
                    'keterangan_kriteria_id' => $data
                ]);
            }
            $this->db->table('keterangan_kriteria_pengajuans')->where('pengajuan_id', $pengajuan_id)->whereNotIn('keterangan_kriteria_id', $datas)->delete();
            return redirect()->to('penilaian/' . $pengajuan_id . '/show')->with('success', 'berhasil mengubah data');
        }
        return redirect()->to('penilaian/' . $pengajuan_id . '/show')->with('error', 'gagal mengubah data');
    }
}
