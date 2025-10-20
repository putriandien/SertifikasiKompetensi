<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;
use App\Models\DudiModel;
use App\Models\LogbookModel;
use App\Models\MagangModel;
use App\Models\UserModel;
use App\Models\SchoolModel;
use App\Models\GuruModel;


class AdminController extends Controller
{
    protected $dudiModel;
    protected $magangModel;
    protected $siswaModel;
    protected $logbookModel;
    protected $userModel;
    protected $schoolModel;
    protected $guruModel;

    public function __construct()
    {
        $this->dudiModel    = new DudiModel();
        $this->magangModel  = new MagangModel();
        $this->siswaModel   = new SiswaModel();
        $this->logbookModel = new LogbookModel();
        $this->userModel    = new UserModel();
        $this->schoolModel = new SchoolModel();
        $this->guruModel = new GuruModel();

    }

    public function index()
    {
        // Ambil segment untuk pindah halaman sidebar
        $uri = service('uri');
        $segment2 = $uri->getSegment(2); // dashboard / dudi / pengguna / pengaturan

        $view = match($segment2) {
            'dashboard'  => 'admin/dashboard',
            'dudi'       => 'admin/dudi',
            'pengguna'   => 'admin/pengguna',
            'pengaturan' => 'admin/pengaturan',
            default      => 'admin/dashboard'
        };

        $totals = [
            'totalSiswa'   => $this->siswaModel->countAllResults(),
            'totalDudi'    => $this->dudiModel->countAllResults(),
            'totalMagang'  => $this->magangModel->countAllResults(),
            'totalLogbook' => $this->logbookModel
                                    ->where('DATE(tanggal)', date('Y-m-d'))
                                    ->countAllResults(),
        ];

        $recentData = [
            'recentDudi'    => $this->dudiModel->orderBy('created_at', 'DESC')->findAll(4),
            'recentLogbook' => $this->logbookModel->orderBy('created_at', 'DESC')->findAll(3),
        ];

        $recentMagang = $this->magangModel
            ->select('magang.*, siswa.nama AS nama_siswa, siswa.jurusan, dudi.nama_perusahaan AS nama_dudi')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->orderBy('magang.created_at', 'DESC')
            ->limit(4)
            ->findAll();

        // Semua DUDI dengan jumlah siswa
        $allDudi = $this->dudiModel
            ->select('dudi.*, COUNT(magang.id) AS jumlah_siswa')
            ->join('magang', 'magang.dudi_id = dudi.id', 'left')
            ->groupBy('dudi.id')
            ->orderBy('dudi.created_at', 'DESC')
            ->withDeleted()
            ->findAll();

        $allUser   = $this->userModel->findAll();
        $guruList  = $this->guruModel->findAll();
                    
        $status = $this->request->getPost('status_verifikasi');

            if ($status === 'terverifikasi') {
                $data['email_verified_at'] = date('Y-m-d H:i:s');
            } else {
                $data['email_verified_at'] = null;
            }

        // Total aktif/nonaktif DUDI
        $totalAktifDudi    = $this->dudiModel->where('status', 'aktif')->countAllResults();
        $totalNonaktifDudi = $this->dudiModel->where('status', 'nonaktif')->countAllResults();
        
        $data = array_merge(
            $totals,
            $recentData,
            [
                'recentMagang'      => $recentMagang,
                'allDudi'           => $allDudi,
                'allUser'           => $allUser,
                'totalAktifDudi'    => $totalAktifDudi,
                'totalNonaktifDudi' => $totalNonaktifDudi,
                'school'            => $this->schoolModel->first(),
                'uri'               => service('uri')->getPath(),
                'guruList'          => $guruList,
            ]
        );
        
        return view($view, $data);
    }

    // Ambil siswa by DUDI
    public function getSiswaByDudi($dudiId)
    {
        $siswa = $this->magangModel
            ->select('siswa.nama, siswa.jurusan')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->where('magang.dudi_id', $dudiId)
            ->findAll();

        return $this->response->setJSON($siswa);
    }

    // Detail DUDI
    public function getDudi($id)
    {
        $dudi = $this->dudiModel->find($id);

        if ($dudi) {
            return $this->response->setJSON($dudi);
        } else {
            return $this->response->setJSON(['error' => 'DUDI tidak ditemukan']);
        }
    }
    
    // Tambah DUDI
    public function addDudi()
    {
        $data = $this->request->getJSON(true);

        // pastikan guru_id ada
        if (!isset($data['guru_id'])) {
            return $this->response->setJSON(['error' => 'Guru penanggung jawab harus dipilih']);
        }

        $insertData = [
            'user_id'          => session()->get('user_id') ?? session()->get('id'),
            'nama_perusahaan'  => $data['nama_perusahaan'],
            'alamat'           => $data['alamat'],
            'telepon'          => $data['telepon'],
            'email'            => $data['email'],
            'penanggung_jawab' => $data['penanggung_jawab'],
            'status'           => $data['status'],
            'guru_id'          => $data['guru_id'],
            'kuota'            => $data['kuota'],
            'deskripsi'        => $data['deskripsi'] ?? null,
        ];

        if ($this->dudiModel->insert($insertData)) {
            return $this->response->setJSON(['success' => 'DUDI berhasil ditambahkan!']);
        }

        return $this->response->setJSON(['error' => 'Gagal menambahkan DUDI']);
    }


    // Update DUDI
    public function updateDudi($id)
    {
        $dudi = $this->dudiModel->find($id);

        if (!$dudi) {
            return $this->response->setJSON(['error' => 'DUDI tidak ditemukan']);
        }

        $data = $this->request->getJSON(true);

        $this->dudiModel->update($id, [
            'nama_perusahaan'  => $data['nama_perusahaan'] ?? $dudi['nama_perusahaan'],
            'alamat'           => $data['alamat'] ?? $dudi['alamat'],
            'telepon'          => $data['telepon'] ?? $dudi['telepon'],
            'email'            => $data['email'] ?? $dudi['email'],
            'penanggung_jawab' => $data['penanggung_jawab'] ?? $dudi['penanggung_jawab'],
            'status'           => $data['status'] ?? $dudi['status'],
            'guru_id'          => $data['guru_id'] ?? $dudi['guru_id'], // tambahkan guru_id
            'kuota'            => $data['kuota'] ?? $dudi['kuota'],
            'deskripsi'        => $data['deskripsi'] ?? $dudi['deskripsi'],

        ]);

        return $this->response->setJSON(['success' => 'Data DUDI berhasil diperbarui']);
    }


    // Soft delete DUDI
    public function deleteDudi($id)
    {
        if ($this->dudiModel->update($id, [
            'deleted_at' => date('Y-m-d H:i:s'),
            'status' => 'nonaktif'
        ])) {
            return $this->response->setJSON(['success' => 'DUDI berhasil dihapus!']);
        }

        return $this->response->setJSON(['error' => 'Gagal menghapus DUDI']);
    }

    // Restore DUDI
    public function restoreDudi($id)
    {
        if ($this->dudiModel->update($id, [
            'deleted_at' => null,
            'status' => 'aktif'
        ])) {
            return $this->response->setJSON(['success' => 'DUDI berhasil dipulihkan!']);
        }

        return $this->response->setJSON(['error' => 'Gagal memulihkan DUDI']);
    }

    // pengguna
    public function addUser()
    {
        try {
            $data = $this->request->getJSON(true);
            
            // ✅ PENTING: Definisikan $namaUser di sini!
            $namaUser = $data['name'] ?? '';
            $verified = $data['verified'] ?? 0;

            // Validasi basic
            if (empty($namaUser)) {
                return $this->response->setJSON([
                    'error' => 'Nama harus diisi'
                ]);
            }

            if (empty($data['email'])) {
                return $this->response->setJSON([
                    'error' => 'Email harus diisi'
                ]);
            }

            if (empty($data['role'])) {
                return $this->response->setJSON([
                    'error' => 'Role harus dipilih'
                ]);
            }

            if (empty($data['password']) || strlen($data['password']) < 6) {
                return $this->response->setJSON([
                    'error' => 'Password minimal 6 karakter'
                ]);
            }

            // 1️⃣ Insert user
            $userId = $this->userModel->insert([
                'name'              => $namaUser,
                'email'             => $data['email'],
                'password'          => password_hash($data['password'], PASSWORD_DEFAULT),
                'role'              => $data['role'],
                'email_verified_at' => $verified == 1 ? date('Y-m-d H:i:s') : null,
            ]);

            if (!$userId) {
                $errors = $this->userModel->errors();
                return $this->response->setJSON([
                    'error' => 'Gagal menambahkan user: ' . json_encode($errors)
                ]);
            }

            // 2️⃣ Tambah ke tabel role spesifik
            $role = $data['role'];
            
            if ($role === 'siswa') {
                // Insert siswa jika ada data NIS atau Kelas
                if (!empty($data['nis']) || !empty($data['kelas'])) {
                    $siswaInsert = $this->siswaModel->insert([
                        'user_id' => $userId,
                        'nama'    => $namaUser,
                        'nis'     => $data['nis'] ?? null,
                        'kelas'   => $data['kelas'] ?? null,
                        'jurusan' => $data['jurusan'] ?? null,
                        'alamat'  => $data['alamat'] ?? null,
                        'telepon' => $data['telepon'] ?? null,
                    ]);

                    if (!$siswaInsert) {
                        $errors = $this->siswaModel->errors();
                        return $this->response->setJSON([
                            'error' => 'User dibuat, tapi gagal menambahkan data siswa: ' . json_encode($errors)
                        ]);
                    }
                }
            } 
            elseif ($role === 'guru') {
                // Insert guru jika ada data NIP
                if (!empty($data['nip'])) {
                    $guruInsert = $this->guruModel->insert([
                        'user_id' => $userId,
                        'nip'     => $data['nip'] ?? null,
                        'nama'    => $namaUser,
                        'alamat'  => $data['alamat'] ?? null,
                        'telepon' => $data['telepon'] ?? null,
                    ]);

                    if (!$guruInsert) {
                        $errors = $this->guruModel->errors();
                        return $this->response->setJSON([
                            'error' => 'User dibuat, tapi gagal menambahkan data guru: ' . json_encode($errors)
                        ]);
                    }
                }
            }

            return $this->response->setJSON([
                'success' => 'User berhasil ditambahkan',
                'user_id' => $userId,
                'role'    => $role
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Exception in addUser: ' . $e->getMessage());
            
            return $this->response->setJSON([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    // ✅ Ambil detail user
    // ✅ Ambil detail user dengan data siswa/guru nested
    public function getUser($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ]);
        }

        // ✅ Ambil data siswa jika role = siswa
        if ($user['role'] === 'siswa') {
            $siswa = $this->siswaModel->where('user_id', $id)->first();
            $user['siswa'] = $siswa; // Nested di dalam key 'siswa'
        }
        
        // ✅ Ambil data guru jika role = guru
        if ($user['role'] === 'guru') {
            $guru = $this->guruModel->where('user_id', $id)->first();
            $user['guru'] = $guru; // Nested di dalam key 'guru'
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $user
        ]);
    }

    // ✅ Update user
    public function updateUser($id)
    {
        try {
            $data = $this->request->getJSON(true);

            // Validasi
            if (empty($data['name']) || empty($data['email'])) {
                return $this->response->setJSON(['error' => 'Nama dan email harus diisi']);
            }

            // Cek user
            $existingUser = $this->userModel->find($id);
            if (!$existingUser) {
                return $this->response->setJSON(['error' => 'User tidak ditemukan']);
            }

            $oldRole = $existingUser['role'];
            $newRole = $data['role'] ?? $oldRole;

            // Update tabel users
            $updateData = [
                'name'  => $data['name'],
                'email' => $data['email'],
                'role'  => $newRole,
            ];

            if (isset($data['verified'])) {
                $updateData['email_verified_at'] = $data['verified'] == 1 
                    ? date('Y-m-d H:i:s') 
                    : null;
            }

            if (!$this->userModel->update($id, $updateData)) {
                return $this->response->setJSON([
                    'error' => 'Gagal update user: ' . json_encode($this->userModel->errors())
                ]);
            }

            // Handle perubahan atau update role-specific data
            if ($oldRole !== $newRole) {
                // Hapus dari tabel lama
                if ($oldRole === 'siswa') {
                    $this->siswaModel->where('user_id', $id)->delete();
                } elseif ($oldRole === 'guru') {
                    $this->guruModel->where('user_id', $id)->delete();
                }

                // Tambah ke tabel baru
                if ($newRole === 'siswa') {
                    $this->siswaModel->insert([
                        'user_id' => $id,
                        'nama'    => $data['name'],
                        'nis'     => $data['nis'] ?? null,
                        'kelas'   => $data['kelas'] ?? null,
                        'jurusan' => $data['jurusan'] ?? null,
                        'alamat'  => $data['alamat'] ?? null,
                        'telepon' => $data['telepon'] ?? null,
                    ]);
                } elseif ($newRole === 'guru') {
                    $this->guruModel->insert([
                        'user_id' => $id,
                        'nama'    => $data['name'],
                        'nip'     => $data['nip'] ?? null,
                        'alamat'  => $data['alamat'] ?? null,
                        'telepon' => $data['telepon'] ?? null,
                    ]);
                }
            } else {
                // Role sama, update detail saja
                if ($newRole === 'siswa') {
                    $siswa = $this->siswaModel->where('user_id', $id)->first();
                    if ($siswa) {
                        $this->siswaModel->update($siswa['id'], [
                            'nama'    => $data['name'],
                            'nis'     => $data['nis'] ?? null,
                            'kelas'   => $data['kelas'] ?? null,
                            'jurusan' => $data['jurusan'] ?? null,
                            'alamat'  => $data['alamat'] ?? null,
                            'telepon' => $data['telepon'] ?? null,
                        ]);
                    }
                } elseif ($newRole === 'guru') {
                    $guru = $this->guruModel->where('user_id', $id)->first();
                    if ($guru) {
                        $this->guruModel->update($guru['id'], [
                            'nama'    => $data['name'],
                            'nip'     => $data['nip'] ?? null,
                            'alamat'  => $data['alamat'] ?? null,
                            'telepon' => $data['telepon'] ?? null,
                        ]);
                    }
                }
            }

            return $this->response->setJSON(['success' => 'User berhasil diperbarui']);

        } catch (\Exception $e) {
            log_message('error', 'updateUser error: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // ✅ Hapus permanen
    public function deleteUser($id)
    {
        $this->userModel->delete($id);
        return $this->response->setJSON(['success' => 'User berhasil dihapus']);
    }

    public function getSchool()
    {
        $school = $this->schoolModel->first();
        return $this->response->setJSON($school);
    }


    public function updateSchool()
    {
        // Ambil semua data dari form
        $data = [
            'nama_sekolah'   => $this->request->getPost('nama_sekolah'),
            'npsn'           => $this->request->getPost('npsn'),
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'email'          => $this->request->getPost('email'),
            'website'        => $this->request->getPost('website'),
            'kepala_sekolah' => $this->request->getPost('kepala_sekolah'),
        ];
    
        // Handle upload logo
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi tipe file
            $validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (!in_array($file->getMimeType(), $validTypes)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Format file harus PNG atau JPG'
                ]);
            }
            
            // Validasi ukuran (2MB)
            if ($file->getSize() > 2048000) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Ukuran file maksimal 2MB'
                ]);
            }
    
            // Hapus logo lama jika ada
            $oldSchool = $this->schoolModel->find(1);
            if ($oldSchool && !empty($oldSchool['logo_url'])) {
                $oldLogoPath = ROOTPATH . 'public/uploads/' . $oldSchool['logo_url'];
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
    
            // Upload logo baru
            $logoName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/', $logoName);
            $data['logo_url'] = $logoName;
        }
    
        // Update database
        try {
            $this->schoolModel->update(1, $data);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal update: ' . $e->getMessage()
            ]);
        }
    }




}
