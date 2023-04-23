<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komik extends Migration
{
    public function up()
    {
        // Users
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul'            => ['type' => 'varchar', 'constraint' => 255],
            'slug'             => ['type' => 'varchar', 'constraint' => 255],
            'penulis'          => ['type' => 'varchar', 'constraint' => 255],
            'penerbit'         => ['type' => 'varchar', 'constraint' => 255],
            'rilis'            => ['type' => 'date'],
            'sampul'           => ['type' => 'varchar', 'constraint' => 255],
            'harga'            => ['type' => 'decimal', 'constraint' => 8],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('komik', true);
    }

    public function down()
    {
        $this->forge->dropTable('komik');
    }
}
