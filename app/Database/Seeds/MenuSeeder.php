<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_menu'   => 'Dashboard',
                'url'         => '/admin/dashboard',
                'is_active'   => 1,
                'icon'        => 'ni ni-tv-2',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Data Warga',
                'url'         => '/admin/data-warga',
                'is_active'   => 1,
                'icon'        => 'ni ni-calendar-grid-58',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Pengajuan Surat',
                'url'         => '/admin/pengajuan-surat',
                'is_active'   => 1,
                'icon'        => 'ni ni-credit-card',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Jenis Surat',
                'url'         => '/admin/jenis-surat',
                'is_active'   => 1,
                'icon'        => 'ni ni-app',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Arsip Surat',
                'url'         => '/admin/arsip-surat',
                'is_active'   => 1,
                'icon'        => 'ni ni-world-2',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Laporan',
                'url'         => '/admin/laporan',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-02',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Profil Sistem',
                'url'         => '/admin/profile',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Hak Akses',
                'url'         => '/admin/hak-akses',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Kelola Akun',
                'url'         => '/admin/kelola-akun',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Daftar Berita',
                'url'         => '/admin/daftar-berita',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Tulis Berita',
                'url'         => '/admin/tulis-berita',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Kop Surat',
                'url'         => '/admin/kop-surat',
                'is_active'   => 1,
                'icon'        => 'ni ni-single-copy-04',
                'role'        => 'admin',
            ],
            [
                'nama_menu'   => 'Dashboard',
                'url'         => '/masyarakat/dashboard',
                'is_active'   => 1,
                'icon'        => 'ni ni-tv-2',
                'role'        => 'masyarakat',
            ],
            [
                'nama_menu'   => 'Ajukan Surat',
                'url'         => '/masyarakat/pengajuan-surat',
                'is_active'   => 1,
                'icon'        => 'ni ni-calendar-grid-58',
                'role'        => 'masyarakat',
            ],
            [
                'nama_menu'   => 'Riwayat Pengajuan',
                'url'         => '/masyarakat/riwayat-pengajuan',
                'is_active'   => 1,
                'icon'        => 'ni ni-calendar-grid-58',
                'role'        => 'masyarakat',
            ],
            [
                'nama_menu'   => 'Profile',
                'url'         => '/masyarakat/profile',
                'is_active'   => 1,
                'icon'        => 'ni ni-calendar-grid-58',
                'role'        => 'masyarakat',
            ],
        ];

        $this->db->table('menu_access')->insertBatch($data);
    }
}
