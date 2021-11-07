<?php

namespace App\Controllers;

use App\Models\Model_user;

class User extends BaseController
{
    public function __construct()
    {
        $this->Model_user = new Model_user();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title'     => 'User',
            'user'      => $this->Model_user->all_data(),
            'isi'       => 'user/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add User',
            'dep'   => $this->Model_dep->all_data(),
            'isi'   => 'user/v_add'
        );

        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label'     => 'Nama User',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

            'email'  => [
                'label'     => 'Email',
                'rules'     => 'required|is_unique[tbl_user.email]',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah ada, Inputkan dengan nama lain'
                ]
            ],

            'password'  => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'level'  => [
                'label'     => 'Level',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'id_dep'  => [
                'label'     => 'Departemen',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'foto'  => [
                'label'     => 'Foto',
                'rules'     => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors'    => [
                    'uploaded'  => '{field} Wajib diisi',
                    'max_size'  => 'Ukuran {field} max 1024',
                    'mime_in'   => 'Format {field} JPG,JPEG,PNG'
                ]
            ],

        ])) {

            $foto = $this->request->getFile('foto');

            $nama_file = $foto->getRandomName();

            $data = array(
                'nama_user'     => $this->request->getPost('nama_user'),
                'email'         => $this->request->getPost('email'),
                'password'      => $this->request->getPost('password'),
                'level'         => $this->request->getPost('level'),
                'id_dep'        => $this->request->getPost('id_dep'),
                'foto'          => $nama_file,
            );

            $foto->move('foto', $nama_file);
            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    public function edit($id_user)
    {
        $data = array(
            'title' => 'Edit User',
            'dep'   => $this->Model_dep->all_data(),
            'user'  => $this->Model_user->detail_data($id_user),
            'isi'   => 'user/v_edit'
        );

        return view('layout/v_wrapper', $data);
    }

    public function update($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label'     => 'Nama User',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi'
                ]
            ],

            'password'  => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'level'  => [
                'label'     => 'Level',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'id_dep'  => [
                'label'     => 'Departemen',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],

            'foto'  => [
                'label'     => 'Foto',
                'rules'     => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors'    => [
                    'max_size'  => 'Ukuran {field} max 1024',
                    'mime_in'   => 'Format {field} JPG,JPEG,PNG'
                ]
            ],

        ])) {
            
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4 ) {    
                $data = array(
                    'id_user'       => $id_user,
                    'nama_user'     => $this->request->getPost('nama_user'),
                    'password'      => $this->request->getPost('password'),
                    'level'         => $this->request->getPost('level'),
                    'id_dep'        => $this->request->getPost('id_dep'),
                );

                $this->Model_user->edit($data);
            }else {

                $user = $this->Model_user->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }

                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user'       => $id_user,
                    'nama_user'     => $this->request->getPost('nama_user'),
                    'password'      => $this->request->getPost('password'),
                    'level'         => $this->request->getPost('level'),
                    'id_dep'        => $this->request->getPost('id_dep'),
                    'foto'          => $nama_file,
                );

                $foto->move('foto', $nama_file);
                $this->Model_user->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil di Update');
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit' . $id_user));
        }
    }

    public function delete($id_user)
    {
        $user = $this->Model_user->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
                
        $data = array(
            'id_user'   => $id_user,
        );

        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('user'));
    }
}