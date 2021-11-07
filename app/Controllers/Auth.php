<?php

namespace App\Controllers;

use App\Models\Model_auth;


class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login'
        );
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'     => 'username',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

            'password'  => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Model_auth->login($username, $password);

            if ($cek) {
                session()->set('log', true);
                session()->set('user_id', $cek['user_id']);
                session()->set('email', $cek['email']);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['password']);

                return redirect()->to(base_url('direction'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal !, Username dan Password Salah');
            return redirect()->to(base_url('auth/index'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        
        session()->setFlashdata('pesan', 'Anda Telah Logout');
        return redirect()->to(base_url('auth'));
    }
}