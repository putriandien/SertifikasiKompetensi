<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    // 1. menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // 2. Proses login
    public function authenticate()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByEmail($email);

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        $passwordValid = false;

        // cek password hash
        if (password_verify($password, $user['password'])) {
            $passwordValid = true;
        } 
        // fallback akun lama (plain text)
        elseif ($password === $user['password']) {
            $passwordValid = true;
            // update password ke hash untuk keamanan
            $this->userModel->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
        }

        if (!$passwordValid) {
            return redirect()->back()->with('error', 'Password salah');
        }

        // jadi jika sudah diverifikasi bisa login jika belum diverifikasi tidak bisa
        if (empty($user['email_verified_at'])) {
            return redirect()->back()->with('error', 'Akun belum diverifikasi. Silakan minta admin verifikasi email terlebih dahulu.');
        }

        // session data
        $sessionData = [
            'user_id' => $user['id'],
            'guru_id' => $user['id'], 
            'siswa_id' => $user['id'],
            'nama' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        // ambil data guru/siswa
        if ($user['role'] === 'guru') {
            $guruModel = new \App\Models\GuruModel();
            $guruData = $guruModel->where('user_id', $user['id'])->first();
            if ($guruData) $sessionData['guru_id'] = $guruData['id'];
        }

        if ($user['role'] === 'siswa') {
            $siswaModel = new \App\Models\SiswaModel();
            $siswaData = $siswaModel->where('user_id', $user['id'])->first();
            if ($siswaData) $sessionData['siswa_id'] = $siswaData['id'];
        }

        // generate JWT dan simpan di session
        helper('jwt');
        $jwtToken = create_jwt([
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role']
        ]);
        $sessionData['jwt_token'] = $jwtToken;
        $session->set($sessionData);

        // redirect sesuai role
        switch ($user['role']) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'siswa':
                return redirect()->to('/siswa/dashboard');
            case 'guru':
                return redirect()->to('/guru/dashboard');
            default:
                return redirect()->to('/login')->with('error', 'Role tidak valid');
        }
    }


    // 3. Logout
    public function logout()
    {
        // Hapus semua session
        session()->destroy();
        
        // Jika menggunakan AJAX (JSON response)
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Logout berhasil'
            ]);
        }
        
        // Jika akses langsung via URL
        return redirect()->to('/login')->with('success', 'Anda telah keluar dari sistem');
    }
}
