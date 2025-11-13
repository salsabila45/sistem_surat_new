<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisSuratTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'aktif',
            ],
            'template' => [
                'type'       => 'LONGTEXT',
                'null'       => true,
                'comment'    => 'Konten utama template surat (HTML atau teks)',
            ],
            'persyaratan' => [
                'type'       => 'TEXT',
                'null'       => true,
                'comment'    => 'Syarat yang harus dipenuhi untuk surat ini',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_surat');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_surat');
    }
}
