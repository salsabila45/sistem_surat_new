<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('WargaSeeder');
        $this->call('JenisSuratSeeder');
        $this->call('PengajuanSuratSeeder');
        $this->call('PenulisSeeder');
        $this->call('KategoriBeritaSeeder');
        $this->call('BeritaSeeder');
        $this->call('SysConfigSeeder');
        $this->call('MenuSeeder');
        $this->call('KopSuratSeeder');
    }
}
