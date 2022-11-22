<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengadaan;
use Config\Database;
use Exception;

class PengadaanController extends BaseController
{

    protected $model;
    protected $db;

    public function __construct()
    {
        $this->model = new Pengadaan();
        $this->db = Database::connect();
    }

    public function index()
    {
        $pengadaans = $this->model->orderBy('status', 'DESC')->orderBy('id', 'DESC')->get()->getResultArray();
        $data = [
            'pengadaans' => $pengadaans
        ];

        return view('pengadaan/index', $data);
    }

    public function show($pengadaan_id)
    {
        $kelompoks = $this->db->table('pengajuans')
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')


            ->where(['status' => 'menerima', 'pengadaan_id' => $pengadaan_id])
            ->select(['alternatifs.*', 'pengajuans.*'])

            ->get()->getResultArray();

        $pengadaan = $this->model->find($pengadaan_id);

        $data = [
            'kelompoks' => $kelompoks,
            'pengadaan' => $pengadaan
        ];

        return view('pengadaan/show', $data);
    }

    public function create()
    {
        return view('pengadaan/create');
    }

    public function store()
    {
        $validation = $this->model->getValidationRules();
        $validate = $this->validate($validation);
        $cekPengadaan = $this->model->where('status', true)->first();
        if (!$validate) {
            return redirect()->to('pengadaan/create');
        }
        if (!$cekPengadaan) {
            $data = $this->request->getPost();
            $data['status'] = true;
            try {
                $this->model->insert($data);
                return redirect()->to('pengadaan/')->with('success', 'berhasil menambah data');
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return redirect()->to('pengadaan/create')->with('error', 'gagal menambah pengadaan');
    }

    public function update($pengadaan_id)
    {
        try {
            $this->model->update($pengadaan_id, ['status' => false]);
            return redirect()->to('pengadaan')->with('success', 'Berhasil menutup pengadaan');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($pengadaan_id)
    {
        try {
            $this->model->delete($pengadaan_id);
            return redirect()->to('pengadaan')->with('success', 'Berhasil menghapus data');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function generatePDF($pengadaan_id)
    {







        $kelompoks = $this->db->table('pengajuans')
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->where(['status' => 'menerima', 'pengadaan_id' => $pengadaan_id])
            ->select(['alternatifs.*', 'pengajuans.*'])
            ->get()->getResultArray();



        $data = [
            'kelompoks' => $kelompoks

        ];
        return view('pdf/template-alternatif', $data);
    }
}
