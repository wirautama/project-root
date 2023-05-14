<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;


class Komik extends BaseController
{
    protected $komikModel;
    protected $helpers = ['form'];
    protected $format = 'json';
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
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi'
                ]
            ],
            'rilis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi'
                ]
            ],

            'sampul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1045]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'numeric' => '{field} bukan angka valid'
                ]
            ]


        ])) {
            // $validation = \config\Services::validation();
            session()->setFlashdata('warning', 'Periksa Kembali Data Anda');
            return redirect()->to('/Komik/create')->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }




        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'rilis' => $this->request->getVar('rilis'),
            'sampul' => $namaSampul,
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('success', 'Data Berhasil ditambahkan');
        return redirect()->to('/Komik');
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
        session()->setFlashdata('success', 'Data Berhasil dihapus');
        return redirect()->to('/Komik');
    }
}
