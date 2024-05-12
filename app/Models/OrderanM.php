<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderanM extends Model
{
    protected $table = 'orderan';
    protected $allowedFields = array('user_id', 'tukang_id', 'kategori', 'deskripsi', 'ukuran', 'jenis_kerja', 'biaya', 'konsumsi', 'alat', 'detail', 'status', 'keterangan', 'rating');
    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'user_id' => 'required|max_length[20]',
        'tukang_id' => 'required|max_length[20]',
        'kategori' => 'required|max_length[200]',
        'deskripsi' => 'required|max_length[200]',
        'ukuran' => 'required|max_length[200]',
        'jenis_kerja' => 'required',
        'biaya' => 'required',
        'konsumsi' => 'required',
        'alat' => 'required',
        'detail' => 'required',
        'status' => 'max_length[20]',
        'keterangan' => 'max_length[65535]',
        'rating' => 'max_length[100]',
    ];

    protected $validationMessages = [
        'user_id' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 20 Karakter'],
        'tukang_id' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 20 Karakter'],
        'kategori' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 200 Karakter'],
        'deskripsi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 200 Karakter'],
        'ukuran' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 200 Karakter'],
        'jenis_kerja' => ['required' => 'tidak boleh kosong'],
        'biaya' => ['required' => 'tidak boleh kosong'],
        'konsumsi' => ['required' => 'tidak boleh kosong'],
        'alat' => ['required' => 'tidak boleh kosong'],
        'detail' => ['required' => 'tidak boleh kosong'],
        'status' => ['max_length' => 'Maximal  Karakter'],
        'keterangan' => ['max_length' => 'Maximal 65535 Karakter'],
        'rating' => ['max_length' => 'Maximal  Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('user_id', 'tukang_id', 'lokasi', 'tugas', 'jenis_kerja', 'status', 'keterangan', 'rating', 'durasi');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_GET['search']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_GET['search']);
                } else {
                    $this->orLike($item, $_GET['search']);
                }
                if (count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if (isset($_GET['order'])) {
            $this->orderBy($_GET['sort'], $_GET['order']);
        } else {
            $this->orderBy('id', 'asc');
        }

        $this->select('orderan.*, u.nama_user, t.nama');
        $this->join('users u', 'u.id = orderan.user_id');
        $this->join('tukang t', 't.id = orderan.tukang_id');
        if (!is_admin()) {
            $this->where('tukang_id', getTukang(session('user_id'))->id);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total()
    {
        $this->_get_datatables();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }

    public function joinUser()
    {
        return $this->join('users u', 'u.id = orderan.user_id');
    }
}
/* End of file OrderanM.php */
/* Location: ./app/models/OrderanM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-11-04 18:24:40 */