<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    // Kolom yang boleh diisi
    protected $allowedFields = [
        'name', 
        'email',
        'email_verified_at',
        'password', 
        'role', 
    ];

    // Aktifkan timestamps otomatis (created_at & updated_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Format timestamp (opsional, biar konsisten)
    protected $dateFormat = 'datetime';

    // Ambil user berdasarkan email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
