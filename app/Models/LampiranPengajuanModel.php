<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranPengajuanModel extends Model
{
    protected $table = 'lampiran_pengajuan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pengajuan_id',
        'nama_file',
        'path_file',
        'tipe_file',
        'ukuran_file',
    ];
}
