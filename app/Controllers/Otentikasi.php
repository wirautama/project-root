<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Otentikasi extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $validation = \Config\Services::validation();

        $aturan = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Silahkan Masukkan Email',
                    'valid_email' => 'Silahkan Masukkan Email yang Valid'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukkan Password'
                ]
            ]
        ];
        $validation->setRules($aturan);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->getEmail($email);
        $validationPassword = password_verify($data->password_hash, $password);
        if ($validationPassword == true) {
            return $this->fail('Password Tidak Sesuai');
        }
        helper('jwt');
        $response = [
            'message' => 'Otentikasi Berhasil Dilakukan',
            'data' => $data,
            'access_token' => createJWT($email)
        ];
        return $this->respond($response);
    }
}
