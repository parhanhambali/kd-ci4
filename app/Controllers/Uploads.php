<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Model_Uploads;

class Uploads extends BaseController
{
    public function __construct()
    {
        $this->Model_Uploads = new Model_Uploads();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Multiple Upload',
            'isi'       => 'multiple_upload/v_multiple',
            'error'=> $this->validation
        ];

        return view('layout/v_wrapper', $data);
    }

    public function upload_file()
    {
        $rule = [
                'script_number' => [
                'label'     => 'Nomor Naskah',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],
            
            'images' => [
                'label'     => 'Dokumen Valid',
                'rules'     => 'uploaded[images]|max_size[images,1000000]|ext_in[images,pdf]',
                'errors'    => [
                    'uploaded'  => '{field} Wajib diisi',
                    'max_size'  => 'Ukuran {field} max 1000000',
                    'ext_in'   => 'Format {field} Pdf'
                ]
            ],
        ];

        if(!$this->validate($rule)) {
            return redirect()->to('/uploads')->withInput();
        }

        $images = $this->request->getFileMultiple('images');
        $jumlahFile = count($images);

        if ($jumlahFile > 3) {
            session()->setFlashdata('msg', '<span class="text-danger">Maksimal 3 File</span>');
            return redirect()->to('/uploads');
        } 

        foreach ($images as $i => $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $files[$i] = $img->getName();
                $img->move('multiple_file', $files[$i]);
            }
        }

        $img_dua = (array_key_exists(1, $files) ? $files[1] : null);
        $img_tiga = (array_key_exists(2, $files) ? $files[2] : null);
        
        $model = new Model_Uploads();
        $model->save([
            'img_satu'  => $files[0],
            'img_dua'  => $img_dua,
            'img_tiga'  => $img_tiga,
        ]);

        return redirect()->to('/uploads/berhasil');
    }

    public function berhasil()
    {
        $data = [
            'title' => 'Multiple Upload',
            'images' => $this->Model_Uploads->detail_data(),
            'isi'       => 'multiple_upload/v_cobaviewpdf',
            'error'=> $this->validation,
            
        ];
        
        return view('layout/v_wrapper', $data);
    }
}