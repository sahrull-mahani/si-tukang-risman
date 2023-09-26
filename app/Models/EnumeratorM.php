<?php

namespace App\Models;

use CodeIgniter\Model;

class EnumeratorM extends Model
{
    protected $table = "enumerator";
    protected $allowedFields = [
        'rumahtangga_id',
        'nama_enum',
        'notelp_enum',
        'alamat_enum'
    ];
    protected $primarykey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'nama_enum' => 'required',
        'notelp_enum' => 'required',
        'alamat_enum' => 'required',
    ];

    protected $validationMessages = [
        'nama_enum' => ['required' => 'tidak boleh kosong'],
        'notelp_enum' => ['required' => 'tidak boleh kosong'],
        'alamat_enum' => ['required' => 'tidak boleh kosong']
    ];
    private function _get_datatables()
    {
        $column_search = array('nama_enum', 'notelp_enum', 'alamat_enum');
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
