<?php

namespace App\Controllers;

use App\Models\KategoriM;

class Kategori extends BaseController
{
    protected $kategorim, $db,$data,$session;
    function __construct()
    {
        $this->kategorim = new KategoriM();
        $this->db = db_connect();
    }
    public function index()
    {
        $this->data = array('title' => 'Kategori', 'breadcome' => 'Kategori', 'url' => 'kategori/', 'm_kategori' => 'active', 'session' => $this->session);

        echo view('App\Views\kategori\kategori_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->kategorim->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama_kategori);
            $row['ket'] = $rows->keterangan;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->kategorim->total(),
            "totalNotFiltered" => $this->kategorim->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\kategori\form_input', $data);
        }
        $status['html']         = view('App\Views\kategori\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Kategori Tukang';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->kategorim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama_kategori . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\kategori\form_input', $data);
        }
        $status['html']         = view('App\Views\kategori\form_modal', $this->data);
        $status['modal_title']  = '<b>Update Data Kategori Tukang: </b>';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'nama_kategori' => $this->request->getPost('nama_kategori')[$key],
                        'keterangan' => empty($this->request->getPost('keterangan')[$key]) ? NULL : $this->request->getPost('keterangan')[$key],
                    ));
                }
                if ($this->kategorim->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kategori Tukang Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->kategorim->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $ids = $this->request->getPost('id');
                $nama = $this->request->getPost('nama_kategori');
                $data = [];
                foreach ($ids as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'nama_kategori' => $this->request->getPost('nama_kategori')[$key],
                        'keterangan' => empty($this->request->getPost('keterangan')[$key]) ? NULL : $this->request->getPost('keterangan')[$key],
                    ));
                }
                if ($this->kategorim->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Tukang Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->kategorim->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                $this->db->table('kategori_group')->where('id_kategori', $id)->delete();
                if ($this->kategorim->delete($id)) {
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
}

/* End of file Tukang.php */
/* Location: ./app/controllers/Tukang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-07 17:30:22 */
/* http://harviacode.com */