<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode'        => 'SKD-001',
                'nama'        => 'Surat Keterangan Domisili',
                'deskripsi'   => 'Digunakan untuk keterangan tempat tinggal warga.',
                'status'      => 'aktif',
                'template'    => '<p>Yang bertanda tangan di bawah ini menyatakan bahwa ...</p>',
                'persyaratan'  => 'Fotokopi KTP, KK, dan surat pengantar RT/RW',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kode'        => 'SKU-001',
                'nama'        => 'Surat Keterangan Usaha',
                'deskripsi'   => 'Digunakan untuk keperluan izin usaha warga.',
                'status'      => 'aktif',
                'template'    => '<p>Surat ini menyatakan bahwa yang bersangkutan memiliki usaha di ...</p>',
                'persyaratan'  => 'Fotokopi KTP, KK, dan surat keterangan dari RT/RW',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('jenis_surat')->insertBatch($data);
    }
}
