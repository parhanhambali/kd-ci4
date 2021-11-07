<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_excel extends Model
{
	public function all_data($limit, $start)
	{
        return $this->db->table('direction', $limit, $start)->get()->getResultArray();
	}

	public function import_data($databarang)
	{
		$jumlah = count($databarang);
		if ($jumlah > 0)
		{
			$this->db->table('direction', $databarang)->replace()->getResultArray();
		}
	}

	public function getDataBarang()
	{
        return $this->db->table('direction')->get()->getResultArray();
	}
}