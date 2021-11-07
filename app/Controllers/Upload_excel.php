<?php

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use App\Models\Model_excel;
use App\Controllers\BaseController;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Upload_excel extends BaseController 
{
	public function __construct()
	{
         $this->Model_excel = new Model_excel();
	}

	public function index()
	{
        $data = array(
            'title'     => 'Arsip',
            'upload_excel'     => $this->Model_excel->all_data(),
            'isi'       => 'direction/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

	public function uploaddata()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('upload_kd')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();

			$reader->open('uploads/' . $file['file_name']);
			 
			foreach($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach($sheet->getRowIterator() as $row) {
					if ($numRow > 2) {
						$databarang = array(
							'no_naskah'			=> $row->getCellAtIndex(1),
							'perihal'			=> $row->getCellAtIndex(2),
							'tanggal_penetapan'	=> $row->getCellAtIndex(3),
							'status'			=> $row->getCellAtIndex(4),
							'keterangan'		=> $row->getCellAtIndex(5),
							'perubahan'			=> $row->getCellAtIndex(6),
						);
						$this->Model_excel->import_data($databarang);
					}
					$numRow++;
				}
			}

		}else{
			echo "Error :" . $this->upload->display_errors();
		}
		redirect('data_barang/index');
	}
}