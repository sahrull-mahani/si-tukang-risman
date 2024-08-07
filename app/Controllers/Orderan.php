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
            $row['jenis_kerja'] = $rows->jenis_kerja;
            $row['biaya'] = rupiah(getBiayaKategori($rows->tukang_id, $rows->kategori));
            $row['keterangan'] = $rows->keterangan;
            $row['rating'] = $rows->rating != null ? "$rows->rating Bintang" : '-';
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
        $status['modal_size']   = 'modal-xl';
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
            case 'doned':
                $id=$this->request->getPost('id');
                $orderan = $this->orderanm->find($id[0]);
                if ($this->orderanm->doned($id)) {
                    $this->tukangm->where('id', $orderan->tukang_id)->set('status', 0)->update();
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Doned..!</strong>Berhasil dikonfirmasi';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses konfirmasi data gagal.';
                }
                echo json_encode($status);
                break;
        }
    }

    public function pesanan($idorder)
    {
        $order = $this->orderanm->find($idorder);
        if (!$order) {
            return redirect()->to('/home');
        }
        $tukang = $this->tukangm->select('tukang.id AS idtukang, o.*, u.nama_user, u.phone')->join('orderan o', 'o.tukang_id = tukang.id')->join('users u', 'u.id = o.user_id')->where('o.id', $idorder)->first();
        $data = ['title' => 'Orderan | Admin', 'breadcome' => "Pesanan $tukang->nama_user", 'url' => 'orderan/', 'm_orderan' => 'active', 'tukang' => $tukang];
        return view('orderan/data-orderan', $data);
    }
    public function konfir($idorder)
    {
        $oderan = $this->orderanm->find($idorder);
        $this->tukangm->update($oderan->tukang_id, ['status' => 2]);
        $this->orderanm->update($idorder, ['status' => 'diterima']);
        return redirect()->to('/home')->with('success', 'Berhasil dikonfirmasi');
    }

    public function tolak()
    {
        $idorder = $this->request->getPost('idorder');
        $alasan = $this->request->getPost('alasan');
        $order = $this->orderanm->find($idorder);
        $this->orderanm->update($idorder, ['status' => 'ditolak', 'keterangan' => $alasan]);
        $this->tukangm->update($order->tukang_id, ['status' => 0]);
        $this->orderanm->delete($idorder);
        return $idorder;
    }
}

/* End of file Orderan.php */
/* Location: ./app/controllers/Orderan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-04 18:24:40 */
/* http://harviacode.com */