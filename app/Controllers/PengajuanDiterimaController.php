<?php

namespace App\Controllers;

use Exception;
use Config\Database;
use App\Models\Pengajuan;
use App\Controllers\BaseController;

class PengajuanDiterimaController extends BaseController
{

    protected $model;
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new Pengajuan();
    }

    public function index()
    {
        $pengajuans = $this->model
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->where(['status' => 'diterima', 'deleted_at' => null])
            ->select(['pengajuans.id as pengajuan_id', 'pengajuans.*', 'alternatifs.*'])->get()->getResultArray();
        $data = [
            'pengajuans' => $pengajuans
        ];
        return view('pengajuan_diterima/index', $data);
    }

    public function destroy($pengajuan_id)
    {
        try {
            $this->db->table('keterangan_kriteria_pengajuans')->where('pengajuan_id', $pengajuan_id)->delete();
            $this->model->update($pengajuan_id, ['status' => 'masuk']);
            $this->model->delete($pengajuan_id);
            return redirect()->to('pengajuan-diterima');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
