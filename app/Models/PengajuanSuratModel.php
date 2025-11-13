<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanSuratModel extends Model
{
    protected $table            = 'pengajuan_surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'no_surat',
        'warga_id',
        'nama',
        'nik',
        'alamat',
        'keperluan',
        'jenis_surat',
        'jenis_surat_id',
        'tanggal_pengajuan',
        'tanggal_selesai',
        'status',
        'file_surat',
        'keterangan',
        'diarsipkan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Optional: biar hasil query otomatis diurutkan dari pengajuan terbaru
    protected $order = ['tanggal_pengajuan' => 'DESC'];

    // Validation rules (kalau kamu mau pakai built-in validation CI4)
    protected $validationRules = [
        'nama'             => 'required|min_length[3]',
        'nik'              => 'required|min_length[16]|max_length[16]',
        'alamat'           => 'required',
        'jenis_surat_id'   => 'required|integer',
        'keperluan'        => 'required',
        'tanggal_pengajuan' => 'required|valid_date',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama pemohon wajib diisi.'
        ],
        'nik' => [
            'required'   => 'NIK wajib diisi.',
            'min_length' => 'NIK harus terdiri dari 16 digit.',
            'max_length' => 'NIK harus terdiri dari 16 digit.'
        ],
        'alamat' => [
            'required' => 'Alamat wajib diisi.'
        ],
        'keperluan' => [
            'required' => 'Keperluan surat wajib diisi.'
        ]
    ];

    /**
     * Ambil semua pengajuan berdasarkan status tertentu
     */
    public function getByStatus($status)
    {
        return $this->where('status', $status)->orderBy('tanggal_pengajuan', 'DESC')->findAll();
    }

    /**
     * Ambil semua pengajuan milik satu warga
     */
    public function getByWarga($warga_id)
    {
        return $this->where('warga_id', $warga_id)->orderBy('tanggal_pengajuan', 'DESC')->findAll();
    }

    /**
     * Generate nomor surat otomatis (opsional)
     */
    public function generateNoSurat($prefix = 'DS')
    {
        $count = $this->countAllResults() + 1;
        return sprintf("%s-%04d/%s", $prefix, $count, date('Y'));
    }
}
