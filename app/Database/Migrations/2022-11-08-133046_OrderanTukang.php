<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderanTukang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'int',
                'constraint' => 6,
                'unsigned'   => true,
            ],
            'tukang_id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => true,
            ],
            'lokasi' => [
                'type'       => 'CHAR',
                'constraint' => 200,
            ],
            'tugas' => [
                'type'       => 'CHAR',
                'constraint' => 200,
            ],
            'jenis_kerja' => [
                'type'       => 'ENUM',
                'constraint' => ['borongan', 'harian'],
            ],
            'keterangan' => [
                'type'       => 'TEXT',
                'null'      => true
            ],
            'rating' => [
                'type'       => 'INT',
                'constraint' => 2,
                'null'       => true
            ],
            'durasi' => [
                'type'       => 'CHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'created_at'     => [
                'type'          => 'DATE',
            ],
            'updated_at'     => [
                'type'          => 'DATE',
            ],
            'deleted_at'     => [
                'type'          => 'DATE',
                'null'          => true
            ],


        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
        // $this->forge->addForeignKey('tukang_id', 'tukang', 'id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('orderan');
    }

    public function down()
    {
        $this->forge->dropTable('orderan');
    }
}
