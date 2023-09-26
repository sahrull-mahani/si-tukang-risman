<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
  protected $table = "berita";
  protected $allowedFields = ['judul', 'slug', 'isi_berita', 'id_user', 'pesan'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  protected $validationRules = [
    'judul' => 'required|max_length[255]',
    'slug' => 'required|max_length[255]',
    'isi_berita' => 'required|max_length[65535]',
    'id_user' => 'required|max_length[1]',
  ];

  protected $validationMessages = [
    'judul' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
    'slug' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 255 Karakter'],
    'isi_berita' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 65535 Karakter'],
    'id_user' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 1 Karakter'],
    'pesan' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
  ];
  private function _get_datatables()
  {
    $column_search = array('level', 'judul', 'slug', 'isi_berita', 'id_user');
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
    if (!is_admin()) {
      $this->where('status !=', 1);
    }
    $this->select('berita.*, u.nama_user, g.sumber');
    $this->join('users u', 'u.id=berita.id_user');
    $this->join('galeri g', 'g.id_sumber=berita.id');
    $this->like('g.sumber', 'berita_');
    $this->groupBy('id_sumber');
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

  public function set_counter($id_berita, $ip_address, $user_agent)
  {
    $data = [
      'id_berita'   => $id_berita,
      'ip_address'  => $ip_address,
      'user_agent'  => $user_agent
    ];
    if (count($this->db->table('berita_view')->getWhere(['id_berita' => $id_berita, 'ip_address' => $ip_address, 'user_agent' => $user_agent])->getResultArray()) == 0) {
      $this->db->table('berita_view')->insert($data);
    }
  }

  public function joinGaleri()
  {
    return $this->select('berita.*, g.sumber, g.id_sumber')->join('galeri g', 'g.id_sumber=berita.id')->like('sumber', 'berita_')->groupBy('berita.id');
  }

  public function joinUser()
  {
    return $this->join('users u', 'u.id=berita.id_user');
  }
}
