<?php

namespace App\Controllers;

use App\Models\AgendaM;
use App\Models\BeritaModel;
use App\Models\KategoriM;
use App\Models\PariwisataModel;
use App\Models\ProgramModel;
use App\Models\TukangM;

class Home extends BaseController
{

    function __construct()
    {
        $this->beritam = new BeritaModel();
        $this->tukangm = new TukangM();
        $this->kategorim = new KategoriM();
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Si &mdash; Tukang',
            'm_home' => 'active',
            'berita' => $this->beritam->countAllResults(),
            'tukang' => $this->tukangm->countAllResults(),
            'kategori' => $this->kategorim->countAllResults(),
            'users'  => $this->db->table('users')->where('id >', 1)->get()->getResult()
        ];

        return view('App\Views\template_adminlte\home', $data);
    }
}
