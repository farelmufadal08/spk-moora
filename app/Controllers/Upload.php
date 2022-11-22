<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Upload extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() == 'post') {
            // disini kita lakukan proses upload
            $database = \Config\Database::connect();
            $gambar = $database->table('gambar');


            $pesan = 'silakan pilih file yang akan di upload';
            foreach ($this->request->getFileMultiple('gambar') as $file) {
                if ($file->isvalid()) {
                    $file->move(WRITEPATH . 'uploads');

                    $data = [
                        'nama_file' => $file->getClientName(),
                        'tipe_file' => $file->getClientMimeType(),

                    ];
                    $gambar->insert($data);
                    $pesan = 'file berhasil disimpan';
                }
            }
            return redirect()->back()->with('pesan', $pesan);
        } else {
            return view('upload');
        }
    }
}
