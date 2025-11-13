<?php

namespace App\Models;

use CodeIgniter\Model;

class KopSuratModel extends Model
{
    protected $table            = 'kop_surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;

    // Kolom yang boleh diisi
    protected $allowedFields = [
        'nama_instansi',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'logo',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules
    protected $validationRules = [
        'nama_instansi' => 'required|min_length[3]|max_length[255]',
        'alamat'        => 'permit_empty|max_length[500]',
        'logo'          => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'nama_instansi' => [
            'required'   => 'Nama instansi wajib diisi.',
            'min_length' => 'Nama instansi minimal 3 karakter.',
        ]
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Custom: Ambil kop surat aktif
    public function getActive()
    {
        return $this->where('is_active', 1)->first();
    }

    // Custom: Upload logo
    public function uploadLogo($file, $oldLogo = null)
    {
        if (! $file->isValid()) {
            return false;
        }

        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/desa', $newName);

        // Hapus logo lama jika ada
        if ($oldLogo && file_exists(FCPATH . 'uploads/desa/' . $oldLogo)) {
            unlink(FCPATH . 'uploads/desa/' . $oldLogo);
        }

        return $newName;
    }
}
