<?php
namespace App\Models;

use CodeIgniter\Model;

class DudiModel extends Model
{
    protected $table = 'dudi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'guru_id',
        'nama_perusahaan',
        'deskripsi', 
        'alamat', 
        'telepon',
        'email',
        'penanggung_jawab',
        'status',
        'kuota',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true; // <-- ini penting
    protected $deletedField  = 'deleted_at';
}
