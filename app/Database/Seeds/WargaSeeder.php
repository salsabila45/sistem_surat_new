<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nik'            => '3201010101010001',
                'nama_lengkap'   => 'Budi Santoso',
                'alamat'         => 'Jl. Merdeka No. 10, Purwokerto',
                'no_hp'          => '081234567890',
                'email'          => 'budi@example.com',
                'jenis_kelamin'  => 'Laki-laki',
                'tempat_lahir'  => 'Purbalingga',
                'tanggal_lahir' => date('Y-m-d', strtotime('-' . rand(18, 60) . ' years -' . rand(0, 365) . ' days')),
                'agama'          => 'Islam',
                'status'         => 'aktif',
            ],
            [
                'nik'            => '3201010101010002',
                'nama_lengkap'   => 'Siti Aminah',
                'alamat'         => 'Jl. Diponegoro No. 5, Banyumas',
                'no_hp'          => '082345678901',
                'email'          => 'siti@example.com',
                'jenis_kelamin'  => 'Perempuan',
                'tempat_lahir'  => 'Purbalingga',
                'tanggal_lahir' => date('Y-m-d', strtotime('-' . rand(18, 60) . ' years -' . rand(0, 365) . ' days')),
                'agama'          => 'Islam',
                'status'         => 'nonaktif',
            ],
        ];

        $this->db->table('warga')->insertBatch($data);
    }
}
