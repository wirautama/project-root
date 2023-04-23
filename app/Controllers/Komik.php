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
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik | Bertus',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Jika Komik tidak ditemukan
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan.');
        }
        return view('Komik/detail', $data);
    }
}
