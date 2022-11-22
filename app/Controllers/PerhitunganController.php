<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeteranganKriteriaPengajuan;
use Config\Database;

class PerhitunganController extends BaseController
{

    protected $model;
    protected $db;

    public function __construct()
    {
        $this->model = new KeteranganKriteriaPengajuan();
        $this->db = Database::connect();
    }

    public function moora()
    {
        $kelompoks = $this->model->findAllPenilaianpengajuan();
        $kriterias = $this->model->getKriteria();

        // return dd($kriterias);

        $nilaiKelompoks = array_map(function ($kelompok) {
            return [
                'id' => $kelompok['id'],
                'simluhtan' => $kelompok['simluhtan'],
                'nama_kelompok' => $kelompok['nama_kelompok'],
                'status' => $kelompok['status'],
                'kriteria' => array_map(function ($kriteria) {
                    return [
                        'kriteria_id' => $kriteria['kriteria_id'],
                        'kode_kriteria' => $kriteria['kode_kriteria'],
                        'kriteria' => $kriteria['kriteria'],
                        'cost_benefit' => $kriteria['cost_benefit'],
                        'bobot_kriteria' => $kriteria['bobot_kriteria'],
                        'bobot_pilihan' => array_sum(array_column($kriteria['keterangan'], 'bobot_pilihan')),
                        'keterangan_kriteria' => implode(', ', array_column($kriteria['keterangan'], 'keterangan_kriteria')),
                    ];
                }, $kelompok['kriteria'])
            ];
        }, $kelompoks);

        // return dd($nilaiKelompoks);

        $pembagiKriterias = array_map(function ($kriteria) use ($nilaiKelompoks) {
            return [
                'kriteria_id' => $kriteria['id'],
                'pembagi' => sqrt(array_sum(array_map(function ($nilaiKelompok) use ($kriteria) {
                    return (int)implode('', array_merge(array_filter(array_map(function ($nilaiKriteria) use ($kriteria) {
                        if ($nilaiKriteria['kriteria_id'] == $kriteria['id']) {
                            return pow($nilaiKriteria['bobot_pilihan'], 2);
                        }
                    }, $nilaiKelompok['kriteria']))));
                }, $nilaiKelompoks)))
            ];
        }, $kriterias);

        // return dd($pembagiKriterias);

        // return dd($pembagiKriterias[array_search(1, array_column($pembagiKriterias, 'kriteria_id'))]['pembagi']);

        $matriksKeputusans = array_map(function ($nilaiKelompok) use ($pembagiKriterias) {
            return [
                'id' => $nilaiKelompok['id'],
                'simluhtan' => $nilaiKelompok['simluhtan'],
                'nama_kelompok' => $nilaiKelompok['nama_kelompok'],
                'status' => $nilaiKelompok['status'],
                'kriteria' => array_map(function ($kriteria) use ($pembagiKriterias) {
                    $pembagi = $pembagiKriterias[array_search($kriteria['kriteria_id'], array_column($pembagiKriterias, 'kriteria_id'))]['pembagi'];
                    return [
                        'kriteria_id' => $kriteria['kriteria_id'],
                        'kode_kriteria' => $kriteria['kode_kriteria'],
                        'cost_benefit' => $kriteria['cost_benefit'],
                        'bobot_kriteria' => $kriteria['bobot_kriteria'],
                        'matriks_keputusan' => ($pembagi == 0 || $pembagi == null) ? 0 : $kriteria['bobot_pilihan'] / $pembagi
                    ];
                }, $nilaiKelompok['kriteria'])
            ];
        }, $nilaiKelompoks);

        // return dd($matriksKeputusans);


        $normalisasiMatriks = array_map(function ($matriksKeputusan) {
            return [
                'id' => $matriksKeputusan['id'],
                'simluhtan' => $matriksKeputusan['simluhtan'],
                'nama_kelompok' => $matriksKeputusan['nama_kelompok'],
                'status' => $matriksKeputusan['status'],
                'kriteria' => array_map(function ($kriteria) {
                    return [
                        'kriteria_id' => $kriteria['kriteria_id'],
                        'kode_kriteria' => $kriteria['kode_kriteria'],
                        'cost_benefit' => $kriteria['cost_benefit'],
                        'normalisasiMatriks' => $kriteria['matriks_keputusan'] * $kriteria['bobot_kriteria']
                    ];
                }, $matriksKeputusan['kriteria'])
            ];
        }, $matriksKeputusans);

        $selisihs = array_map(function ($normalisasiMatrik) {
            return [
                'id' => $normalisasiMatrik['id'],
                'simluhtan' => $normalisasiMatrik['simluhtan'],
                'nama_kelompok' => $normalisasiMatrik['nama_kelompok'],
                'status' => $normalisasiMatrik['status'],
                'selisih' => array_sum(array_column(array_filter($normalisasiMatrik['kriteria'], fn ($array) => $array['cost_benefit'] == 'benefit'), 'normalisasiMatriks')) - array_sum(array_column(array_filter($normalisasiMatrik['kriteria'], fn ($array) => $array['cost_benefit'] == 'cost'), 'normalisasiMatriks'))
            ];
        }, $normalisasiMatriks);

        $rankings = $selisihs;

        array_multisort(array_column($rankings, 'selisih'), SORT_DESC, $rankings);

        return compact('kriterias', 'nilaiKelompoks', 'pembagiKriterias', 'matriksKeputusans', 'normalisasiMatriks', 'selisihs', 'rankings');
    }

    public function index()
    {
        $data = $this->moora();
        return view('perhitungan/index', $data);
    }

    public function store()
    {
        $pengajuan_id = $this->request->getPost('pengajuan_id');

        if ($pengajuan_id) {
            $this->db->table('pengajuans')->whereIn('id', $pengajuan_id)->update(['status' => 'menerima']);
        } else {
            $pengajuan = $this->db->table('pengajuans')->join('pengadaans', 'pengajuans.pengadaan_id=pengadaans.id')->select('pengajuans.id')->where('pengadaans.status', true)->get()->getResultArray();
            $pengajuan = array_column($pengajuan, 'id');
            $this->db->table('pengajuans')->whereIn('id', $pengajuan)->update(['status' => 'diterima']);
        }
        return redirect()->to('perhitungan');
    }
}
