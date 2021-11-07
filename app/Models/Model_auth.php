<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('user')->where([
            'username'     => $username,
            'password'  => $password,
        ])->get()->getRowArray();
    }

    public function getDataId($username, $password)
    {
        return $this->db->table('user')->where([
            'username'     => $username,
            'passwiord'  => $password,
        ])->get()->getResult();
    }
}