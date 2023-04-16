<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = new UserModel();

        $users->insert([
            'email' => 'r7tatsumaki@gmail.com',
            'username' => 'r7tatsumaki',
            'fullname' => 'Rivaldi Fatah',
            'password_hash' => Password::hash('akugakero'),
            'active' => 1
        ]);

        $users->insert([
            'email' => 'antimagemonster@gmail.com',
            'username' => 'antimage',
            'fullname' => 'Maxhill',
            'password_hash' => Password::hash('akugakero'),
            'active' => 1
        ]);
    }
}
