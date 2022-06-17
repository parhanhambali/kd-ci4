<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_detail extends Model
{
    
    public function getDetail($year_id)
    {
        return $this->db->table('direction')
                // ->join('year', 'year.year_id = direction.year_id', 'left')
                ->where(['year_id' => $year_id])
                ->get()
                ->getResultArray();
    }

        public function edit_detail($data)
    {
        $this->db->table('direction')
                ->where('direction_id', $data['direction_id'])
                ->update($data);
    }
}