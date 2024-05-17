<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 10, 'auto_increment' => true, 'unsigned' => true],
            'id_order' => ['type' => 'int', 'constraint' => 10, 'unsigned' => true],
            'id_user' => ['type' => 'int', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_tukang' => ['type' => 'int', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'pesan' => ['type' => 'char', 'constraint' => 250],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_order', 'orderan', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('id_tukang', 'tukang', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('chat');
    }

    public function down()
    {
        $this->forge->dropTable('chat');
    }
}
