<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $users;
    public function __construct()
    {
        $this->users = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User | AppStarter',
            'users' => $this->users->findAll()
        ];
        return view('User/index', $data);
    }
}
