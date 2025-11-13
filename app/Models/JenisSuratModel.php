<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSuratModel extends Model
{
    protected $table            = 'jenis_surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'kode',
        'nama',
        'deskripsi',
        'status',
        'template',
        'persyaratan',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true; // auto-manage created_at & updated_at
    protected $dateFormat    = 'datetime';

    // Optional: validation rules
    protected $validationRules = [
        // 'kode'   => 'required|is_unique[jenis_surat.kode,id,{id}]',
        'nama'   => 'required|min_length[3]',
        'status' => 'in_list[aktif,nonaktif]',
    ];
}
