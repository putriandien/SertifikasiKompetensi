<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{
    protected $table      = 'school_settings';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'logo_url', 'nama_sekolah', 'npsn', 'alamat',
        'telepon', 'email', 'website', 'kepala_sekolah', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
