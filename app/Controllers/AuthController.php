<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class AuthController extends BaseController
{

    protected $model, $session;

    public function __construct()
    {
        $this->model = new User();
        $this->session = Services::session();
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $validate = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validate) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->model->where('username', $username)->first();
            if ($user) {
                $userPassword = $user['password'];
                $password_verify = password_verify($password, $userPassword);
                if ($password_verify) {
                    $this->session->set([
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'role' => $user['role'],
                        'logged_in' => true
                    ]);

                    return redirect()->to('home');
                }
            }

            return redirect()->to('login')->with('error', 'username atau password salah');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
}
