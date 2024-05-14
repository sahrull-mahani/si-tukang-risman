<?php

use CodeIgniter\I18n\Time;

function get_format_date_sql($date)
{
  $tgl = new DateTime($date);
  return $tgl->format("Y-m-d");
}
function get_format_date($date)
{
  $tgl = new DateTime($date);
  return $tgl->format("d-m-Y");
}
function GetDateNow()
{
  $tgl = new DateTime("now");
  return $tgl->format("d-m-Y");
}
function getDateTime($date)
{
  $tgl = new DateTime($date);
  return $tgl->format("Y-m-d H:i:s");
}
function getTime($date)
{
  $tgl = new DateTime($date);
  return $tgl->format("H:i:s");
}

function getApi($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result, true);
  return $result;
}

function arrBulan()
{
  $bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
  );
  return $bulan;
}
function getBulan($bulan)
{
  switch ($bulan) {
    case "01":
      $bln = 'Januari';
      break;
    case "02":
      $bln = 'Februari';
      break;
    case "03":
      $bln = 'Maret';
      break;
    case "04":
      $bln = 'April';
      break;
    case "05":
      $bln = 'Mei';
      break;
    case "06":
      $bln = 'Juni';
      break;
    case "07":
      $bln = 'Juli';
      break;
    case "08":
      $bln = 'Agustus';
      break;
    case "09":
      $bln = 'September';
      break;
    case "10":
      $bln = 'Oktober';
      break;
    case "11":
      $bln = 'November';
      break;
    case "12":
      $bln = 'Desember';
      break;
  }
  return $bln;
}
function hari($tgl)
{
  $dayList = array(
    'Sun' => 'Ahad',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
  );
  $hari = date('D', strtotime($tgl));
  return $dayList[$hari];
}
function addTgl($date)
{
  $date = new DateTime($date);
  $date = $date->modify('+1 day');
  return $date->format('d-m-Y');
}
function loop_tanggal($begin, $end)
{
  $begin = new DateTime($begin);
  $end = new DateTime($end);
  $end = $end->modify('+1 day');

  $interval = new DateInterval('P1D');
  $daterange = new DatePeriod($begin, $interval, $end);

  return $daterange;
}
function getLastDate($bulan)
{
  $tgl_terakhir = date('m-t', strtotime(date("Y-" . $bulan . "-d")));
  return date('Y-' . $tgl_terakhir);
}
function ddBulan()
{
  foreach (arrBulan() as $key => $val) {
    $isi[$key] = $val;
  }
  return $isi;
}
function getSetting($id, $column = 'value')
{
  $db = \Config\Database::connect();
  $query = $db->query("SELECT $column FROM setting WHERE id = '$id'");
  if ($query->getNumRows() !== 0) {
    return $query->getRow()->{$column};
  } else {
    return false;
  }
}
function statusPosting($s)
{
  $stts = null;
  switch ($s) {
    case '1':
      $stts = '<h5><span class="right badge text-info">Editor</span></h5>';
      break;
    case '2':
      $stts = '<h5><span class="right badge text-info">Approved Editor</span></h5>';
      break;
    case '3':
      $stts = '<h5><span class="right badge text-danger">Posting Ditolak</span></h5>';
      break;
    default:
      $stts = '<h5><span class="right badge text-success">Approved</span></h5>';
      break;
  }
  return $stts;
}
function skpd()
{
  $db = \Config\Database::connect();
  $query = $db->query('SELECT * FROM skpd');
  if ($query->getNumRows() !== 0) {
    foreach ($query->getResult() as $row) {
      $isi[$row->id] = $row->nama;
    }
  } else {
    $isi[''] = "Tidak Ada Data";
  }
  return $isi;
}


function getTableLike(String $table, String $field, String $data)
{
  $db = db_connect();
  return $db->table($table)->like($field, $data)->get();
}

function hariIni($time = "D", $spesificTime = null)
{
  $hari = date($time, $spesificTime);

  switch ($hari) {
    case 'Sun':
      $hariIni = "Minggu";
      break;

    case 'Mon':
      $hariIni = "Senin";
      break;

    case 'Tue':
      $hariIni = "Selasa";
      break;

    case 'Wed':
      $hariIni = "Rabu";
      break;

    case 'Thu':
      $hariIni = "Kamis";
      break;

    case 'Fri':
      $hariIni = "Jum'at";
      break;

    case 'Sat':
      $hariIni = "Sabtu";
      break;

    default:
      $hariIni = "Tidak diketahui";
      break;
  }

  return $hariIni;
}

function bulanIni($time = "M", $spesificTime = null)
{
  $bulan = date($time, $spesificTime);

  switch ($bulan) {
    case 'Jan':
      $bulanIni = "Januari";
      break;

    case 'Feb':
      $bulanIni = "Februari";
      break;

    case 'Mar':
      $bulanIni = "Maret";
      break;

    case 'Apr':
      $bulanIni = "April";
      break;

    case 'mei':
      $bulanIni = "Mei";
      break;

    case 'Jun':
      $bulanIni = "Juni";
      break;

    case 'Jul':
      $bulanIni = "Juli";
      break;

    case 'Aug':
      $bulanIni = "Agustus";
      break;

    case 'Sep':
      $bulanIni = "September";
      break;

    case 'Oct':
      $bulanIni = "Oktober";
      break;

    case 'Nov':
      $bulanIni = "November";
      break;

    case 'Dec':
      $bulanIni = "December";
      break;

    default:
      $bulanIni = "Tidak diketahui";
      break;
  }
  return $bulanIni;
}
function get_client_ip()
{
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

function getImage($id, $like)
{
  $db = db_connect();
  return $db->table('galeri g')->where('id_sumber', $id)->like('sumber', $like);
}

function getHumanize($date)
{
  $time = Time::parse($date)->humanize();
  switch ($time) {
    case str_contains($time, 'second'):
      $value = str_replace('second ago', 'detik yang lalu', $time);
      break;
    case str_contains($time, 'minutes'):
      $value = str_replace('minutes ago', 'menit yang lalu', $time);
      break;
    case str_contains($time, 'hours'):
      $value = str_replace('hours ago', 'jam yang lalu', $time);
      break;
    case str_contains($time, 'days'):
      $value = str_replace('days ago', 'hari yang lalu', $time);
      break;
    case str_contains($time, 'weeks'):
      $value = str_replace('weeks ago', 'minggu yang lalu', $time);
      break;
    case str_contains($time, 'months'):
      $value = str_replace('months ago', 'bulan yang lalu', $time);
      break;
    case str_contains($time, 'years'):
      $value = str_replace('years ago', 'tahun yang lalu', $time);
      break;
    default:
      $value = $time;
      break;
  }

  return $value;
}

function get_visitor_for_today()
{
  $db = db_connect();
  $query = $db->query('SELECT Count(ip_address) as visits FROM visitor_log WHERE CURDATE()=DATE(access_date)')->getRow();
  return $query->visits;
}
function get_visitor_for_last_week()
{
  $db = db_connect();
  // $query = $db->query('SELECT Count(ip_address) as visits FROM visitor_log  WHERE DATE(access_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND DATE(access_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY')->getRow();
  $query = $db->query('SELECT Count(ip_address) as visits FROM visitor_log  WHERE DATE(access_date) >= CURDATE() - 7')->getRow();
  return $query->visits;
}
function get_total_visitor()
{
  $db = db_connect();
  $query = $db->query('SELECT Count(ip_address) as visits FROM visitor_log')->getRow();
  return $query->visits;
}
function get_hit_for_today()
{
  $db = db_connect();
  $query = $db->query('SELECT SUM(no_of_visits) as hits FROM visitors WHERE CURDATE()=DATE(access_date) GROUP BY requested_url')->getRow();
  // return $query->hits;
}
function get_hit_for_last_week()
{
  $db = db_connect();
  // $query = $db->query('SELECT SUM(no_of_visits) as hits FROM visitors  WHERE DATE(access_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND DATE(access_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY')->getRow();
  $query = $db->query('SELECT SUM(no_of_visits) as hits FROM visitors  WHERE DATE(access_date) >= CURDATE() - 7 GROUP BY requested_url')->getRow();
  // return $query->hits;
}
function get_total_hit()
{
  $db = db_connect();
  $query = $db->query('SELECT SUM(no_of_visits) as hits FROM visitors GROUP BY requested_url')->getRow();
  // return $query->hits;
}
function count_pengunjung_by_time($status)
{
  switch ($status) {
    case "tahun":
      $b = "WHERE YEAR(access_date) = " . date('Y');
      break;
    case "bulan":
      $b = "WHERE MONTH(access_date) = " . date('m');
      break;
    case "minggu":
      $b = "WHERE YEARWEEK(access_date)=YEARWEEK(NOW())";
      break;
    case "hari":
      $b = "WHERE CURDATE()=DATE(access_date)";
      break;
    default:
      $b = '';
      break;
  }
  $db = db_connect();
  $q = $db->query("SELECT Count(ip_address) as visits FROM visitor_log $b")->getRow();
  return $q->visits;
}
function count_hits_by_time($status)
{
  switch ($status) {
    case "tahun":
      $b = "WHERE YEAR(access_date) = " . date('Y');
      break;
    case "bulan":
      $b = "WHERE MONTH(access_date) = " . date('m');
      break;
    case "minggu":
      $b = "WHERE YEARWEEK(access_date)=YEARWEEK(NOW())";
      break;
    case "hari":
      $b = "WHERE CURDATE()=DATE(access_date)";
      break;
    default:
      $b = '';
      break;
  }
  $db = db_connect();
  $q = $db->query("SELECT SUM(no_of_visits) as hits FROM page_log $b")->getRow();
  return $q->hits;
}

function getDB($table)
{
  $db = db_connect();
  return $db->table($table)->get()->getResult();
}

function getGroup($id)
{
  $db = db_connect();
  return $db->table('users_groups ug')->join('groups g', 'ug.group_id = g.id')->where('ug.user_id', $id)->get()->getRow();
}

function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format(floatval($angka), 2, ',', '.');
  return $hasil_rupiah;
}

function getNotifikasiOrderan($id, $limit = null)
{
  $db = db_connect();
  $where = [
    't.user_id'   => $id,
    't.status'    => 1,
    'keterangan'  => null,
    'rating'      => null,
  ];
  $get = $db->table('orderan o')->select('o.*, t.id t_id, u.nama_user, o.created_at')->join('tukang t', 't.id = o.tukang_id')->join('users u', 'u.id = o.user_id')->where($where)->limit($limit)->orderBy('o.id', 'desc')->get()->getResult();
  foreach ($get as $row) {
    if ($row->created_at != date('Y-m-d')) {
      continue;
    } else {
      $gets[] = $row;
    }
  }

  return $gets ?? [];
}

function getDiffrenTime($first, $second)
{
  $first  = new DateTime($first);
  $second = new DateTime($second);

  $diff = $first->diff($second);

  return $diff->format('%d');
}

function getOrderer($idtukang)
{
  $db = db_connect();
  return $db->table('orderan')->where('tukang_id', $idtukang)->orderBy('id', 'desc')->get()->getRow();
}

function getTukang($id)
{
  $db = db_connect();
  return $db->table('tukang t')->select('t.*')->join('users u', 'u.id = t.user_id')->where('u.id', $id)->get()->getRow();
}

function getKategori($idTukang, $tarif = false)
{
  $db = db_connect();
  $data = $db->table('kategori_group kg')->join('kategori k', 'k.id = kg.id_kategori')->where('id_tukang', $idTukang)->get()->getResult();
  foreach ($data as $row) {
    if (!isset($row)) continue;
    $result[] = ucwords($row->nama_kategori) . ($tarif == false ? '' : "|$row->tarif|$row->satuan|$row->id");
  }

  if (empty($result)) return 'Kosong';
  return implode(', ', $result);
}

function getBiayaKategori($idtukang, $kategori)
{
  $db = db_connect();
  foreach (explode(',', $kategori) as $ka) {
    $where[] = $ka;
  }
  $data = $db->table('kategori_group')->where('id_tukang', $idtukang)->whereIn('id_kategori', $where)->get()->getResult();
  $biaya = 0;
  foreach ($data as $row) {
    $biaya += $row->tarif;
  }
  return $biaya;
}

function getRating($angka)
{
  switch ($angka) {
    case 1:
      return '20';
    case 2:
      return '40';
    case 3:
      return '60';
    case 4:
      return '80';
    case 5:
      return '100';
  }
}

function getRejected($idtukang)
{
  if (!logged_in()) {
    return false;
  }

  $level = session('userlevel');
  $userid = session('user_id');
  $today = date('Y-m-d');
  if ($level == 'users') {
    $order = db_connect()->table('orderan')
      ->where('user_id', $userid)
      ->where('tukang_id', $idtukang)
      ->where('status', 'ditolak')
      ->where('deleted_at', $today)
      ->get()->getRow();
    if ($order) {
      return $order;
    }
  }

  return false;
}

function getkategoriPrice($idkategori, $idtukang)
{
  $data = db_connect()->table('kategori_group')->where('id_kategori', $idkategori)->where('id_tukang', $idtukang)->get()->getRow();
  return $data ? $data->tarif : '';
}

function getkategoriPilih($kategori, $idtukang)
{
  $kategori = explode(',', $kategori);

  foreach ($kategori as $kat) {
    $where[] = $kat;
  }
  $data = db_connect()->table('kategori_group kt')->join('kategori k', 'k.id = kt.id_kategori')->where('id_tukang', $idtukang)->whereIn('id_kategori', $where)->get()->getResult();
  foreach ($data as $row) {
    $result[] = $row->nama_kategori;
  }
  return implode(', ', $result);
}

function getTolakPesanan($userid)
{
  $data = db_connect()->table('orderan o')
  ->select('o.*, t.nama, t.telp, t.wa')
  ->join('tukang t', 't.id = o.tukang_id')
  ->where('o.user_id', $userid)->where('dibaca', null)->where('o.status', 'ditolak')->orWhere('o.status', 'diterima')->get()->getResult();

  $results['data'] = $data;
  $results['total'] = count($data);
  return json_decode(json_encode($results));
}