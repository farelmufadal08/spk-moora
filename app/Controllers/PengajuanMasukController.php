<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengajuan;
use Exception;

class PengajuanMasukController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new Pengajuan();
    }

    public function index()
    {
        $pengajuans = $this->model
            ->join('users', 'pengajuans.user_id=users.id')
            ->join('alternatifs', 'users.kelompok_id=alternatifs.id')
            ->where(['pengajuans.status' => 'masuk', 'pengajuans.deleted_at' => null])->select(['pengajuans.id as pengajuan_id', 'pengajuans.*', 'alternatifs.*'])->get()->getResultArray();
        $data = [
            'pengajuans' => $pengajuans
        ];

        return view('pengajuan_masuk/index', $data);
    }

    public function update($pengajuan_id)
    {
        try {
            $this->model->update($pengajuan_id, ['status' => 'diterima']);
            return redirect()->to('pengajuan-masuk')->with('success', 'berhasil menerima data pengajuan');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($pengajuan_id)
    {
        try {
            $this->model->delete($pengajuan_id);
            return redirect()->to('pengajuan-masuk')->with('success', 'berhasil menolak pengajuan');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
