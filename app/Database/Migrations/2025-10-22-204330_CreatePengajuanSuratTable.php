<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengajuanSuratTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_surat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'warga_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'keperluan' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'jenis_surat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_surat_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_pengajuan' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['diajukan', 'verifikasi', 'selesai', 'ditolak'],
                'default'    => 'diajukan',
            ],
            'file_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'diarsipkan' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('warga_id', 'warga', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('jenis_surat_id', 'jenis_surat', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengajuan_surat');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_surat');
    }
}
