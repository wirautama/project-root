<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class Permission extends BaseController
{
    protected $userModel;
    protected $groups;
    protected $permissions;
    protected $helpers = ['form'];
    protected $db;
    public function __constuct()
    {
        $this->db = \Config\Database::connect();
        $this->userModel = new UserModel();
        $this->groups = new GroupModel();
        $this->permissions = new PermissionModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Project Root | Permissions',


        ];
        return view('Permission/index', $data);
    }
}
