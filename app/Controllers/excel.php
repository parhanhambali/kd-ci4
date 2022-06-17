<?php

namespace App\Controllers;

use App\Models\Model_direction;
use App\Models\Model_year;

class Excel extends BaseController
{
    public function __construct()
    {
        $this->Model_direction = new Model_direction();
        $this->Model_year = new Model_year();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Arsip',
            'isi'       => 'upload/upload_excel'
        );
        return view('layout/v_wrapper', $data);
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');

        $ext = $file->getClientExtension();

        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $x => $excel) {
            if ($x <= 1) {
                continue;
            }

            $script_number = $this->Model_direction->cek_data($excel['1']);
            if ($excel['1'] == $script_number['script_number']) {
                continue;
            }

            $data = array(
                'script_number'            => $excel['1'],
                'regarding'           => $excel['2'],
                'determination_date' => $excel['3'],
                'status_name'         => $excel['4'],
                'description'            => $excel['5'],
                'replacement'        => $excel['6'],
            );

            $this->Model_direction->add($data);
        }
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
        return redirect()->to(base_url('direction'));
    }
}