<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Project Root'
        ];
        return view('Dashboard/index', $data);
    }
}
