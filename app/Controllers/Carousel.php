<?php

namespace App\Controllers;

use App\Models\CarouselM;

class Carousel extends BaseController
{
    protected $carouselm;
    function __construct()
    {
        $this->carouselm = new CarouselM();
    }
    public function index()
    {
        $this->data = array('title' => 'Carousel | Admin', 'breadcome' => 'Carousel', 'url' => 'carousel/', 'm_carousel' => 'active', 'session' => $this->session);

        echo view('App\Views\carousel\carousel_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->carouselm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->nama;
            $row['gambar'] = '<img width="250" alt="Carousel Image" src="' . site_url("Berita/img_medium/" . $rows->gambar) . '" class="mb-3 img-responsive" />';
            $row['status'] = $rows->status == 1 ? '<div class="text-center"><i class="fa fa-check text-success"></i> Tayang</div>' : '<div class="text-center"><i class="fa fa-times text-danger"></i> Tidak Tayang</div>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->carouselm->total(),
            "totalNotFiltered" => $this->carouselm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\carousel\form_input', $data);
        }
        $status['html']         = view('App\Views\carousel\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Carousel';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->carouselm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\carousel\form_input', $data);
        }
        $status['html']         = view('App\Views\carousel\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Carousel';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('nama');
                $data = array();
                foreach ($nama as $key => $val) {
                    $sumber = $this->request->getFiles('gambar')['gambar'][$key];
                    $fileName = 'carousel_' . $sumber->getRandomName();
                    if ($this->upload_img($fileName, $sumber)) {
                        array_push($data, array(
                            'nama' => $this->request->getPost('nama')[$key],
                            'gambar' => $fileName,
                            'status' => 0,
                        ));
                    }
                }
                if ($this->carouselm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Carousel Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->carouselm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $sumber = $this->request->getFiles('gambar')['gambar'][$key];
                    $fileName = 'carousel_' . $sumber->getRandomName();
                    $sumberLama = $this->request->getVar('gambar_lama')[$key];

                    if ($sumber->getError() != 4) { // cek if mengganti gambar?
                        if ($this->upload_img($fileName, $sumber)) {
                            array_push($data, array(
                                'id' => $val,
                                'nama' => $this->request->getPost('nama')[$key],
                                'gambar' => $fileName,
                            ));
                            unlink(WRITEPATH . 'uploads/img/' . $sumberLama); // hapus gambar lama
                        }
                    } else {
                        array_push($data, array(
                            'id' => $val,
                            'nama' => $this->request->getPost('nama')[$key],
                            'gambar' => $sumberLama,
                        ));
                    }
                }
                if ($this->carouselm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Carousel Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->carouselm->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $status = $this->carouselm->find($id)[$key];
                    array_push($data, array(
                        'id' => $val,
                        'status' => $status->status > 0 ? 0 : 1,
                    ));
                }
                if ($this->carouselm->updateBatch($data, 'id')) {
                    $status = [
                        'type' => 'success',
                        'text' => 'Data Carousel Telah Di Ubah'
                    ];
                } else {
                    $status = [
                        'type' => 'error',
                        'text' => $this->carouselm->errors()
                    ];
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                $result = $this->carouselm->find($id);
                if (unlink(WRITEPATH . "uploads/img/$result->gambar")) {
                    $this->carouselm->delete($id);
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
    private function upload_img($file_name, $img): bool
    {
        $validationRule = [
            'gambar' => [
                'label' => 'IMG File',
                'rules' => 'uploaded[gambar]'
                    . '|is_image[gambar]'
                    . '|mime_in[gambar,image/jpg,image/jpeg,image/png]'
                    . '|max_size[gambar,3080]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('gambar'));
            return false;
        }
        $filepath = WRITEPATH . 'uploads/';
        $file_old = $this->request->getPost('old_file');
        if (!empty($file_old)) {
            delete_files($filepath . 'img/', $file_old); //Hapus terlebih dahulu jika file ada
        }
        if ($img->isValid() && !$img->hasMoved()) {
            $image = \Config\Services::image('gd'); //Load Image Libray
            $image->withFile($img)->fit(1302, 654)->save($filepath . 'img/' . $file_name);
            return true;
        } else {
            $this->session->setFlashdata('error', $img->getErrorString() . '(' . $img->getError() . ')');
            return false;
        }
    }
}

/* End of file Carousel.php */
/* Location: ./app/controllers/Carousel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-28 04:59:19 */
/* http://harviacode.com */