<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaViewModel extends Model
{
  protected $table = "berita_view";
  protected $useTimestamps = true;
  protected $allowedFields = ['id_berita', 'ip_address', 'user_agent'];
  protected $primarykey = 'id';
  protected $returnType = 'object';

  public function set_counter($id_berita, $ip_address, $user_agent)
  {
    $data = [
      'id_berita'   => $id_berita,
      'ip_address'  => $ip_address,
      'user_agent'  => $user_agent
    ];
    if (count($this->where(['id_berita' => $id_berita,'ip_address' => $ip_address, 'user_agent' => $user_agent])->findAll()) == 0) {
      $this->insert($data);
    }
  }

  public function get_counter()
  {
    return $this->select('*')->join('berita b', 'b.id=berita_view.id_berita')->selectCount('berita_view.id', 'total')->orderBy('total', 'desc')->groupBy('b.id')->findAll(3);
  }
}