<?php

namespace App\Database\Seeds;

use App\Models\PenulisModel;
use CodeIgniter\Database\Seeder;

class PenulisSeeder extends Seeder
{
    public function run()
    {
        $penulisModel = new PenulisModel();

        $data = [
            [
                'nama' => 'Penulis Utama',
                'username' => 'penulis',
                'email' => 'penulis@desa.id',
                'password' => password_hash('penulis123', PASSWORD_DEFAULT),
                'role' => 'penulis',
                'foto' => null,
            ],
        ];

        // Insert semua data
        foreach ($data as $item) {
            $penulisModel->insert($item);
        }
    }
}
