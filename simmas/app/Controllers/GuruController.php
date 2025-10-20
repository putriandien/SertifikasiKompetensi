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


class GuruController extends Controller
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
        $guru_id = session()->get('guru_id');
        $guru   = $this->guruModel->find($guru_id) ?? ['nama' => 'Guest'];

        // Tentukan view sesuai sidebar
        $uri = service('uri');
        $segment2 = $uri->getSegment(2);
        $view = match($segment2) {
            'dashboard'     => 'guru/dashboard',
            'dudi'          => 'guru/dudi',
            'magang'        => 'guru/magang',
            'jurnal-harian' => 'guru/jurnal-harian',
            default         => 'guru/dashboard'
        };

        // Models
        $magangModel = new MagangModel();
        $siswaModel  = new SiswaModel();
        $dudiModel   = new DudiModel();
        $logbookModel= new LogbookModel();

        // Ambil semua magang bimbingan guru
        $magangBimbingan = $magangModel->where('guru_id', $guru_id)->findAll();
        $siswaIds = array_column($magangBimbingan, 'siswa_id');
        $siswaBimbingan = $siswaModel->whereIn('id', $siswaIds)->findAll();
        $logbookList = $logbookModel
            ->withDeleted()
            ->select('logbook.*, magang.siswa_id, siswa.nama AS nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan, dudi.nama_perusahaan AS nama_dudi')
            ->join('magang', 'magang.id = logbook.magang_id')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('magang.guru_id', $guru_id) // penting: filter berdasarkan guru
            ->orderBy('logbook.tanggal', 'DESC')
            ->findAll();
    
        // Stats
        $totalSiswaBimbingan = count($siswaBimbingan);
        $totalSedangMagang   = count(array_filter($magangBimbingan, fn($m) => strtolower($m['status']) === 'berlangsung'));
        $totalMagangSelesai  = count(array_filter($magangBimbingan, fn($m) => strtolower($m['status']) === 'selesai'));

        // Menunggu penempatan: siswa bimbingan tanpa magang 'berlangsung' atau 'selesai'
        $siswaMenunggu = array_filter($siswaBimbingan, function($s) use ($magangBimbingan) {
            foreach ($magangBimbingan as $m) {
                if ($m['siswa_id'] == $s['id'] && in_array(strtolower($m['status']), ['berlangsung','selesai'])) {
                    return false;
                }
            }
            return true;
        });
        $totalMenunggu = count($siswaMenunggu);

        // Recent Magang
        $recentMagang = $magangModel
            ->select('magang.*, siswa.nama AS nama_siswa, siswa.jurusan, dudi.nama_perusahaan AS nama_dudi')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('magang.guru_id', $guru_id)
            ->orderBy('magang.created_at', 'DESC')
            ->limit(4)
            ->findAll();

        // Recent DUDI
        $recentDudi = $dudiModel
            ->select('dudi.*, COUNT(magang.id) AS jumlah_siswa')
            ->join('magang', 'magang.dudi_id = dudi.id', 'left')
            ->where('dudi.guru_id', $guru_id)
            ->groupBy('dudi.id')
            ->orderBy('dudi.created_at', 'DESC')
            ->findAll();    

        // Recent Logbook
        $recentLogbook = $logbookModel
            ->select('logbook.*, magang.siswa_id, magang.dudi_id')
            ->join('magang', 'magang.id = logbook.magang_id')
            ->where('magang.guru_id', $guru_id)
            ->orderBy('logbook.created_at', 'DESC')
            ->limit(4)
            ->findAll();

        // Semua DUDI & rata-rata siswa per DUDI
        $allDudi = $dudiModel
            ->select('dudi.*, COUNT(magang.id) AS jumlah_siswa')
            ->join('magang', 'magang.dudi_id = dudi.id', 'left')
            ->where('dudi.guru_id', $guru_id)
            ->groupBy('dudi.id')
            ->orderBy('dudi.created_at', 'DESC')
            ->findAll();

        $rataRataSiswaPerDudi = count($allDudi) > 0 
            ? round(array_sum(array_column($allDudi, 'jumlah_siswa')) / count($allDudi), 2)
            : 0;

        $magangBimbingan = $magangModel
            ->select('magang.*, 
                     siswa.nama AS nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan, 
                     guru.nama AS nama_guru, guru.nip, 
                     dudi.nama_perusahaan AS nama_dudi, dudi.alamat AS alamat_dudi, dudi.penanggung_jawab')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('guru', 'guru.id = magang.guru_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('magang.guru_id', $guru_id)
            ->orderBy('magang.tanggal_mulai', 'DESC')
            ->findAll();

        // Total logbook guru ini
        $totalLogbook = $logbookModel
            ->join('magang', 'magang.id = logbook.magang_id')
            ->where('magang.guru_id', $guru_id)
            ->where('logbook.deleted_at', null)
            ->countAllResults();

        // Belum diverifikasi (status_verifikasi = null atau 'pending') untuk guru ini
        $totalBelumDiverifikasi = $logbookModel
            ->join('magang', 'magang.id = logbook.magang_id')
            ->where('magang.guru_id', $guru_id)
            ->where('status_verifikasi', 'pending')
            ->where('logbook.deleted_at', null)
            ->countAllResults();

        // Disetujui (status_verifikasi = 'disetujui') untuk guru ini
        $totalDisetujui = $logbookModel
            ->join('magang', 'magang.id = logbook.magang_id')
            ->where('magang.guru_id', $guru_id)
            ->where('status_verifikasi', 'disetujui')
            ->where('logbook.deleted_at', null)
            ->countAllResults();

        // Ditolak (status_verifikasi = 'ditolak') untuk guru ini
        $totalDitolak = $logbookModel
            ->join('magang', 'magang.id = logbook.magang_id')
            ->where('magang.guru_id', $guru_id)
            ->where('status_verifikasi', 'ditolak')
            ->where('logbook.deleted_at', null)
            ->countAllResults();

        $dudiList = $this->dudiModel
            ->where('guru_id', session()->get('guru_id')) // cuma DUDI yang dia ampu
            ->findAll();
        
        // Kirim ke view
        $data = [
            // Stats Magang / Siswa
            'totalSiswaBimbingan' => $totalSiswaBimbingan,
            'totalSedangMagang'   => $totalSedangMagang,
            'totalMagangSelesai'  => $totalMagangSelesai,
            'totalMenunggu'       => $totalMenunggu,
        
            // Stats Logbook
            'totalLogbook'          => $totalLogbook,
            'totalBelumDiverifikasi'=> $totalBelumDiverifikasi,
            'totalDisetujui'        => $totalDisetujui,
            'totalDitolak'          => $totalDitolak,
        
            // Data lain
            'guru'                => $guru,
            'recentMagang'        => $recentMagang,
            'recentDudi'          => $recentDudi,
            'recentLogbook'       => $recentLogbook,
            'allDudi'             => $allDudi,
            'rataRataSiswaPerDudi'=> $rataRataSiswaPerDudi,
            'magangBimbingan'     => $magangBimbingan,
            'siswaList'           => $siswaModel->findAll(), 
            'dudiList'            => $dudiList,
            'logbookList'         => $logbookList,
            'uri'                 => $uri->getPath()
        ];
        
        return view($view, $data);
    }

    public function getMagang($id)
    {
        $magangModel = new \App\Models\MagangModel();

        $magang = $magangModel
            ->select('magang.*, 
                    siswa.nama AS nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan, 
                    guru.nama AS nama_guru, guru.nip, 
                    dudi.nama_perusahaan, dudi.alamat, dudi.telepon, dudi.email, dudi.penanggung_jawab')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('guru', 'guru.id = magang.guru_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('magang.id', $id)
            ->first();

        if (!$magang) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data magang tidak ditemukan'
            ]);
        }

        return $this->response->setJSON($magang);
    }

    public function updateMagang($id)
    {
        $magangModel = new MagangModel();
        
        // Ambil data magang yang akan diupdate (untuk ambil siswa_id)
        $magang = $magangModel->find($id);
        if (!$magang) {
            return $this->response->setJSON(['error' => 'Data magang tidak ditemukan']);
        }
        
        $data = $this->request->getJSON(true);

        $updateData = [
            'tanggal_mulai'   => $data['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $data['tanggal_selesai'] ?? null,
            'status'          => $data['status'] ?? 'pending',
            'nilai_akhir'     => ($data['status'] === 'selesai') ? $data['nilai_akhir'] : null,
            'guru_id'         => session()->get('guru_id')
        ];

        // Update data magang
        $magangModel->update($id, $updateData);

        // Jika status diubah jadi 'berlangsung', batalkan pendaftaran lain yang pending
        if ($updateData['status'] === 'berlangsung') {
            $siswaId = $magang['siswa_id'];
            
            // Cari semua pendaftaran siswa yang sama, selain yang ini, dan masih pending
            $pendaftaranLain = $magangModel
                ->where('siswa_id', $siswaId)
                ->where('id !=', $id)
                ->where('status', 'pending')
                ->findAll();
            
            // Update satu per satu jadi dibatalkan
            foreach ($pendaftaranLain as $p) {
                $magangModel->update($p['id'], ['status' => 'dibatalkan']);
            }
        }

        return $this->response->setJSON(['success' => 'Data magang berhasil diperbarui']);
    }

    public function addMagang()
    {
        $data = $this->request->getJSON(true);

        // gunakan user_id biar konsisten
        $data['guru_id'] = session()->get('guru_id'); 

        $data['status'] = 'berlangsung';

        $magangModel = new MagangModel();

        if ($magangModel->insert($data)) {
            return $this->response->setJSON([
                'success' => 'Data magang berhasil ditambahkan'
            ]);
        } else {
            return $this->response->setJSON([
                'error' => 'Gagal menambahkan data magang'
            ]);
        }
    }

    public function deleteMagang($id)
    {
        $this->magangModel->delete($id);
        return $this->response->setJSON(['success' => 'User berhasil dihapus']);
    }

    public function getLogbook($id)
    {
        $logbookModel = new \App\Models\LogbookModel();

        $logbook = $logbookModel
            ->select('logbook.*, 
                    magang.siswa_id, 
                    siswa.nama AS nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan, 
                    guru.nama AS nama_guru, guru.nip')
            ->join('magang', 'magang.id = logbook.magang_id')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('guru', 'guru.id = magang.guru_id')
            ->where('logbook.id', $id)
            ->first();

        if (!$logbook) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Logbook tidak ditemukan'
            ]);
        }

        return $this->response->setJSON($logbook);
    }

    public function detailJurnal($id)
    {
        $model = new \App\Models\LogbookModel();
        $logbook = $model
            ->withDeleted()
            ->find($id);

        if (!$logbook) {
            return $this->response->setJSON(['error' => 'Data jurnal tidak ditemukan']);
        }

        return $this->response->setJSON($logbook);
    }

    public function updateJurnal($id)
    {
        $data = $this->request->getJSON(true);

        $model = new \App\Models\LogbookModel();
        $update = [
            'status_verifikasi' => $data['status_verifikasi'],
            'catatan_guru'      => $data['catatan_guru'] ?? null,
            'updated_at'        => date('Y-m-d H:i:s')
        ];

        $model->update($id, $update);

        return $this->response->setJSON(['success' => true]);
    }

    public function getSchool()
    {
        $school = $this->schoolModel->first();
        return $this->response->setJSON($school);
    }

    public function verifikasi($magangId)
    {
        $magang = $this->magangModel->find($magangId);
        if (!$magang) {
            return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan');
        }

        $siswaId = $magang['siswa_id'];

        // Set pendaftaran ini jadi berlangsung
        $this->magangModel->update($magangId, [
            'status' => 'berlangsung'
        ]);

        // Batalkan semua pendaftaran lain yang masih pending
        $this->magangModel
            ->where('siswa_id', $siswaId)
            ->where('id !=', $magangId)
            ->where('status', 'pending')
            ->set(['status' => 'dibatalkan'])
            ->update();  // Ini akan update semua row yang match dengan kondisi where

        return redirect()->back()->with('success', 'Pendaftaran berhasil diverifikasi dan pendaftaran lain dibatalkan otomatis.');
    }
}
