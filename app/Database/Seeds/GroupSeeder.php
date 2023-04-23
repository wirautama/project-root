<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $groups = new GroupModel();
        $groups->insert([
            'name' => 'Admin',
            'description' => 'Manage All Menu'
        ]);

        $groups->insert([
            'name' => 'Karyawan',
            'description' => 'Restrict From All Menu'
        ]);

        $groups->insert([
            'name' => 'User',
            'description' => 'Manage Product'
        ]);

        $permissions = new PermissionModel();
        $admin = $permissions->findAll();
        foreach ($admin as $permission) {
            $groups->addPermissionToGroup($permission->id, 1);
        }
        $karyawan = $permissions->where('name', 'data-komik')->findAll();
        foreach ($karyawan as $permission) {
            $groups->addPermissionToGroup($permission->id, 2);
        }
        $user = $permissions->where('name', 'data-customer')->findAll();
        foreach ($user as $permission) {
            $groups->addPermissionToGroup($permission->id, 3);
        }
    }
}
