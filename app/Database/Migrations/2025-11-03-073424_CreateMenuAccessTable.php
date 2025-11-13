<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuAccessTable extends Migration
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
            'nama_menu' => ['type' => 'VARCHAR', 'constraint' => 100],
            'url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 50],
            'is_active' => ['type' => 'TINYINT', 'default' => 1], // 1 = active, 0 = inactive
            'role' => ['type' => 'VARCHAR', 'constraint' => 50], // admin, user, etc
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('menu_access');
    }

    public function down()
    {
        $this->forge->dropTable('menu_access');
    }
}
