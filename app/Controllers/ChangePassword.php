<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Password;

class ChangePassword extends BaseController
{
    protected $userModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function ubahPassword($id)
    {
        $data = [
            'title' => 'Project Root | Edit Password',
            'validation' => \config\Services::validation(),

        ];
        return view('Profile/c_password', $data);
    }

    public function updatePassword($id = null)
    {

        if (!$this->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|strong_password',
            'konfirm_password_baru' => 'required|matches[password_baru]'
        ])) {
            session()->setFlashdata('error', 'Periksa Form Inputan Kembali');
            return redirect()->to('/ChangePassword/' . $id)->withInput();
        }

        // validasi

        $this->userModel->save([
            'id' => $id,
            'password_hash' => Password::hash($this->request->getVar('password_baru')),
        ]);
        session()->setFlashdata('success', 'Berhasil Mengubah Password');
        return redirect()->to('/ChangePassword/' . $id);
    }
}
