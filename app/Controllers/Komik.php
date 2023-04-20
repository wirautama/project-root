<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Komik | Bertus',
            'komik' => $this->komikModel->getKomik()
        ];


        return view('Komik/index', $data);
    }
}
