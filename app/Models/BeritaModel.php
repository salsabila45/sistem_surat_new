<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'penulis_id',
        'kategori_id',
    ];

    public function getBeritaWithKategori($limit = 6)
    {
        return $this->select('berita.*, kategori_berita.nama as kategori, kategori_berita.slug as kategori_slug')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->orderBy('berita.created_at', 'DESC')
            ->limit($limit)
            ->find();
    }
}
