<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengajuanSuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_surat'          => 'DS-0001/2025',
                'warga_id'          => 1,
                'nama'              => 'Budi Santoso',
                'nik'               => '3301123456789012',
                'alamat'            => 'Jl. Merdeka No. 45, Desa Sukamaju',
                'keperluan'         => 'Untuk melengkapi persyaratan melamar pekerjaan di PT Sejahtera Abadi.',
                'jenis_surat'       => 'Surat Keterangan Domisili',
                'jenis_surat_id'    => 1,
                'tanggal_pengajuan' => '2025-10-15',
                'tanggal_selesai'   => null,
                'status'            => 'diajukan',
                'file_surat'        => null,
                'diarsipkan'        => false,
                'keterangan'        => 'Menunggu verifikasi dari perangkat desa.',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'no_surat'          => 'DS-0002/2025',
                'warga_id'          => 2,
                'nama'              => 'Siti Aminah',
                'nik'               => '3301987654321098',
                'alamat'            => 'RT 02 RW 03, Desa Karanganyar',
                'keperluan'         => 'Untuk keperluan administrasi sekolah anak.',
                'jenis_surat'       => 'Surat Keterangan Tidak Mampu',
                'jenis_surat_id'    => 2,
                'tanggal_pengajuan' => '2025-10-10',
                'tanggal_selesai'   => '2025-10-12',
                'status'            => 'selesai',
                'file_surat'        => 'SKTM_0002.pdf',
                'keterangan'        => 'Sudah disetujui oleh Kepala Desa.',
                'diarsipkan'        => true,
                'created_at'        => date('Y-m-d H:i:s', strtotime('-5 days')),
                'updated_at'        => date('Y-m-d H:i:s', strtotime('-3 days'))
            ],
            [
                'no_surat'          => 'DS-0003/2025',
                'warga_id'          => 2,
                'nama'              => 'Rahmat Hidayat',
                'nik'               => '3301765432109876',
                'alamat'            => 'RT 01 RW 01, Desa Karangsari',
                'keperluan'         => 'Untuk pembuatan KTP baru.',
                'jenis_surat'       => 'Surat Pengantar KTP',
                'jenis_surat_id'    => 2,
                'tanggal_pengajuan' => '2025-10-14',
                'tanggal_selesai'   => null,
                'status'            => 'verifikasi',
                'file_surat'        => null,
                'diarsipkan'        => false,
                'keterangan'        => 'Sedang diverifikasi oleh sekretaris desa.',
                'created_at'        => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at'        => date('Y-m-d H:i:s')
            ],
            [
                'no_surat'          => 'DS-0004/2025',
                'warga_id'          => 2,
                'nama'              => 'Rahmat Hidayat',
                'nik'               => '3301765432109876',
                'alamat'            => 'RT 01 RW 01, Desa Karangsari',
                'keperluan'         => 'Untuk pembuatan KTP baru.',
                'jenis_surat'       => 'Surat Pengantar KTP',
                'jenis_surat_id'    => 2,
                'tanggal_pengajuan' => '2025-10-14',
                'tanggal_selesai'   => null,
                'status'            => 'ditolak',
                'file_surat'        => null,
                'diarsipkan'        => false,
                'keterangan'        => 'Sedang diverifikasi oleh sekretaris desa.',
                'created_at'        => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at'        => date('Y-m-d H:i:s')
            ]
        ];

        // Insert multiple rows
        $this->db->table('pengajuan_surat')->insertBatch($data);
    }
}
