<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Exception;

class UserControlller extends BaseController
{

    protected $model;
    public function __construct()
    {
        $this->model = new User();  
    }
    public function index()
    {
        $user = $this->model->whereIn('role', ['pegawai', 'admin'])->get()->getResultArray();
        $data = [
            'users' => $user
        ];

        return view('user/index', $data);
    }
    public function create()
    {
        return view('user/create');
    }
    public function store()
    {

        // if(!$this->validate([
        //     'username' => 'is_unique[users.username]'
        // ])) {

        //     return redirect()->to('user/create');
        // }

        //     $data = $this->request->getPost();
        //     $validation = $this->model->getValidationRules();
        //     $validate = $this->validate($validation);
        //     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //     if ($validate) {
        //         $this->model->insert($data);
        //         return redirect()->to('user')->with('success', 'berhasil menambah pengguna');
        //     }
        //     return redirect()->to('user/create')->with('error', 'nip sudah ada');
        try {

            $data = $this->request->getPost(['username', 'nama', 'nip']);
            // return dd($data);
            $validation = $this->model->getValidationRules();
            $validation['nip'] = 'required|is_unique[users.nip,id]';
            // return dd($validation);
            $validate = $this->validate($validation);
            // return dd($validate);
            $password = $this->request->getPost('password');



            if ($password) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }


            if ($validate) {
                // return dd($data);
                $this->model->insert($data);
                return redirect()->to('user')->with('success', 'berhasil menambah pengguna');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->to('user/create')->with('error', 'nip sudah ada');
    }

    public function edit($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'user' => $this->model->find($user_id)
        ];
        return view('user/edit', $data);
    }

    public function update($user_id)
    {
        try {

            $data = $this->request->getPost(['username', 'nama', 'nip']);
            // return dd($data);
            $validation = $this->model->getValidationRules();
            $validation['nip'] = 'required|is_unique[users.nip,id,' . $user_id . ']';
            // return dd($validation);
            $validate = $this->validate($validation);
            // return dd($validate);
            $password = $this->request->getPost('password');



            if ($password) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }


            if ($validate) {
                // return dd($data);
                $this->model->update($user_id, $data);
                return redirect()->to('user/' . $user_id . '/edit')->with('success', 'berhasil mengubah pengguna');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->to('user/' . $user_id . '/edit')->with('error', 'gagal mengubah pengguna');
    }


    public function destroy($user_id)
    {
        $this->model->delete($user_id);
        return redirect()->to('user')->with('success', 'berhasil menghapus pengguna');
    }
}
