<?php  

namespace App\Models;  

use CodeIgniter\Model;  

class SiswaModel extends Model  
{  
    protected $table      = 'siswa';  
    protected $primaryKey = 'id';  

    protected $allowedFields = [  
        'user_id',  
        'nama',  
        'nis',  
        'kelas',  
        'jurusan',  
        'alamat',  
        'telepon'  
    ];  
    public function getSiswaWithUser() { 
        return $this->select('siswa.*, users.email, users.role') 
                    ->join('users', 'users.id = siswa.user_id') 
                    ->findAll(); }
                    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
                
}  

