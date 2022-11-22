<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;

class KriteriaController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new Kriteria();
    }

    public function index()
    {
        $kriterias = $this->model->findAll();
        $data = [
            'kriterias' => $kriterias
        ];

        return view('kriteria/index', $data);
    }

    public function create()
    {
        return view('kriteria/create');
    }

    public function edit($kriteria_id)
    {
        $kriteria = $this->model->find($kriteria_id);
        $data = [
            'kriteria' => $kriteria
        ];

        return view('kriteria/edit', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $validation = $this->model->getValidationRules();
        $validate = $this->validate($validation);

        if ($validate) {
            $this->model->insert($data);
            return redirect()->to('kriteria')->with('success', 'berhasil menambah kriteria');
        }
        return redirect()->to('kriteria/create')->with('error', 'gagal menambah kriteria');
    }

    public function update($kriteria_id)
    {
        $data = $this->request->getPost();
        $validation = $this->model->getValidationRules();
        $validate = $this->validate($validation);

        if ($validate) {
            $this->model->update($kriteria_id, $data);
            return redirect()->to('kriteria/' . $kriteria_id . '/edit')->with('success', 'berhasil mengubah kriteria');
        }
        return redirect()->to('kriteria/' . $kriteria_id . '/edit')->with('error', 'gagal mengubah kriteria');
    }

    public function destroy($kriteria_id)
    {
        $this->model->delete($kriteria_id);
        return redirect()->to('kriteria')->with('success', 'berhasil menghapus kriteria');
    }
}
