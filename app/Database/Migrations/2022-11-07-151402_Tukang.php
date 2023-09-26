<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tukang extends Migration
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
            'user_id'        => [
                'type'          => 'int',
                'constraint'    => 6,
                'unsigned'      => true,
            ],
            'nama'     => [
                'type'          => 'CHAR',
                'constraint'    => 150,
            ],
            'nik'     => [
                'type'          => 'CHAR',
                'constraint'    => 18,
            ],
            'tarif'     => [
                'type'          => 'CHAR',
                'constraint'    => 100,
            ],
            'umur'     => [
                'type'          => 'TINYINT',
                'constraint'    => 3,
            ],
            'alamat'     => [
                'type'          => 'TEXT',
            ],
            'telp'     => [
                'type'          => 'CHAR',
                'constraint'    => 15,
            ],
            'foto'     => [
                'type'          => 'CHAR',
                'constraint'    => 100,
            ],
            'foto_ktp'     => [
                'type'          => 'CHAR',
                'constraint'    => 100,
                'null'          => true
            ],
            'status'     => [
                'type'          => 'TINYINT',
                'constraint'    => 1,
                'default'       => 0
            ],
            'created_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
            'updated_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
            'deleted_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],
        ]);
        $this->forge->addKey('id', true);
		// $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('tukang');
    }

    public function down()
    {
        $this->forge->dropTable('tukang');
    }
}
