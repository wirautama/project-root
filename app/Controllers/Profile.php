<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;
    protected $helpers = ['form'];
    protected $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()

    {
        $dataUser = $this->userModel->getUsers();
        $data = [
            'title' => 'Project Root | Profile',
            'dataUser' => $dataUser,
            'validation' => \config\Services::validation()
        ];
        return view('Profile/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Komik | Bertus',
            'validation' => \config\Services::validation(),
            'user' => $this->userModel->find($id)
        ];
        return view('Profile/editprofile', $data);
    }


    public function update($id = null)
    {
        // cek email
        $emailLama = $this->userModel->getUsers($id);
        if ($emailLama->email == $this->request->getPost('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email]';
        }

        // cek username
        $usernameLama = $this->userModel->getUsers($id);
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
            return redirect()->to('/Profile/edit/' . $id)->withInput();
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

        $this->userModel->save([
            'id' => $id,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'user_image' => $namaPicture
        ]);

        return redirect()->to('/Profile');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $user = $this->userModel->find($id);
        // cek jika file gambarnya default.jpg
        if ($user['user_image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $user['user_image']);
        }

        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/Profile');
    }
}



// // ambil Gambar
// $filePicture = $this->request->getFile('user_image');
// // apakah tidak ada gambar yang diupload
// if ($filePicture->getError() == 4) {
//     $namaPicture = 'default.jpg';
// } else {
//     // generate nama profile random
//     $namaPicture = $filePicture->getRandomName();
//     // pindahkan file ke folder img
//     $filePicture->move('img', $namaPicture);
// }