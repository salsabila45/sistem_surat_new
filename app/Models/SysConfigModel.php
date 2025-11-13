<?php

namespace App\Models;

use CodeIgniter\Model;

class SysConfigModel extends Model
{
    protected $table = 'sysconfig';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key', 'value', 'label', 'type', 'group', 'description', 'updated_at'];
    protected $useTimestamps = false;

    protected $updatedField = 'updated_at';
}
