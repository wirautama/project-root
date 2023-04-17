<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $users;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->users = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Project Root | List User',
            'users' => $this->users->findAll()
        ];
        return view('User/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Project Root | Edit User',
            'validation' => \config\Services::validation(),
            'users' => $this->users->find($id)
        ];
        return view('User/edit', $data);
    }

    public function update($id = null)
    {
        // cek email
        $emailLama = $this->users->getUsers($id);
        if ($emailLama->email == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email]';
        }

        // cek username
        $usernameLama = $this->users->getUsers($id);
        if ($usernameLama->username == $this->request->getPost('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }

        if (!$this->validate([
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} harus valid',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'alpha_numeric_space' => '{field} masukkan kombinasi dari angka dan huruf saja',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maximal 30 karakter',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} fullname harus diisi',
                ]
            ],
            'user_image' => [
                'rules' => 'max_size[user_image,1045]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'Periksa Form Inputan Kembali');
            return redirect()->to('/User/edit/' . $id)->withInput();
        }
        // ambil Gambar
        $filePicture = $this->request->getFile('user_image');
        // apakah tidak ada gambar yang diupload
        if ($filePicture->getError() == 4) {
            $namaPicture = $this->request->getPost('pictureLama');
        } else {
            // generate nama profile random
            $namaPicture = $filePicture->getRandomName();
            // pindahkan file ke folder img
            $filePicture->move('img', $namaPicture);
            // hapus file lama
            unlink('img/' . $this->request->getPost('pictureLama'));
        }

        $this->users->save([
            'id' => $id,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'user_image' => $namaPicture
        ]);
        session()->setFlashdata('success', 'Berhasil Mengubah Profil');
        return redirect()->to('/User');
    }
}
