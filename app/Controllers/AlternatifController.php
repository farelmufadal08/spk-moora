<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif;
use App\Models\User;
use CodeIgniter\Database\Config;
use Config\Database;
use Exception;

class AlternatifController extends BaseController
{

    protected $model;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->model = new Alternatif();
        $this->userModel = new User();
        $this->db =  Database::connect();
    }

    public function index()
    {
        $data = [
            'alternatifs' => $this->model->findAll()
        ];
        return view('alternatif/index', $data);
    }

    public function create()
    {
        return view('alternatif/create');
    }

    public function edit($alternatif_id)
    {
        $alternatif = $this->model->find($alternatif_id);
        $data = [
            'alternatif' => $alternatif
        ];

        return view('alternatif/edit', $data);
    }

    public function store()
    {


        try {
            $data = $this->request->getPost(['nama_kelompok', 'nama_ketua', 'nomor_hp', 'kabupaten', 'kecamatan', 'desa', 'simluhtan']);

            $validation = $this->model->getValidationRules();
            $validation['simluhtan'] = 'required|is_unique[alternatifs.simluhtan,id]';

            $validate = $this->validate($validation);


            if ($validate) {
                // $this->db->transStart();

                $this->db->table('alternatifs')->insert($data);
                $kelompok_id = $this->db->insertID();

                // return dd($kelompok_id);
                $dataUser = [
                    'username' => trim($data['simluhtan'], ' '),
                    'nip' => null,
                    'role' => 'kelompokternak',
                    'nama' => $data['nama_ketua'],
                    'password' => password_hash($data['simluhtan'], PASSWORD_DEFAULT),
                    'kelompok_id' => $kelompok_id


                ];

                // return dd($dataUser);
                $this->db->table('users')->insert($dataUser);
                // return dd();



                return redirect()->to('alternatif')->with('success', 'berhasil menambah data');
                // $this->db->transComplete();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->to('alternatif/create')->with('error', 'simluhtan sudah terdaftar');
    }

    public function update($alternatif_id)
    {
        try {
            $data = $this->request->getPost(['nama_kelompok', 'nama_ketua', 'nomor_hp', 'kabupaten', 'kecamatan', 'desa', 'simluhtan']);
            $validation = $this->model->getValidationRules();
            $validation['simluhtan'] = 'required|is_unique[alternatifs.simluhtan,id,' . $alternatif_id . ']';
            $validate = $this->validate($validation);
            $password = $this->request->getPost('password');


            if ($password) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            if ($validate) {
                $this->model->update($alternatif_id, $data);
                // return dd($dataUser);

                return redirect()->to('alternatif/' . $alternatif_id . '/edit')->with('success', 'berhasil mengubah data');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect()->to('alternatif/' . $alternatif_id . '/edit')->with('error', 'simluhtan sudah terdaftar');
    }

    public function destroy($alternatif_id)
    {
        $this->model->delete($alternatif_id);
        return redirect()->to('alternatif')->with('success', 'berhasil menghapus data');
    }
}
