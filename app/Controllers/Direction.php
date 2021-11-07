<?php

namespace App\Controllers;

use App\Models\Model_direction;
use App\Models\Model_status;
use App\Models\Model_year;

class Direction extends BaseController
{
    public function __construct()
    {
        $this->Model_direction = new Model_direction();
        $this->Model_status = new Model_status();
        $this->Model_year = new Model_year();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Arsip',
            'direction'  => $this->Model_direction->all_data(),
            'isi'       => 'direction/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function a()
    {
        $data = array(
            'title'     => 'Arsip',
            'direction'  => $this->Model_direction->all_data(),
            'year'  => $this->Model_year->all_data(),
            'isi'       => 'direction/v_index'
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
                'status_id'         => $excel['4'],
                'description'            => $excel['5'],
                'replacement'        => $excel['6'],
            );

            $this->Model_direction->add($data);
        }
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
        return redirect()->to(base_url('direction'));
    }

    public function add()
    {
        $data = array(
            'title'     => 'Tambah Arsip',
            'status'  => $this->Model_status->all_data(),
            'year'      => $this->Model_year->all_data(),
            'isi'       => 'direction/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'script_number' => [
                'label'     => 'Nomor Naskah',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

            'regarding'  => [
                'label'     => 'Perihal',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Belum dipilih',
                ]
            ],

            'determination_date'  => [
                'label'     => 'Tanggal Penetapan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'description'  => [
                'label'     => 'Deskripsi',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'replacement'  => [
                'label'     => 'Perubahan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'file_pdf_valid'  => [
                'label'     => 'Dokumen Valid',
                'rules'     => 'uploaded[file_pdf_valid]|max_size[file_pdf_valid,1000000]|ext_in[file_pdf_valid,pdf]',
                'errors'    => [
                    'uploaded'  => '{field} Wajib diisi',
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],

            'file_pdf_invalid'  => [
                'label'     => 'Dokumen Invalid',
                'rules'     => 'uploaded[file_pdf_invalid]|max_size[file_pdf_invalid,1000000]|ext_in[file_pdf_invalid,pdf]',
                'errors'    => [
                    'uploaded'  => '{field} Wajib diisi',
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],

        ])) {

            $file_pdf_valid = $this->request->getFile('file_pdf_valid');
            $file_pdf_invalid = $this->request->getFile('file_pdf_invalid');

            $filename_valid = $file_pdf_valid->getRandomName();
            $filename_invalid = $file_pdf_valid->getRandomName();


            $data = array(
                'status_id'   => $this->request->getPost('status_id'),
                'year_id'   => $this->request->getPost('year_id'),
                'script_number'   => $this->request->getPost('script_number'),
                'regarding'      => $this->request->getPost('regarding'),
                'determination_date'    => $this->request->getPost('determination_date'),
                'description'     => $this->request->getPost('description'),
                'replacement'     => $this->request->getPost('replacement'),
                'file_pdf_valid'          => $filename_valid,
                'file_pdf_invalid'          => $filename_invalid,

            );

            $file_pdf_valid->move('file_pdf_valid', $filename_valid);
            $file_pdf_invalid->move('file_pdf_invalid', $filename_invalid);
            
            $this->Model_direction->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
            return redirect()->to(base_url('direction'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('direction/add'));
        }
    }

    public function edit($direction_id)
    {
        $data = array(
            'title'     => 'Edit Arsip',
            'direction' => $this->Model_direction->detail_data($direction_id),
            'status'    => $this->Model_status->all_data(),
            'year'      => $this->Model_year->all_data(),
            'isi'       => 'direction/v_edit'
        );

        return view('layout/v_wrapper', $data);
    }

    public function update($direction_id)
    {
        if ($this->validate([
            'script_number' => [
                'label'     => 'Nomor Naskah',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

            'regarding'  => [
                'label'     => 'Perihal',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Belum dipilih',
                ]
            ],

            'determination_date'  => [
                'label'     => 'Tanggal Penetapan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'description'  => [
                'label'     => 'Deskripsi',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'replacement'  => [
                'label'     => 'Perubahan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'file_pdf_valid'  => [
                'label'     => 'Dokumen Valid',
                'rules'     => 'max_size[file_pdf_valid,1000000]|ext_in[file_pdf_valid,pdf]',
                'errors'    => [
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],

            'file_pdf_invalid'  => [
                'label'     => 'Dokumen Invalid',
                'rules'     => 'max_size[file_pdf_invalid,1000000]|ext_in[file_pdf_invalid,pdf]',
                'errors'    => [
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],

        ])) {
            $file_pdf_valid = $this->request->getFile('file_pdf_valid');
            $file_pdf_invalid = $this->request->getFile('file_pdf_invalid');

            $filename_valid = $file_pdf_valid->getRandomName();
            $filename_invalid = $file_pdf_valid->getRandomName();


            if ($file_pdf_invalid || $file_pdf_valid->getError() == 4) {

                $data = array(
                    'direction_id'      => $direction_id,
                    'status_id'   => $this->request->getPost('status_id'),
                    'year_id'   => $this->request->getPost('year_id'),
                    'script_number'      => $this->request->getPost('script_number'),
                    'regarding'    => $this->request->getPost('regarding'),
                    'determination_date'     => $this->request->getPost('determination_date'),
                    'description'     => $this->request->getPost('description'),
                    'replacement'     => $this->request->getPost('replacement'),
                );
                
                $this->Model_direction->edit($data);
            } else {
                $direction = $this->Model_direction->detail_data($direction_id);
                if ($direction['file_pdf_valid'] || ['file_pdf_invalid'] != "") {
                    unlink('file_pdf_valid/' . $direction['file_pdf_valid']) || ('file_pdf_invalid/' . $direction['file_pdf_invalid']);
                }

            $filename_valid = $file_pdf_valid->getRandomName();
            $filename_invalid = $file_pdf_valid->getRandomName();

                $data = array(
                    'direction_id'      => $direction_id,
                    'status_id'   => $this->request->getPost('status_id'),
                    'year_id'   => $this->request->getPost('year_id'),
                    'script_number'    => $this->request->getPost('script_number'),
                    'regarding'     => $this->request->getPost('regarding'),
                    'determination_date'   => $this->request->getPost('determination_date'),
                    'description'   => $this->request->getPost('description'),
                    'file_pdf_valid'          => $filename_valid,
                    'file_pdf_invalid'          => $filename_invalid,
                );
            
            $file_pdf_valid->move('file_pdf_valid', $filename_valid);
            $file_pdf_invalid->move('file_pdf_invalid', $filename_invalid);
            
            $this->Model_direction->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil di Update');
            return redirect()->to(base_url('direction'));

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('direction/edit/' . $direction_id));
        }
    }

    public function delete($direction_id)
    {
        $direction = $this->Model_direction->detail_data($direction_id);
                if ($direction['file_pdf_valid'] || ['file_pdf_invalid'] != "") {
                    unlink('file_pdf_valid/' . $direction['file_pdf_valid']) && ('file_pdf_invalid' . $direction['file_pdf_invalid']);               
                }
                
        $data = array(
            'direction_id'   => $direction_id,
        );

        $this->Model_direction->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('direction'));
    }

    public function viewpdf($direction_id)
    {
        $data = array(
            'title'     => 'View Arsip',
            'direction'     => $this->Model_direction->detail_data($direction_id),
            'isi'       => 'direction/v_viewpdf'
        );
        return view('layout/v_wrapper', $data);
    }
}