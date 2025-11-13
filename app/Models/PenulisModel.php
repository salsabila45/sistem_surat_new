<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table      = 'penulis';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama',
        'username',
        'email',
        'password',
        'foto',
        'role'
    ];

    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
