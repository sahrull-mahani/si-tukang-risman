<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model
{
  protected $table = 'statistik';
  protected $allowedFields = array('bidang', 'statistik', 'usia', 'jk', 'tahun', 'created_at', 'updated_at', 'deleted_at');
  protected $returnType     = 'object';

  protected $validationRules = [
    'bidang' => 'required',
    'statistik' => 'required|max_length[150]',
    'usia' => 'required|max_length[2]',
    'jk' => 'required|max_length[1]',
    'tahun' => 'required|max_length[4]',
  ];

  protected $validationMessages = [
    'bidang' => ['required' => 'tidak boleh kosong'],
    'statistik' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
    'usia' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 3 Karakter'],
    'jk' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 1 Karakter'],
    'tahun' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 4 Karakter'],
  ];

  private function _get_datatables()
  {
    $column_search = array('bidang', 'tahun');
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
    $this->select('*, COUNT(if (jk = 1, jk, NULL)) AS pria, COUNT(if (jk = 0, jk, NULL)) AS wanita');
    $this->selectCount('tahun', 'total');
    $this->groupBy('tahun');
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
