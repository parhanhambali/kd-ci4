<?php

namespace App\Controllers;

use App\Models\Model_direction;
use App\Models\Model_year;

class year extends BaseController
{
    public function __construct()
    {
        $this->Model_year = new Model_year();
        $this->Model_Direction = new Model_direction();
        
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Tahun',
            'year'  => $this->Model_year->all_data(),
            'isi'       => 'year/v_year'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('year_name' => $this->request->getPost('year_name'));
        $this->Model_year->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
        return redirect()->to(base_url('year'));
    }

    public function edit($direction_id)
    {
        // $data = array(
        //     'year_id'   => $year_id,
        //     'year_name' => $this->request->getPost('year_name'),
        // );

        // $this->Model_year->edit($data);
        // session()->setFlashdata('pesan', 'Data Berhasil di Update');
        // return redirect()->to(base_url('year'));

        $data = array(
            'title'     => 'Edit Arsip',
            'kategori'  => $this->Model_status->all_data(),
            'arsip'     => $this->Model_direction->detail_data($direction_id),
            'isi'       => 'arsip/v_edit'
        );

        return view('layout/v_wrapper', $data);
    }

    public function delete($year_id)
    {
        $data = array(
            'year_id'   => $year_id,
        );

        $this->Model_year->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('year'));
    }
}