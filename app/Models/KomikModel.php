<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class KomikModel extends Model
{
    protected $table = 'komik';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'rilis', 'sampul', 'harga'];
    protected $dateFormat           = 'datetime';
    protected $validationRules = [
        'judul' => 'required|is_unique[komik.judul]',
        'slug' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'rilis' => 'required',
        'sampul' => 'required',
        'harga' => 'required|numeric'

    ];
    protected $validationMessage = [
        'judul' => [
            'required' => 'Silahkan Masukkan Judul',
            'is_unique' => 'Judul Sudah Terdaftar',
        ],
        'slug' => [
            'required' => 'Silahkan Masukkan Slug',
        ],
        'penulis' => [
            'required' => 'Silahkan Masukkan Penulis',
        ],
        'penerbit' => [
            'required' => 'Silahkan Masukkan Penerbit',
        ],
        'rilis' => [
            'required' => 'Silahkan Masukkan Rilis',
        ],
        'sampul' => [
            'required' => 'Silahkan Masukkan Gambar',
            'max_size' => 'Ukuran gambar terlalu besar',
            'is_image' => 'File yang anda pilih bukan gambar',
            'mime_in' => 'File yang anda pilih bukan gambar',
        ],
        'harga' => [
            'required' => 'Silahkan Masukkan Harga',
            'numeric' => 'Silahkan Masukkan Angka yang Valid'

        ],

    ];

    public function getKomik($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
