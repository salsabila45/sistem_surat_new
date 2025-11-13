<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Teknologi',
                'slug' => 'teknologi',
                'created_at' => '2024-01-15 08:00:00',
                'updated_at' => '2024-01-15 08:00:00'
            ],
            [
                'nama' => 'Kesehatan',
                'slug' => 'kesehatan',
                'created_at' => '2024-01-15 08:00:00',
                'updated_at' => '2024-01-15 08:00:00'
            ],
            [
                'nama' => 'Bisnis',
                'slug' => 'bisnis',
                'created_at' => '2024-01-15 08:00:00',
                'updated_at' => '2024-01-15 08:00:00'
            ],
            [
                'nama' => 'Pendidikan',
                'slug' => 'pendidikan',
                'created_at' => '2024-01-15 08:00:00',
                'updated_at' => '2024-01-15 08:00:00'
            ],
            [
                'nama' => 'Olahraga',
                'slug' => 'olahraga',
                'created_at' => '2024-01-15 08:00:00',
                'updated_at' => '2024-01-15 08:00:00'
            ]
        ];

        // Using query builder to insert data
        $this->db->table('kategori_berita')->insertBatch($data);
    }
}
