<?php

namespace App\Controllers;
use App\Models\Model_status;

class Status extends BaseController
{
    public function __construct()
    {
        $this->Model_status = new Model_status();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Status',
            'status'  => $this->Model_status->all_data(),
            'isi'       => 'status/v_status'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('status_name' => $this->request->getPost('status_name'));
        $this->Model_status->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
        return redirect()->to(base_url('status'));
    }

    public function edit($status_id)
    {
        $data = array(
            'status_id'   => $status_id,
            'status_name' => $this->request->getPost('status_name'),
        );

        $this->Model_status->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Update');
        return redirect()->to(base_url('status'));
    }

    public function delete($status_id)
    {
        $data = array(
            'status_id'   => $status_id,
        );

        $this->Model_status->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('status'));
    }
}