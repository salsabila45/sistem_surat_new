<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateSuratModel extends Model
{
    protected $table            = 'template_surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'judul',
        'isi_surat',
        'persyaratan',
        'jenis_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';

    // Validation example
    // protected $validationRules = [
    //     'nama'   => 'required|min_length[3]',
    //     'status' => 'in_list[aktif,nonaktif]',
    // ];

    // Optional helper: get only active templates
    // public function getActiveTemplates()
    // {
    //     return $this->where('status', 'aktif')->findAll();
    // }

    // Optional relationship-like helper
    // public function getWithTemplate()
    // {
    //     return $this->select('jenis_surat.*, template_surat.nama as nama_template')
    //         ->join('template_surat', 'template_surat.id = jenis_surat.template_id', 'left')
    //         ->findAll();
    // }
}
