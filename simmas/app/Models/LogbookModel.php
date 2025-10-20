<?php

namespace App\Models;

use CodeIgniter\Model;

class LogbookModel extends Model
{
    protected $table = 'logbook';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'magang_id', 
        'tanggal', 
        'kegiatan', 
        'kendala',
        'file',
        'status_verifikasi',
        'catatan_guru',
        'catatan_dudi'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useSoftDeletes = true;
}
