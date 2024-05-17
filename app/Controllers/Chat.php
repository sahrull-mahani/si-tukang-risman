<?php

namespace App\Controllers;

use App\Models\ChatM;
use Pusher\Pusher;

class Chat extends BaseController
{
    protected $chatm, $data;
    function __construct()
    {
        $this->chatm = new ChatM();
    }
    // public function index()
    // {
    //     $data = array('title' => 'Chat | Admin', 'breadcome' => 'Chat', 'url' => 'chat/', 'm_chat' => 'active');

    //     echo view('App\Views\chat\chat_list', $data);
    // }

    // public function ajax_request()
    // {
    //     $list = $this->chatm->get_datatables();
    //     $dataa = array();
    //     $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
    //     foreach ($list as $rows) {
    //         $row = array();
    //         $row['id'] = $rows->id;
    //         $row['nomor'] = $no++;
    //         $row['id_user'] = $rows->id_user;
    //         $row['id_tukang'] = $rows->id_tukang;
    //         $row['pesan'] = $rows->pesan;
    //         $dataa[] = $row;
    //     }
    //     $output = array(
    //         "total" => $this->chatm->total(),
    //         "totalNotFiltered" => $this->chatm->countAllResults(),
    //         "rows" => $dataa,
    //     );
    //     echo json_encode($output);
    // }
    // public function create()
    // {
    //     $data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
    //     $num_of_row = $this->request->getVar('num_of_row');
    //     for ($x = 1; $x <= $num_of_row; $x++) {
    //         $dataa['nama'] = 'Data ' . $x;
    //         $data['form_input'][] = view('App\Views\chat\form_input', $dataa);
    //     }
    //     $status['html']         = view('App\Views\chat\form_modal', $data);
    //     $status['modal_title']  = 'Tambah Data Chat';
    //     $status['modal_size']   = 'modal-lg';
    //     echo json_encode($status);
    // }
    // public function edit()
    // {
    //     $id = $this->request->getVar('id');
    //     $data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
    //     foreach ($id as $ids) {
    //         $get = $this->chatm->find($ids);
    //         $dataa = array(
    //             'nama' => '<b>' . $get->nama . '</b>',
    //             'get' => $get,
    //         );
    //         $data['form_input'][] = view('App\Views\chat\form_input', $dataa);
    //     }
    //     $status['html']         = view('App\Views\chat\form_modal', $data);
    //     $status['modal_title']  = 'Update Data Chat';
    //     $status['modal_size']   = 'modal-lg';
    //     echo json_encode($status);
    // }
    // public function save()
    // {
    //     switch ($this->request->getPost('action')) {
    //         case 'insert':
    //             $nama = $this->request->getPost('nama');
    //             $dataa = array();
    //             foreach ($nama as $key => $val) {
    //                 array_push($dataa, array(
    //                     'id_user' => $this->request->getPost('id_user')[$key],
    //                     'id_tukang' => $this->request->getPost('id_tukang')[$key],
    //                     'pesan' => $this->request->getPost('pesan')[$key],
    //                 ));
    //             }
    //             if ($this->chatm->insertBatch($dataa)) {
    //                 $status['type'] = 'success';
    //                 $status['text'] = 'Data Chat Tersimpan';
    //             } else {
    //                 $status['type'] = 'error';
    //                 $status['text'] = $this->chatm->errors();
    //             }
    //             echo json_encode($status);
    //             break;
    //         case 'update':
    //             $id = $this->request->getPost('id');
    //             $dataa = array();
    //             foreach ($id as $key => $val) {
    //                 array_push($dataa, array(
    //                     'id' => $val,
    //                     'id_user' => $this->request->getPost('id_user')[$key],
    //                     'id_tukang' => $this->request->getPost('id_tukang')[$key],
    //                     'pesan' => $this->request->getPost('pesan')[$key],
    //                 ));
    //             }
    //             if ($this->chatm->updateBatch($dataa, 'id')) {
    //                 $status['type'] = 'success';
    //                 $status['text'] = 'Data Chat Telah Di Ubah';
    //             } else {
    //                 $status['type'] = 'error';
    //                 $status['text'] = $this->chatm->errors();
    //             }
    //             echo json_encode($status);
    //             break;
    //         case 'delete':
    //             if ($this->chatm->delete($this->request->getPost('id'))) {
    //                 $status['type'] = 'success';
    //                 $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
    //             } else {
    //                 $status['type'] = 'error';
    //                 $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
    //             }
    //             echo json_encode($status);
    //             break;
    //     }
    // }

    public function pribadi($id)
    {
        $pesan = $this->chatm->where('id_order', $id)->findAll();

        $id_user = session('user_id');
        $data = ['title' => 'Chat | Admin', 'breadcome' => 'Chat', 'pesan' => $pesan, 'id_order' => $id, 'userid' => $id_user];
        return view('chat/pribadi', $data);
    }

    public function getMessages()
    {
        $id_order = $this->request->getPost('id_order');
        $pesan = $this->chatm->where('id_order', $id_order)->findAll();
        $html = view('chat/item', ['pesan' => $pesan, 'level' => session('userlevel')]);

        return $this->response->setJSON(['html' => $html]);
    }

    public function sendMessage()
    {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'f3ddd543d7a028f9e4b9',
            'a9b62210c1b9b09c3f98',
            '1370101',
            $options
        );

        $id_order = $this->request->getPost('id_order');
        $id_user = $this->request->getPost('id_user') ?? null;
        $id_tukang = $this->request->getPost('id_tukang') ?? null;
        $pesan = $this->request->getPost('pesan');
        $data = [
            'id_order' => $id_order,
            'id_user' => $id_user,
            'id_tukang' => $id_tukang,
            'pesan' => $pesan,
        ];
        try {
            $this->chatm->insert($data);
        } catch (\Throwable $th) {
            return $this->response->setJSON(['message' => $th])->setStatusCode(400);
        }

        $pesan = $this->chatm->where('id', $this->chatm->getInsertID())->findAll();
        
        $level = session('userlevel') == 'tukang' ? 'users' : 'tukang';
        $html = view('chat/item', ['pesan' => $pesan, 'level' => $level]);
        $message = [
            'html' => $html,
            'level' => $level
        ];
        try {
            $pusher->trigger('my-channel', 'chat', $message);
        } catch (\Throwable $th) {
            return $this->response->setJSON(['message' => 'Periksa koneksi internet Anda!'])->setStatusCode(400);
        }
        
        $html = view('chat/item', ['pesan' => $pesan, 'level' => session('userlevel')]);
        return $this->response->setJSON(['html' => $html]);
    }
}

/* End of file Chat.php */
/* Location: ./app/controllers/Chat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-05-17 08:40:53 */
/* http://harviacode.com */