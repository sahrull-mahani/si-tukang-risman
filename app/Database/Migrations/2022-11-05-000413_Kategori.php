<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'nama_kategori'        => [
                'type'          => 'char',
                'constraint'    => 50,
            ],
            'satuan'        => [
                'type'          => 'char',
                'constraint'    => 50,
            ],
            'keterangan'     => [
                'type'          => 'varchar',
                'constraint'    => 255,
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
