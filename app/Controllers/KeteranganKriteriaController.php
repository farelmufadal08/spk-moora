<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeteranganKriteria;

class KeteranganKriteriaController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new KeteranganKriteria();
    }

    public function index($kriteria_id)
    {
        $keterangans = $this->model->where('kriteria_id', $kriteria_id)->findAll();
        $data = [
            'kriteria_id' => $kriteria_id,
            'keterangans' => $keterangans
        ];

        return view('kriteria/keterangan/index', $data);
    }

    public function create($kriteria_id)
    {
        $data = [
            'kriteria_id' => $kriteria_id
        ];
        return view('kriteria/keterangan/create', $data);
    }

    public function edit($keterangan_id)
    {
        $keterangan = $this->model->find($keterangan_id);
        $data = [
            'keterangan' => $keterangan
        ];

        return view('kriteria/keterangan/edit', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $validation = $this->model->getValidationRules();
        $validate = $this->validate($validation);

        if ($validate) {
            $this->model->insert($data);
            return redirect()->to('keterangan/' . $data['kriteria_id'] . '')->with('success', 'berhasil menambah keternagan kriteria');
        }

        return redirect()->to('keterangan/' . $data['kriteria_id'] . '/create')->with('error', 'gagal menambah keternagan kriteria');
    }

    public function update($keterangan_id)
    {
        $data = $this->request->getPost();
        $validation = $this->model->getValidationRules();
        unset($validation['kriteria_id']);
        $validate = $this->validate($validation);

        if ($validate) {
            $this->model->update($keterangan_id, $data);
            return redirect()->to('keterangan/' . $keterangan_id . '/edit')->with('success', 'berhasil mengubah data keterangan kriteria');
        }

        return redirect()->to('keterangan/' . $keterangan_id . '/edit')->with('error', 'gagal mengubah data keterangan kriteria');
    }

    public function destroy($kriteria_id, $keterangan_id)
    {
        $this->model->delete($keterangan_id);
        return redirect()->to('keterangan/' . $kriteria_id)->with('success', 'berhasil menghapus data keterangan kriteria');
    }
}
