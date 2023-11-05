<?php

namespace App\Models;

use CodeIgniter\Model;

class TukangM extends Model
{
    protected $table = 'tukang';
    protected $allowedFields = array('user_id', 'nama', 'nik', 'tarif', 'umur', 'alamat', 'telp', 'foto', 'foto_ktp', 'status');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'nama' => 'required|max_length[150]',
        'tarif' => 'required|max_length[100]',
        'umur' => 'required|max_length[3]',
        'alamat' => 'required|max_length[65535]',
        'telp' => 'required|max_length[15]',
        'foto' => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'tarif' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
        'umur' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'alamat' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 65535 Karakter'],
        'telp' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 15 Karakter'],
        'foto' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 100 Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('nama', 'nik', 'umur', 'alamat', 'telp', 'foto', 'foto_ktp');
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
        $this->select('tukang.*');
        if (!is_admin()) {
            $this->where('user_id', session('user_id'));
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
}
/* End of file TukangM.php */
/* Location: ./app/models/TukangM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-07 17:30:22 */