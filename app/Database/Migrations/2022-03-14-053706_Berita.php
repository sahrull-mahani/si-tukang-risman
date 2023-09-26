<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul'       => [
                'type'       => 'CHAR',
                'constraint' => '255',
            ],
            'slug'       => [
                'type'       => 'CHAR',
                'constraint' => '150',
            ],
            'isi_berita'       => [
                'type'       => 'TEXT'
            ],
            'id_user'        => [
                'type'       => 'INT',
                'constraint' => '11'
            ],
            'pesan'        => [
                'type'       => 'CHAR',
                'constraint' => 150,
                'null'       => true
            ],
            'created_at'        => [
                'type'       => 'DATETIME',
            ],
            'updated_at'        => [
                'type'       => 'DATETIME',
            ],
            'deleted_at'        => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
