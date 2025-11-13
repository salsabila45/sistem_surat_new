<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SysConfigSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Portal Berita',
                'label' => 'Nama Website',
                'type' => 'text',
                'group' => 'general',
                'description' => 'Nama website yang ditampilkan di header dan title page',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'site_description',
                'value' => 'Portal berita terpercaya dengan informasi terkini dan akurat',
                'label' => 'Deskripsi Website',
                'type' => 'textarea',
                'group' => 'general',
                'description' => 'Deskripsi singkat tentang website',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'site_logo',
                'value' => '/assets/img/logos/logo_desa.webp',
                'label' => 'Logo Website',
                'type' => 'file',
                'group' => 'general',
                'description' => 'Logo website yang ditampilkan di header',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            // Contact Information
            [
                'key' => 'company_address',
                'value' => 'Jl. Contoh Alamat No. 123, Jakarta Pusat, DKI Jakarta 10110',
                'label' => 'Alamat Perusahaan',
                'type' => 'textarea',
                'group' => 'contact',
                'description' => 'Alamat lengkap perusahaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'company_phone',
                'value' => '+62-21-1234567',
                'label' => 'Telepon',
                'type' => 'text',
                'group' => 'contact',
                'description' => 'Nomor telepon perusahaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'company_email',
                'value' => 'info@portalberita.com',
                'label' => 'Email',
                'type' => 'email',
                'group' => 'contact',
                'description' => 'Alamat email perusahaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'company_website',
                'value' => 'https://portalberita.com',
                'label' => 'Website',
                'type' => 'url',
                'group' => 'contact',
                'description' => 'Alamat website perusahaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'key' => 'gambar_desa',
                'value' => 'https://portalberita.com',
                'label' => 'Gambar Desa',
                'type' => 'url',
                'group' => 'profil',
                'description' => 'Alamat website perusahaan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'sejarah_desa',
                'value' => 'Sejarah Desa Gambarsari',
                'label' => 'Sejarah Desa',
                'type' => 'html',
                'group' => 'profil',
                'description' => 'Sejarah Desa Gambarsari',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'visi',
                'value' => 'Menjadi portal berita terdepan yang menjadi rujukan utama masyarakat dalam mendapatkan informasi yang akurat dan terpercaya.',
                'label' => 'Visi Perusahaan',
                'type' => 'textarea',
                'group' => 'profil',
                'description' => 'Visi perusahaan/organisasi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'misi',
                'value' => '["Menyajikan berita yang akurat dan terverifikasi", "Mengutamakan etika jurnalistik dalam setiap pemberitaan", "Memberikan edukasi media literacy kepada masyarakat", "Menjadi mitra yang konstruktif bagi pembangunan"]',
                'label' => 'Misi Perusahaan',
                'type' => 'html',
                'group' => 'profil',
                'description' => 'Misi perusahaan dalam format array JSON',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'key' => 'gambar_ilustrasi',
                'value' => 'https://portalberita.com',
                'label' => 'Gambar Ilustrasi',
                'type' => 'url',
                'group' => 'beranda',
                'description' => 'Ilustrasi untuk beranda',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'judul_sambutan',
                'value' => 'Selamat datang',
                'label' => 'Selamat Datang',
                'type' => 'text',
                'group' => 'beranda',
                'description' => 'Judul sambutan di beranda',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'key' => 'subjudul_sambutan',
                'value' => 'Di website surat desa gambarsari',
                'label' => 'Subjudul Sambutan',
                'type' => 'text',
                'group' => 'beranda',
                'description' => 'Subjudul sambutan di beranda',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('sysconfig')->insertBatch($data);
    }
}
