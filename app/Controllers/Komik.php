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
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Komik | Bertus',
            'validation' => \config\Services::validation()
        ];
        return view('Komik/create', $data);
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
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);
        // cek jika file gambarnya default.png
        if ($komik['sampul'] != 'default.png') {
            // Hapus Gambar
            unlink('img/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/Komik');
    }
}
