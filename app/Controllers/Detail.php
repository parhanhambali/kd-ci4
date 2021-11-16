<?php

namespace App\Controllers;

use App\Models\Model_detail;
use App\Models\Model_status;
use App\Models\Model_year;

class Detail extends BaseController
{
    public function __construct()
    {
        $this->Model_detail = new Model_detail();
        $this->Model_status = new Model_status();
        $this->Model_year = new Model_year();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Arsip',
            'direction'  => $this->Model_detail->all_data(),
            'isi'       => 'tahun/index'
        );
        return view('layout/v_wrapper', $data);
    }

    
}