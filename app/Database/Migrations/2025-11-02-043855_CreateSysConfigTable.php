<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSysConfigTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'value' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'label' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['text', 'textarea', 'email', 'number', 'url', 'file', 'json'],
                'default' => 'text',
            ],
            'group' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'general',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->addKey('group');
        $this->forge->createTable('sysconfig');
    }

    public function down()
    {
        $this->forge->dropTable('sysconfig');
    }
}
