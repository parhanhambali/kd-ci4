<?php 

namespace App\Models;
use CodeIgniter\Model;

class Model_pdf extends Model
{
    public function __construct()
    {
        $this->db = db_connect();

    }

    public function tambah($data)
    {
        return $this->db->table('pdf')->insert($data);
    }

     public function detail_data($direction_id)
    {
        return $this->db->table('pdf')
                ->where('direction_id', $direction_id)
                ->get()
                ->getResultArray();
    }

        public function delete_data($data)
    {
        $this->db->table('pdf')
                ->where('pdf_id', $data['pdf_id'])
                ->delete($data);
    }
} 