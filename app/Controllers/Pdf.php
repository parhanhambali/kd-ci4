<?php

namespace App\Controllers;

use App\Models\Model_pdf;
use CodeIgniter\HTTP\Request;

class Pdf extends BaseController
{
    public function __construct()
    {
        $this->Model_pdf = new Model_pdf();
        helper('form');
    }

    public function tambah()
    {
        if ($this->validate([
            
            'file_pdf'  => [
                'label'     => 'File Arsip',
                'rules'     => 'uploaded[file_pdf]|max_size[file_pdf,10000]|ext_in[file_pdf,pdf]',
                'errors'    => [
                    'uploaded'  => '{field} Wajib diisi',
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],

        ])) 

        {
        $file_pdf = $this->request->getFile('file_pdf');
        $nama_file = $file_pdf->getName();

        $file_pdf->move('oke_file', $nama_file);

        $data = [
            'direction_id'  => $this->request->getVar('direction_id'),
            'file_pdf' => $nama_file,
        ];

        $this->Model_pdf->tambah($data);
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
    public function delete($pdf_id)
    {           
        $data = array(
            'pdf_id'   => $pdf_id,
        );

        $this->Model_pdf->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('direction'));
    }
    
}