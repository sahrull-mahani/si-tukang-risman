<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'          => 'INT',
                'constraint'    => '11',
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'id_tukang'        => [
                'type'          => 'int',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'id_kategori'        => [
                'type'          => 'int',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'tarif'        => [
                'type'          => 'char',
                'constraint'    => 10,
            ],
        ]);
        $this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_tukang', 'tukang', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('kategori_group');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_group');
    }
}
