<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ChangePassword extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $dataUser = $this->userModel->getUsers();
        $data = [
            'title' => 'Project Root | Change Password',

        ];
        return view('Profile/c_password', $data);
    }
}
