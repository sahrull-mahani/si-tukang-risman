<?php

namespace App\Controllers;

use App\Models\StatistikModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Statistik extends BaseController
{
    protected $statistikm, $db;
    function __construct()
    {
        $this->statistikm = new StatistikModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $this->data = array('title' => 'Statistik | Admin', 'breadcome' => 'Statistik', 'url' => 'statistik/', 'm_statistik' => 'active', 'session' => $this->session, 'validation' => \Config\Services::validation(), 'stanting' => $this->statistikm->findAll(), 'tahunFilter' => $this->statistikm->groupBy('tahun')->findAll(), 'myChart'=>true);

        return view('App\Views\statistik\statistik_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->statistikm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['nomor'] = $no++;
            $row['id'] = $rows->id;
            $row['pria'] = "$rows->pria orang";
            $row['wanita'] = "$rows->wanita orang";
            $row['jumlah'] = "$rows->total orang";
            $row['tahun'] = $rows->tahun;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->statistikm->total(),
            "totalNotFiltered" => $this->statistikm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\statistik\form_input', $data);
        }
        $status['html']         = view('App\Views\statistik\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Statistik';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->potensim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\potensi\form_input', $data);
        }
        $status['html']         = view('App\Views\potensi\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Potensi';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'delete':
                $id = $this->request->getPost('id');
                foreach ($id as $val) {
                    $get = $this->statistikm->find($val);
                    $this->statistikm->where('YEAR(updated_at)', date('Y', strtotime($get->updated_at)))->delete();
                }
                $status = [
                    'type' => 'success',
                    'text' => 'Data telah dihapus'
                ];
                echo json_encode($status);
                break;
        }
    }

    public function api()
    {
        $year = $this->request->getPost('year');
        $agama = $this->statistikm->select('statistik')->selectCount('statistik', 'total')->where('bidang', 'agama')->where('tahun', $year)->groupBy('statistik')->findAll();
        $pekerjaan = $this->statistikm->select('statistik')->selectCount('statistik', 'total')->where('bidang', 'pekerjaan')->where('tahun', $year)->groupBy('statistik')->findAll();
        $pendidikan = $this->statistikm->select('statistik')->selectCount('statistik', 'total')->where('bidang', 'pendidikan')->where('tahun', $year)->groupBy('statistik')->findAll();
        $perkawinan = $this->statistikm->select('statistik')->selectCount('statistik', 'total')->where('bidang', 'perkawinan')->where('tahun', $year)->groupBy('statistik')->findAll();
        $data = [
            'statistikAgama' => $agama,
            'statistikPekerjaan' => $pekerjaan,
            'statistikPendidikan' => $pendidikan,
            'statistikPerkawinan' => $perkawinan,
            'year'=>$year
        ];
        return json_encode($data);
    }

    public function templateXL($type)
    {
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->setCellValue('A1', 'MASUKAN TAHUN ');
        $spreadsheet->getActiveSheet()->mergeCells('A1:C1'); // merge

        switch ($type) {
            case 1:
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A2', 'AGAMA')
                    ->setCellValue('B2', 'JENIS KELAMIN')
                    ->setCellValue('C2', 'USIA');
                $namFile = 'Agama';
                $color = '28A745';
                $fontcolor = 'FFFFFF';
                break;
            case 2:
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A2', 'PEKERJAAN')
                    ->setCellValue('B2', 'JENIS KELAMIN')
                    ->setCellValue('C2', 'USIA');
                $namFile = 'Pekerjaan';
                $color = '17A2B8';
                $fontcolor = 'F8F9FA';
                break;
            case 3:
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A2', 'PENDIDIKAN')
                    ->setCellValue('B2', 'JENIS KELAMIN')
                    ->setCellValue('C2', 'USIA');
                $namFile = 'Pendidikan';
                $color = '28A745';
                $fontcolor = 'FFFFFF';
                break;
            case 4:
                $spreadsheet->getActiveSheet()
                    ->setCellValue('A2', 'PERKAWINAN')
                    ->setCellValue('B2', 'JENIS KELAMIN')
                    ->setCellValue('C2', 'USIA');
                $namFile = 'Perkawinan';
                $color = '17A2B8';
                $fontcolor = 'F8F9FA';
                break;
        }

        //freeze pane
        $spreadsheet->getActiveSheet()->freezePane('A3');

        // set Zoom Scale
        $spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(140);

        // alignment
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // font
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14)->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFont()->setSize(12)->setBold(true);
        
        // font color
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFont()->getColor()->setRGB($fontcolor);

        // fill
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($color);

        // LEBAR KOLOM
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setWidth(20);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setWidth(25);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setWidth(10);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Template Import Excel Statistik ' . $namFile . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function import()
    {
        $fileUpload = $this->request->getFile('importexcel');

        $validation = [
            'importexcel' => [
                'rules' => 'uploaded[importexcel]|max_size[importexcel,2048]|ext_in[importexcel,csv,xls,xlsx]',
                'errors' => [
                    'uploaded'  => "Masukan terlebih dahulu file Excel",
                    'max_size'  => "Maksimal file excel 2MB",
                    'ext_in'    => "Extensi yang boleh csv,xls,xlsx"
                ]
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->to('statistik')->withInput();
        }

        $ext = pathinfo($fileUpload, PATHINFO_EXTENSION);
        switch ($ext) {
            case "csv":
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                break;
            case "xls":
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                break;
            default:
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                break;
        }

        $spreadsheet = $render->load($fileUpload->getPathname());

        $sheetdata = $spreadsheet->getActiveSheet()->toArray();
        $dataSave = [];
        foreach ($sheetdata as $data => $row) {
            if ($data == 0) $tahun = (int)filter_var($row[0], FILTER_SANITIZE_NUMBER_INT); // get tahun di baris pertama
            if ($data == 1) $bidang = $row[0]; // get bidang di baris kedua
            if ($data <= 1) continue;
            if (count($this->statistikm->where('tahun', $tahun)->find()) > 0) break; //cek tahun yang sama {jangan upload}
            
            array_push($dataSave, [
                'bidang'    => $bidang,
                'statistik' => $row[0],
                'jk'    => $row[1] == 'P' ? 0 : 1,
                'usia'    => $row[2],
                'tahun' => $tahun
            ]);
        }
        if ($tahun == 0) {
            return redirect()->to('statistik')->with('error', "Tahun Belum Di Ubah!!");
        }
        
        $total = count($dataSave);
        if ($total == 0) {
            return redirect()->to('statistik')->with('error', "Periksa kembali tahun yang anda upload");
        }
        if ($this->statistikm->insertBatch($dataSave)) {
            return redirect()->to('statistik')->with('success', "Total upload $total");
        } else {
            return redirect()->to('statistik')->with('errors', $this->statistikm->errors());
        }
    }
}

/* End of file Statistik.php */
/* Location: ./app/controllers/Statistik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-08 04:07:43 */
/* http://harviacode.com */