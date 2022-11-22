<?php

namespace App\Controllers;

helper('filesystem');

use App\Controllers\BaseController;
use App\Models\Pengajuan;
use App\Models\User;
use CodeIgniter\Validation\Validation;
use Config\Database;
use Exception;

class PengajuanController extends BaseController
{

    protected $model;
    protected $db;

    public function __construct()
    {
        $this->model = new Pengajuan();
        $this->modeluser = new User();
        $this->db = Database::connect();
    }

    public function index()
    {
        $pengadaan = $this->db->table('pengadaans')->where('status', true)->get()->getFirstRow();
        $pengajuan = $this->model->join('pengadaans', 'pengajuans.pengadaan_id=pengadaans.id')

            ->where(['pengadaans.status' => true, 'user_id' => session('id')])->select('pengajuans.*')->get()->getFirstRow();
        $data = [
            'pengadaan' => $pengadaan,
            'pengajuan' => $pengajuan

        ];
        return view('pengajuan/index', $data);
    }

    public function store()
    {
        helper(['form']);
        $pengadaan = $this->db->table('pengadaans')->where('status', true)->get()->getFirstRow('array');
        $validation = $this->model->getValidationRules();
        $validate = $this->validate($validation);
        if (!$validate) {
            return redirect()->to('pengajuan');
        }
        $data = $this->request->getPost();
        $proposal = $this->request->getFile('proposal');
        $proposalName = time() . 'proposal' . session('nama') . '.' . $proposal->getExtension();

        $data['proposal'] = $proposalName;
        $data['pengadaan_id'] = $pengadaan['id'];
        $data['user_id'] = session()->get('id');


        try {
            $this->model->insert($data);
            $proposal->move('proposal/', $proposalName);
            return redirect()->to('pengajuan')->with('success', 'berhasil mengirimkan pengajuan');
        } catch (Exception $e) {
            return redirect()->to('pengajuan')->with('error', 'gagal');
            return $e->getMessage();
        }
    }
    public function gantipassword()
    {
        return view('pengajuan/gantipassword');
    }
    public function update()
    {
        $user_id = session('id');
        try {

            // $data = $this->request->getPost(['username', 'nama', 'kelompok_id']);
            // return dd($data);
            // $validation = $this->modeluser->getValidationRules();
            // $validation['kelompok_id'] = 'required|is_unique[users.kelompok_id,id,' . $user_id . ']';
            // return dd($validation);
            // $validate = $this->validate($validation);
            // return dd($validate);
            $rules = [
                'password' => 'required|min_length[8]'
            ];
            $validate = $this->validate($rules);

            if ($validate) {
                $password = $this->request->getPost('password');

                if ($password) {
                    $data['password'] = password_hash($password, PASSWORD_DEFAULT);
                }


                if ($validate) {
                    // return dd($data);
                    $this->modeluser->update($user_id, $data);
                    return redirect()->to('pengajuan/gantipassword')->with('success', 'berhasil mengubah data');
                }
            }

            return redirect()->to('pengajuan/gantipassword')->with('error', 'gagal ganti password');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($pengajuan_id)
    {
        $pengajuan = $this->model->where('id', $pengajuan_id)->withDeleted()->first();
        // return dd($pengajuan);
        try {
            unlink('proposal/' . $pengajuan['proposal']);
            $this->model->delete($pengajuan_id, true);
            return redirect()->to('pengajuan');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
