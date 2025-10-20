<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 
        'nip', 
        'nama', 
        'alamat',
        'telepon'
    ];

    protected $useTimestamps = true; // supaya CI otomatis isi created_at & updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
