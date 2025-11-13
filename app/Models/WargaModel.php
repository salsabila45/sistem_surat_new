<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{

    protected $table            = 'warga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'nik',
        'nama_lengkap',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'jenis_kelamin',
        'agama',
        'status',
        'foto',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
