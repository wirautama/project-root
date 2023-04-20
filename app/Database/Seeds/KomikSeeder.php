<?php

namespace App\Database\Seeds;

use App\Models\KomikModel;
use CodeIgniter\Database\Seeder;

class KomikSeeder extends Seeder
{
    public function run()
    {
        $komik = new KomikModel();
        $komik->insert([
            'judul' => 'Jujutsu Kaisen',
            'slug' => 'jujutsu-kaisen',
            'penulis' => 'Albert Einstein',
            'penerbit' => 'Shueisha',
            'sampul' => 'default.png',
            'harga' => 30000,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $komik->insert([
            'judul' => 'Attack On Titan',
            'slug' => 'attack-on-titan',
            'penulis' => 'Hajime Isayama',
            'penerbit' => 'Kodansha',
            'sampul' => 'default.png',
            'harga' => 130000,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $komik->insert([
            'judul' => 'One Piece',
            'slug' => 'one-piece',
            'penulis' => 'Eiichiro Oda',
            'penerbit' => 'Shueisha',
            'sampul' => 'default.png',
            'harga' => 190000,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
