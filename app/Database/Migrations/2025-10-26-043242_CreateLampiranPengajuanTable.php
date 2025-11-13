<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLampiranPengajuanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengajuan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'path_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tipe_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'ukuran_file' => [
                'type'       => 'INT',
                'null'       => true,
                'comment'    => 'ukuran dalam KB',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pengajuan_id', 'pengajuan_surat', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lampiran_pengajuan');
    }

    public function down()
    {
        $this->forge->dropTable('lampiran_pengajuan');
    }
}
