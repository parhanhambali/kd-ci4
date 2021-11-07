<?php

namespace App\Models;

use CodeIgniter\Model;


class Model_user extends Model
{
    public function all_data()
    {
        return $this->db->table('user')
                ->orderBy('user_id', 'DESC')
                ->get()
                ->getResultArray();
    }

    public function detail_data($user_id)
    {
        return $this->db->table('user')
                ->where('user_id', $user_id)
                ->get()
                ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('user')
                ->where('user_id', $data['user_id'])
                ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('user')
                ->where('user_id', $data['user_id'])
                ->delete($data);
    }
}