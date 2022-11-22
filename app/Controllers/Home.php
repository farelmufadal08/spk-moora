<?php

namespace App\Controllers;

use App\Models\Homes;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Homes = new Homes();
    }


    public function index()
    {
        $data = array(
            'tittle' => 'home',
            'tot_user' => $this->Homes->tot_user(),
            'tot_alternatif' => $this->Homes->tot_alternatif(),
            'tot_kriteria' => $this->Homes->tot_kriteria(),
            'tot_keterangan' => $this->Homes->tot_keterangan(),
            'isi' => 'v_home'

        );

        return view('home/index', $data);
    }
    public function kelompok()
    {
        return view('home/home_kelompok');
    }
}
