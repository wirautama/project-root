<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ApiToken extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'token' => ['type' => 'text'],

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('apitoken', true);
    }

    public function down()
    {
        $this->forge->dropTable('apitoken');
    }
}
