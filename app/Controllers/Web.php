<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\BeritaViewModel;
use App\Models\GaleriModel;
use App\Models\IonAuthModel;
use App\Models\KategoriM;
use App\Models\OrderanM;
use App\Models\TukangM;

class Web extends BaseController
{
    protected $tukangm, $orderanm, $galerim, $beritam, $bvm, $authm, $kategorim;
    public function __construct()
    {
        helper(['get_client_ip', 'hari_indo', 'auth_helper']);
        $this->tukangm = new TukangM();
        $this->orderanm = new OrderanM();
        $this->galerim = new GaleriModel();
        $this->beritam = new BeritaModel();
        $this->bvm = new BeritaViewModel();
        $this->authm = new IonAuthModel();
        $this->kategorim = new KategoriM();
    }

    public function img_thumb($file_name)
    {
        $filepath = WRITEPATH . 'uploads/thumbs/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
    public function img_medium($file_name)
    {
        $filepath = WRITEPATH . 'uploads/img/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }

    public function index()
    {
        $data = [
            'title'     => "Home",
            'a_home'    => 'active',
            'kategori'  => $this->kategorim->findAll(),
            'orderan'   => $this->orderanm->join('users u', 'u.id = orderan.user_id')->where('orderan.keterangan !=', null)->orderBy('orderan.id', 'desc')->groupBy('orderan.user_id')->findAll(2),
            'galeri'    => $this->galerim->like('sumber', 'project_')->findAll(),
            'berita'    => $this->beritam->joinGaleri()->findAll(),
        ];

        return view("App\Views\web\home", $data);
    }

    public function tentang()
    {
        $data = [
            'title'     => "Tentang",
            'a_tentang' => 'active'
        ];
        return view("App\Views\web\about", $data);
    }

    public function layanan()
    {
        $data = [
            'title'     => "Layanan",
            'a_layanan' => 'active'
        ];
        return view("App\Views\web\services", $data);
    }

    public function proyek()
    {
        $data = [
            'title'     => "Proyek",
            'a_proyek'  => 'active',
            'tukang'    => $this->tukangm->selectCount('o.tukang_id', 'totalcount')->selectSum('o.rating', 'totalrating')->select('tukang.*,o.user_id orderer, o.rating')->join('orderan o', 'o.tukang_id = tukang.id', 'left')->groupBy('tukang.nama')->findAll(),
            'galeri'    => $this->galerim,
        ];
        return view("App\Views\web\cars", $data);
    }
    public function rental()
    {
        $idtukang = $this->request->getPost('idtukang');
        $lokasi = $this->request->getPost('lokasi');
        $tugas = $this->request->getPost('tugas');
        $jenis_kerja = $this->request->getPost('jenis_kerja');
        $data = [
            'user_id'   => session('user_id'),
            'tukang_id' => $idtukang,
            'lokasi' => $lokasi,
            'tugas' => $tugas,
            'jenis_kerja' => $jenis_kerja,
        ];
        $this->orderanm->insert($data);
        $this->tukangm->update($idtukang, ['status' => 1]);
        $status['title'] = 'Berhasil';
        $status['type'] = 'success';
        $status['text'] = 'Berhasil dirental, tunggu konfirmasi tukang';
        return json_encode($status);
        // return redirect()->to('/web/proyek');
    }
    public function selesai()
    {
        $idtukang = $this->request->getPost('id');
        $where = [
            'user_id'   => session('user_id'),
            'tukang_id' => $idtukang,
        ];
        $orderlast = $this->orderanm->where($where)->orderBy('id', 'desc')->first();
        $data = [
            'keterangan'    => $this->request->getPost('keterangan'),
            'rating'        => $this->request->getPost('rating'),
            'durasi'        => $this->request->getPost('durasi'),
        ];
        $this->orderanm->update($orderlast->id, $data);
        if ($this->tukangm->update($idtukang, ['status' => 0])) {
            $status = [
                'type' => 'success',
                'message' => 'Data berhasil Terkirim'
            ];
        } else {
            $status = [
                'type' => 'error',
                'message' => 'Data gagal Terkirim'
            ];
        }
        return json_encode($status);
    }

    public function blog()
    {
        $data = [
            'title'     => "Blog",
            'a_blog'    => 'active',
            'berita'    => $this->beritam->joinGaleri()->findAll(),
        ];
        return view("App\Views\web\blog", $data);
    }
    public function detail($slug)
    {
        $berita = $this->beritam->where('slug', $slug)->first();
        $this->bvm->set_counter($berita->id, get_client_ip(), $_SERVER['HTTP_USER_AGENT']);
        $data = [
            'title'     => ucwords($berita->judul),
            'a_blog'    => 'active',
            'berita'    => $berita,
            'author'    => $this->authm->user(session($berita->id_user)),
            'galeri'    => $this->galerim,
        ];
        return view("App\Views\web\single", $data);
    }

    public function kontak()
    {
        $data = [
            'title'     => "Kontak",
            'a_kontak' => 'active'
        ];
        return view("App\Views\web\contact", $data);
    }

    public function orderan()
    {
        if (!logged_in() || !in_groups('users')) {
            return redirect()->back();
        }
        $notnull = [
            'durasi !='             => null,
            'rating !='             => null,
            'orderan.keterangan !=' => null,
        ];
        $data = [
            'title'     => "orderan",
            'a_orderan' => 'active',
            'berita'    => $this->beritam->joinGaleri()->orderBy('id', 'desc')->first(),
            'orderan'   => $this->orderanm->join('tukang t', 't.id = orderan.tukang_id')->where('orderan.user_id', session('user_id'))->where($notnull)->orderBy('orderan.id', 'desc')->findAll()
        ];
        return view("App\Views\web\orderan", $data);
    }
}
