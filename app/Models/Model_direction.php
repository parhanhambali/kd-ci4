<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_direction extends Model
{
    protected $table = 'direction';
    protected $allowedFields = ['direction_id','status','script_number','year_id','regarding','determination_date','description','replacement', 'files', 'file_pdf_invalid', 'file_pdf_invalid_2'];
    
    public function all_data()
    {
        return $this->db->table('direction')
                ->join('year', 'year.year_id = direction.year_id', 'left') 
                ->get()
                ->getResultArray();
    }

    public function detail_data($direction_id)
    {
        return $this->db->table('direction')
                ->join('year', 'year.year_id = direction.year_id', 'left')
                ->where('direction_id', $direction_id)
                ->get()
                ->getRowArray();
    }

    public function cek_data($script_number)
    {
        return $this->db->table('direction')
            ->where('script_number', $script_number)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('direction')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('direction')
                ->where('direction_id', $data['direction_id'])
                ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('direction')
                ->where('direction_id', $data['direction_id'])
                ->delete($data);
    }
}