<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_year extends Model
{
    public function all_data()
    {
        return $this->db->table('year')
                ->orderBy('year_id', 'DESC')
                ->get()
                ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('year')->insert($data);
    }

    public function detail_data($direction_id)
    {
        return $this->db->table('direction')
                ->join('status', 'status.status_id = direction.status_id', 'left')
                ->join('year', 'year.year_id = direction.year_id', 'left')
                ->where('direction_id', $direction_id)
                ->get()
                ->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('year')
                ->where('year_id', $data['year_id'])
                ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('year')
                ->where('year_id', $data['year_id'])
                ->delete($data);
    }
}