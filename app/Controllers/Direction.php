<?php

namespace App\Controllers;

use App\Models\Model_direction;
use App\Models\Model_status;
use App\Models\Model_year;
use App\Models\Model_pdf;

class Direction extends BaseController
{
    public function __construct()
    {
        $this->Model_direction = new Model_direction();
        $this->Model_status = new Model_status();
        $this->Model_year = new Model_year();
        $this->Model_pdf = new Model_pdf();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Arsip',
            'direction'  => $this->Model_direction->all_data(),
            'status'  => $this->Model_status->all_data(),
            'isi'       => 'direction/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title'     => 'Tambah Arsip',
            'year'      => $this->Model_year->all_data(),
            'status'  => $this->Model_status->all_data(),
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

        ])) {

            $file_pdf_valid = $this->request->getFile('file_pdf_valid');

            $filename_valid = $file_pdf_valid->getName();

            $data = array(
                'year_id'   => $this->request->getPost('year_id'),
                'script_number'   => $this->request->getPost('script_number'),
                'regarding'      => $this->request->getPost('regarding'),
                'determination_date'    => $this->request->getPost('determination_date'),
                'status_name'    => $this->request->getPost('status_name'),
                'description'     => $this->request->getPost('description'),
                'replacement'     => $this->request->getPost('replacement'),
                'pdf_id'          => $filename_valid,
            );

            $file_pdf_valid->move('pdf_id', $filename_valid);
            
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
            'title'     => 'Edit Surat Keputusan Direksi',
            'direction' => $this->Model_direction->detail_data($direction_id),
            'year'      => $this->Model_year->all_data(),
            'status'  => $this->Model_status->all_data(),
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

        ])) {
                $data = array(
                    'direction_id'      => $direction_id,
                    'year_id'   => $this->request->getPost('year_id'),
                    'script_number'      => $this->request->getPost('script_number'),
                    'regarding'    => $this->request->getPost('regarding'),
                    'determination_date'     => $this->request->getPost('determination_date'),
                    'status_name'     => $this->request->getPost('status_name'),
                    'description'     => $this->request->getPost('description'),
                    'replacement'     => $this->request->getPost('replacement'),
                );
                
                $this->Model_direction->edit($data);
            }
                $data = array(
                    'direction_id'      => $direction_id,
                    'year_id'   => $this->request->getPost('year_id'),
                    'script_number'    => $this->request->getPost('script_number'),
                    'regarding'     => $this->request->getPost('regarding'),
                    'determination_date'   => $this->request->getPost('determination_date'),
                    'status_name'   => $this->request->getPost('status_name'),
                    'description'   => $this->request->getPost('description'),
                    'replacement'     => $this->request->getPost('replacement'),
                );
            $this->Model_direction->edit($data);
        
            session()->setFlashdata('pesan', 'Data Berhasil di Update');
            return redirect()->to(base_url('direction'));
    }

    public function delete($direction_id)
    {                
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
            'title'     => 'View Arsip ',
            'pdf'     => $this->Model_pdf->detail_data($direction_id),
            'direction'     => $this->Model_direction->detail_data($direction_id),
            'isi'       => 'direction/v_viewpdf'
        );
       return view('layout/v_wrapper', $data);
    }
}