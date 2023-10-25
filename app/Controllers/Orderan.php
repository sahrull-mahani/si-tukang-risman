<?php

namespace App\Controllers;

use App\Models\OrderanM;
use App\Models\TukangM;

class Orderan extends BaseController
{
    protected $orderanm, $tukangm, $data, $session;
    function __construct()
    {
        $this->orderanm = new OrderanM();
        $this->tukangm = new TukangM();
    }
    public function index()
    {
        $this->data = array('title' => 'Orderan | Admin', 'breadcome' => 'Orderan', 'url' => 'orderan/', 'm_orderan' => 'active', 'session' => $this->session);

        echo view('App\Views\orderan\orderan_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->orderanm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['user_id'] = $rows->nama_user;
            $row['tukang_id'] = $rows->nama;
            $row['keterangan'] = $rows->keterangan;
            $row['rating'] = "$rows->rating Bintang";
            $row['durasi'] = $rows->durasi;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->orderanm->total(),
            "totalNotFiltered" => $this->orderanm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\orderan\form_input', $data);
        }
        $status['html']         = view('App\Views\orderan\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Orderan';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->orderanm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\orderan\form_input', $data);
        }
        $status['html']         = view('App\Views\orderan\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Orderan';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function detail()
    {
        $id = $this->request->getPost('id');
        $this->data = array();
        foreach ($id as $ids) {
            $get = $this->orderanm->select('orderan.*, u.nama_user')->joinUser()->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama_user . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\orderan\detail', $data);
        }
        $status['html']         = view('App\Views\orderan\form_modal', $this->data);
        $status['modal_title']  = 'Detail Orderan';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                // $nama = $this->request->getPost('nama');
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'user_id' => $this->request->getPost('user_id')[$key],
                        'tukang_id' => $this->request->getPost('tukang_id')[$key],
                        'status' => $this->request->getPost('status')[$key],
                        'keterangan' => $this->request->getPost('keterangan')[$key],
                        'rating' => $this->request->getPost('rating')[$key],
                        'durasi' => $this->request->getPost('durasi')[$key],
                    ));
                }
                // print_r($data);
                // die;
                if ($this->orderanm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Orderan Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->orderanm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'user_id' => $this->request->getPost('user_id')[$key],
                        'tukang_id' => $this->request->getPost('tukang_id')[$key],
                        'status' => $this->request->getPost('status')[$key],
                        'keterangan' => $this->request->getPost('keterangan')[$key],
                        'rating' => $this->request->getPost('rating')[$key],
                        'durasi' => $this->request->getPost('durasi')[$key],
                    ));
                }
                if ($this->orderanm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Orderan Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->orderanm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->orderanm->delete($this->request->getPost('id'))) {
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

    public function pesanan($id)
    {
        $tukang = $this->tukangm->select('tukang.id, o.id as id_order, u.nama_user, u.phone')->join('orderan o', 'o.tukang_id = tukang.id')->join('users u', 'u.id = o.user_id')->find($id);
        $data = ['title' => 'Orderan | Admin', 'breadcome' => "Pesanan $tukang->nama_user", 'url' => 'orderan/', 'm_orderan' => 'active', 'tukang' => $tukang];
        return view('orderan/data-orderan', $data);
    }
    public function konfir($id)
    {
        $this->tukangm->update($id, ['status' => 2]);
        return redirect()->to('/home')->with('success', 'Berhasil dikonfirmasi');
    }

    public function tolak($id, $idtukang)
    {
        $this->tukangm->update($idtukang, ['status' => 0]);
        $this->orderanm->delete($id);
        return redirect()->to('/home')->with('success', 'Berhasil ditolak');
    }
}

/* End of file Orderan.php */
/* Location: ./app/controllers/Orderan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-04 18:24:40 */
/* http://harviacode.com */