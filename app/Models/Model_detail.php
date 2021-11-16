<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_detail extends Model
{
    
    public function getDetail($year_id)
    {
        return $this->db->table('direction')
                ->where(['year_id' => $year_id])
                ->join('status', 'status.status_id = direction.status_id', 'left')
                ->get()
                ->getResultArray()
                ;
    }
}