<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BerkasModel;

class Berkas extends BaseController
{
    public function index()
    {
        $berkas = new BerkasModel();
        $data['berkas'] = $berkas->findAll();
        return view('view_berkas', $data);
    }
    public function upload()
    {

        return view('tombol_berkas');
    }

    public function create()
    {
        return view('form_upload');
    }

    public function save()
    {
        if (!$this->validate([
            'kode_kelompok' => [
                'rules' => 'required'

            ],
            'nama_kelompok' => [
                'rules' => 'required'

            ],
            'nama_ketua' => [
                'rules' => 'required'

            ],
            'nomor_hp' => [
                'rules' => 'required'

            ],
            'kabupaten' => [
                'rules' => 'required'
            ],
            'kecamatan' => [
                'rules' => 'required'

            ],
            'desa' => [
                'rules' => 'required'

            ],

            'keterangan' => [
                'rules' => 'required',

            ],
            'berkas' => [
                'rules' => 'uploaded[berkas]|mime_in[berkas,application/pdf,berkas,image/jpg,image/jpeg,image/gif,image/png]|max_size[berkas,5048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png,pdf',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]

            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $berkas = new BerkasModel();
        $dataBerkas = $this->request->getFile('berkas');
        $fileName = $dataBerkas->getRandomName();
        $berkas->insert([
            'kode_kelompok' => $this->request->getPost('kode_kelompok'),
            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
            'nama_ketua' => $this->request->getPost('nama_ketua'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa' => $this->request->getPost('desa'),

            'berkas' => $fileName,
            'keterangan' => $this->request->getPost('keterangan')
        ]);
        $dataBerkas->move('uploads/berkas/', $fileName);
        session()->setFlashdata('success', 'Berkas Berhasil diupload');
        return redirect()->to(base_url('berkas/upload'));
    }


    function download($id)
    {
        $berkas = new BerkasModel();
        $data = $berkas->find($id);
        return $this->response->download('uploads/berkas/' . $data->berkas, null);
    }
}
