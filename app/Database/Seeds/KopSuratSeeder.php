<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KopSuratSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('kop_surat')->insert([
            'nama_instansi' => 'Dinas Pendidikan Kota Bandung',
            'alamat'        => 'Jl. Ahmad Yani No. 100',
            'desa'          => 'Barungan',
            'kecamatan'     => 'Bandung',
            'kabupaten'     => 'Kota Bandung',
            'provinsi'      => 'Jawa Barat',
            'kode_pos'     => '53121',
            'logo'          => 'logo_disdik.png',
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
