<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_status extends Model
{
    public function all_data()
    {
        return $this->db->table('status')
                ->orderBy('status_id', 'DESC')
                ->get()
                ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('status')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('status')
                ->where('status_id', $data['status_id'])
                ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('status')
                ->where('status_id', $data['status_id'])
                ->delete($data);
    }
}