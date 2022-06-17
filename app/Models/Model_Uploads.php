<?php 

namespace App\Models;
use CodeIgniter\Model;

class Model_Uploads extends Model
{
    protected $table = 'tbl_multiple_files';
    protected $allowedFields = ['img_satu', 'img_dua', 'img_tiga'];

    public function all_data()
    {
        return $this->db->table('tbl_multiple_files')
            ->get()
            ->getResultArray();
    }

    public function detail_data()
    {
        return $this->db->table('tbl_multiple_files')
                ->get()
                ->getResultArray();
    }
} 