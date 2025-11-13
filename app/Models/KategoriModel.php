<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_berita'; // nama tabel sesuai migration
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'slug', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // otomatis isi created_at & updated_at
}
