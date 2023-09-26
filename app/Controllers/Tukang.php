<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use App\Models\KategoriM;
use App\Models\TukangM;

class Tukang extends BaseController
{
    protected $tukangm;
    function __construct()
    {
        $this->tukangm = new TukangM();
        $this->galerim = new GaleriModel();
        $this->kategorim = new KategoriM();
        $this->db = db_connect();
    }
    public function index()
    {
        $this->data = array('title' => 'Tukang', 'breadcome' => 'Tukang', 'url' => 'tukang/', 'm_tukang' => 'active', 'session' => $this->session);

        echo view('App\Views\tukang\tukang_list', $this->data);
    }
    public function post($id)
    {
        $get = $this->tukangm->find($id);
        $kategori = $this->kategorim->findAll();
        $this->data = array('title' => 'Profil Tukang', 'breadcome' => 'Profil Tukang', 'url' => 'tukang/', 'm_tukang' => 'active', 'get' => $get, 'kategori'=>$kategori);

        echo view('App\Views\tukang\post-tukang', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->tukangm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->nama;
            $row['nik'] = $rows->nik;
            $row['umur'] = $rows->umur;
            $row['alamat'] = $rows->alamat;
            $row['kategori'] = getKategori($rows->id);
            $row['telp'] = $rows->telp;
            $row['foto'] = '<img src="'. ($rows->foto == 'profile.png' ? '/admin_assets/img/profile.png' : base_url("Berita/img_thumb/$rows->foto")) .'" width="250"';
            $row['foto_ktp'] = '<img src="'. ($rows->foto_ktp != null ? base_url("Berita/img_thumb/$rows->foto_ktp") : '/admin_assets/img/profile.png') .'" width="250"';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->tukangm->total(),
            "totalNotFiltered" => $this->tukangm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create()
    {
        $this->data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $data['nama'] = 'Data ' . $x;
            $this->data['form_input'][] = view('App\Views\tukang\form_input', $data);
        }
        $status['html']         = view('App\Views\tukang\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Tukang';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $get = $this->tukangm->find($id);
        $kategori = $this->kategorim->findAll();
        $galeri = $this->galerim->galeriLikeWhere("project_$get->nama", $id)->findAll();
        $this->data = array('get' => $get, 'kategori'=>$kategori, 'action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit', 'nama' => '<b>' . $get->nama . '</b>');
        $this->data['form_input'][] = view('App\Views\tukang\form_input', $this->data);
        $status['html']         = view('App\Views\tukang\form_modal', $this->data);
        $status['modal_title']  = '<b>Update Data Tukang: </b>' . ucwords($get->nama);
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function detail()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => null, 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->tukangm->find($ids);
            $galeri = $this->galerim->galeriLikeWhere("project_$get->nama", $ids)->findAll();
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\tukang\detail_tukang', $data);
        }
        $status['html']         = view('App\Views\tukang\form_modal', $this->data);
        $status['modal_title']  = 'Detail';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('nama');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'nama' => $this->request->getPost('nama')[$key],
                        'nik' => $this->request->getPost('nik')[$key],
                        'umur' => $this->request->getPost('umur')[$key],
                        'alamat' => $this->request->getPost('alamat')[$key],
                        'kategori' => $this->request->getPost('kategori')[$key],
                        'telp' => $this->request->getPost('telp')[$key],
                        'foto' => $this->request->getPost('foto')[$key],
                        'foto_ktp' => $this->request->getPost('foto_ktp')[$key],
                    ));
                }
                if ($this->tukangm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Tukang Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->tukangm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $datatukang = $this->tukangm->find($id);
                $foto = $this->request->getFile('foto');
                if ($foto->getError() !== 4) { // cek jika upload file foto profil
                    $foto_name = 'foto_' . $foto->getRandomName();
                    // cek jika ada di database gambar
                    $getfoto = $this->tukangm->find($id);
                    if ($getfoto->foto != '') {
                        $pathimg = WRITEPATH . "uploads/img/$getfoto->foto";
                        $paththumbs = WRITEPATH . "uploads/thumbs/$getfoto->foto";
                        if (file_exists($pathimg) && file_exists($paththumbs)) {
                            unlink($pathimg); // delete terlebih dahulu
                            unlink($paththumbs); // delete terlebih dahulu
                        }
                    }
                    $this->upload_img($foto_name, $foto, 'foto');
                }

                $ktp = $this->request->getFile('ktp');
                if ($ktp->getError() !== 4) { // cek jika upload file ktp profil
                    $ktp_name = 'ktp_' . $ktp->getRandomName();
                    // cek jika ada di database gambar
                    $getktp = $this->tukangm->find($id);
                    if ($getktp->foto_ktp != '') {
                        $pathimg = WRITEPATH . "uploads/img/$getktp->foto_ktp";
                        $paththumbs = WRITEPATH . "uploads/thumbs/$getktp->foto_ktp";
                        if (file_exists($pathimg) && file_exists($paththumbs)) {
                            unlink($pathimg); // delete terlebih dahulu
                            unlink($paththumbs); // delete terlebih dahulu
                        }
                    }
                    $this->upload_img($ktp_name, $ktp, 'ktp');
                }

                $nama = $this->request->getPost('nama');
                $telp = $this->request->getPost('telp');
                $categories = $this->request->getPost('kategori');

                $data = array(
                    'id' => $id,
                    'nama' => $nama,
                    'nik' => $this->request->getPost('nik'),
                    'umur' => $this->request->getPost('umur'),
                    'alamat' => $this->request->getPost('alamat'),
                    'id_kategori' => $this->request->getPost('kategori'),
                    'telp' => $telp,
                    'foto' => $foto_name ?? ($datatukang->foto != 'profile.png' ? $datatukang->foto : 'profile.png'),
                    'foto_ktp' => $ktp_name ?? ($datatukang->foto_ktp != null ? $datatukang->foto_ktp : null),
                );
                if ($this->tukangm->update($id, $data)) {
                    $dataKategori = [];
                    if (count($categories) > 0) {
                        $this->db->table('kategori_group')->where('id_tukang', $id)->delete();
                        foreach ($categories as $row) {
                            array_push($dataKategori, [
                                'id_tukang'     => $id,
                                'id_kategori'   => $row,
                            ]);
                        }
                        $this->db->table('kategori_group')->insertBatch($dataKategori);
                    }
                    $this->db->table('users')->where('id', $datatukang->user_id)->set(['nama_user'=>$nama, 'img'=>$foto_name ?? ($datatukang->foto != 'profile.png' ? $datatukang->foto : 'profile.png'), 'phone'=>$telp])->update();
                    if (!is_admin()) {
                        $this->session->remove('nama_user');
                        $this->session->set('nama_user', $nama);
                        if ($foto->getError() !== 4) {
                            $this->session->remove('foto');
                            $this->session->set('foto', base_url('Berita/img_thumb/'.$foto_name));
                        }
                    }

                    $project = $this->request->getFileMultiple('fotoproject');
                    $galeri = [];
                    if ($project[0]->getError() !== 4) { // cek jika mengupload foto project
                        // cek jika ada di database gambar
                        $getproject = $this->galerim->where('id_sumber', $id)->like('sumber', "project_$nama")->findAll();
                        if (count($getproject) > 0) {
                            foreach ($getproject as $pic) {
                                $pathimg = WRITEPATH . "uploads/img/$pic->sumber";
                                $paththumbs = WRITEPATH . "uploads/thumbs/$pic->sumber";
                                if (file_exists($pathimg) && file_exists($paththumbs)) {
                                    unlink($pathimg); // delete terlebih dahulu
                                    unlink($paththumbs); // delete terlebih dahulu
                                }
                            }
                            $this->galerim->where('id_sumber', $id)->delete(); // delete dari database
                        }
    
                        // menambahkan foto project ke galeri
                        foreach ($project as $pic) {
                            $project_name = "project_$nama" . '_' . $pic->getRandomName();
                            if ($this->upload_img($project_name, $pic, 'fotoproject')) {
                                array_push($galeri, [
                                    'id_sumber' => $id,
                                    'sumber'    => $project_name,
                                    'id_user'   => session('user_id')
                                ]);
                            }
                        }
                        $this->galerim->insertBatch($galeri);
                    }
                    $status['redirect'] = 'tukang';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Tukang Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->tukangm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->tukangm->delete($this->request->getPost('id'))) {
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;
        }
    }

    public function fotoproject()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $data = $this->galerim->where('id_sumber', $id)->like('sumber', "project_$nama")->findAll();
        return json_encode($data);
    }

    private function upload_img($file_name, $img, $input): bool
    {
        $validationRule = [
            $input => [
                'label' => 'IMG File',
                'rules' => "uploaded[$input]"
                    . "|is_image[$input]"
                    . "|mime_in[$input,image/jpg,image/jpeg,image/png]"
                    . "|max_size[$input,3080]",
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError($input));
            return false;
        }
        $filepath = WRITEPATH . 'uploads/';
        // $file_old = $this->request->getPost('old_file');
        // if (!empty($file_old)) {
        //     delete_files($filepath . 'img/', $file_old); //Hapus terlebih dahulu jika file ada
        //     delete_files($filepath . 'thumbs/', $file_old); //Hapus terlebih dahulu jika file ada
        // }
        if ($img->isValid() && !$img->hasMoved()) {
            $image = \Config\Services::image('gd'); //Load Image Libray
            $image->withFile($img)->save($filepath . 'img/' . $file_name);
            //thumbs
            $image->withFile($img)
                ->fit(100, 100, 'center')
                ->save($filepath . 'thumbs/' . $file_name);
            // $img->move($filepath, $file_name, true);
            return true;
        } else {
            $this->session->setFlashdata('error', $img->getErrorString() . '(' . $img->getError() . ')');
            return false;
        }
    }

    public function getkategori($id)
    {
        $result = $this->db->table('kategori_group')->where('id_tukang', $id)->get()->getResult();
        return json_encode($result);
    }
}

/* End of file Tukang.php */
/* Location: ./app/controllers/Tukang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-07 17:30:22 */
/* http://harviacode.com */