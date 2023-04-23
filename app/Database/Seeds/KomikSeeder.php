<?php

namespace App\Database\Seeds;

use App\Models\KomikModel;
use CodeIgniter\Database\Seeder;
use Datetime;

class KomikSeeder extends Seeder
{
    public function run()
    {

        $komik = new KomikModel();
        $komik->insert([
            'judul' => 'Jujutsu Kaisen',
            'slug' => 'jujutsu-kaisen',
            'penulis' => 'Gege Akutami',
            'penerbit' => 'Shueisha',
            'rilis' => '2018-07-04',
            'sampul' => 'jujutsu kaisen.jpg',
            'harga' => 30000,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $komik->insert([
            'judul' => 'Attack On Titan',
            'slug' => 'attack-on-titan',
            'penulis' => 'Hajime Isayama',
            'penerbit' => 'Kodansha',
            'rilis' => '2009-09-09',
            'sampul' => 'aot.jpg',
            'harga' => 130000,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $komik->insert([
            'judul' => 'One Piece',
            'slug' => 'one-piece',
            'penulis' => 'Eiichiro Oda',
            'penerbit' => 'Weekly Shounen Jump',
            'rilis' => '1997-10-04',
            'sampul' => 'onepiece.jpg',
            'harga' => 190000,
            'created_at' => date('2000-01-13')
        ]);
    }
}
