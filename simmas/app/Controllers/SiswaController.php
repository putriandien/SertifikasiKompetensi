<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;
use App\Models\DudiModel;
use App\Models\MagangModel;
use App\Models\LogbookModel;

class SiswaController extends Controller
{
    protected $siswaModel;
    protected $dudiModel;
    protected $magangModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->dudiModel  = new DudiModel();
        $this->magangModel = new MagangModel();
    }

    public function index()
    {
        $uri = service('uri');
        $segment2 = $uri->getSegment(2);

        $view = match($segment2) {
            'dashboard'       => 'siswa/dashboard',
            'dudi'            => 'siswa/dudi',
            'jurnal-harian'   => 'siswa/jurnal-harian',
            'magang'          => 'siswa/magang',
            default           => 'siswa/dashboard'
        };

        $siswaId = session()->get('siswa_id');
        $siswa   = $this->siswaModel->find($siswaId) ?? ['nama' => 'Guest'];
        
        $sudahDiterimaAktif = $this->magangModel
            ->where('siswa_id', $siswaId)
            ->where('status', 'berlangsung')
            ->first() ? true : false;

        // Ambil semua DUDI
        $dudiList = $this->dudiModel->findAll();

        // === Tambahkan di sini ===
        foreach ($dudiList as &$dudi) {
            $magang = $this->magangModel
                ->where('siswa_id', $siswaId)
                ->where('dudi_id', $dudi['id'])
                ->first();
        
            if ($magang) {
                $dudi['sudah_daftar'] = true;
                $dudi['status'] = $magang['status']; // pending / aktif / ditolak
            } else {
                $dudi['sudah_daftar'] = false;
                $dudi['status'] = null;
            }
        
            $dudi['sisa_kuota'] = $dudi['kuota'] - $this->magangModel
                ->where('dudi_id', $dudi['id'])
                ->where('status', 'berlangsung')
                ->countAllResults();
        }
        

        $statusPendaftaran = $this->getStatusPendaftaran($siswaId);
        
        $magang = $this->magangModel
            ->select('magang.*, siswa.nama as nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan, dudi.nama_perusahaan, dudi.alamat')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('magang.siswa_id', $siswaId)
            ->whereIn('magang.status', ['berlangsung', 'diterima', 'pending'])
            ->orderBy("CASE 
                            WHEN magang.status='berlangsung' THEN 1
                            WHEN magang.status='diterima' THEN 2
                            WHEN magang.status='pending' THEN 3
                            ELSE 4
                        END", 'ASC')
            ->orderBy('magang.created_at', 'DESC')
            ->first();

        $session = session();
        $siswaId = $session->get('siswa_id'); // ambil id siswa dari session

        $logbookModel = new LogbookModel();
        $magangId = $magang ? $magang['id'] : null;
        
        $total = $disetujui = $menunggu = $ditolak = 0;
        $logbookData = [];
        
        if ($magangId) {
            // Total jurnal milik siswa login
            $total = $logbookModel->where('magang_id', $magangId)->countAllResults();
        
            // Hitung berdasarkan status
            $disetujui = $logbookModel->where('magang_id', $magangId)
                ->where('status_verifikasi', 'disetujui')
                ->countAllResults();
        
            $menunggu = $logbookModel->where('magang_id', $magangId)
                ->where('status_verifikasi', 'pending')
                ->countAllResults();
        
            $ditolak = $logbookModel->where('magang_id', $magangId)
                ->where('status_verifikasi', 'ditolak')
                ->countAllResults();
        
            // Ambil semua logbook siswa login
            $logbookData = $logbookModel
                ->where('magang_id', $magangId)
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }
        
        $statusMagangAktif = $this->magangModel
            ->where('siswa_id', $siswaId)
            ->orderBy('id', 'DESC')
            ->first()['status'] ?? 'belum_mulai';

        $logbookModel = new LogbookModel();
        $hariIni = date('Y-m-d');
        $magangId = $magang ? $magang['id'] : null;
        
        $jurnalHariIni = null;
        if ($magangId) {
            $jurnalHariIni = $logbookModel
                ->where('magang_id', $magangId)
                ->where('tanggal', $hariIni)
                ->first();
        }
        $showReminder = ($statusMagangAktif === 'berlangsung' && !$jurnalHariIni);

        $data = [
            'uri' => $uri->getPath(),
            'siswa' => $siswa,
            'dudiList' => $dudiList,
            'sudahDaftar' => $statusPendaftaran['sudahDaftar'],
            'sisaKuota'   => $statusPendaftaran['sisaKuota'],
            'totalMaksimal' => $statusPendaftaran['totalMaksimal'],
            'magang' => $magang,
            'total'     => $total,
            'disetujui' => $disetujui,
            'menunggu'  => $menunggu,
            'ditolak'   => $ditolak,
            'logbook'   => $logbookData,
            'sudahDiterimaAktif' => $sudahDiterimaAktif,
            'statusMagang' => $statusMagangAktif,
            'showReminder' => $showReminder
        ];

        return view($view, $data);
    }


    protected function getDudiListWithQuota()
    {
        $dudiList = $this->dudiModel->findAll();

        foreach ($dudiList as &$dudi) {
            $sudahDipakai = $this->magangModel
                ->where('dudi_id', $dudi['id'])
                ->countAllResults();

            $dudi['sisa_kuota'] = $dudi['kuota'] - $sudahDipakai;
        }

        return $dudiList;
    }

    protected function getStatusPendaftaran($siswaId)
    {
        $sudahDaftar = $this->magangModel->where('siswa_id', $siswaId)->countAllResults();
        $totalMaksimal = 3;
        $sisaKuota = $totalMaksimal - $sudahDaftar;

        return [
            'sudahDaftar' => $sudahDaftar,
            'sisaKuota' => $sisaKuota,
            'totalMaksimal' => $totalMaksimal
        ];
    }

    public function daftarMagang($dudiId)
    {
        $userId = session()->get('siswa_id');
        if (!$userId) {
            return $this->response->setJSON(['error' => 'Anda belum login'])->setStatusCode(403);
        }

        $siswa  = $this->siswaModel->where('id', $userId)->first();
        if (!$siswa) {
            return $this->response->setJSON(['error' => 'Data siswa tidak ditemukan'])->setStatusCode(404);
        }
        $siswaId = $siswa['id'];

        // Ambil data DUDI
        $dudi = $this->dudiModel->find($dudiId);
        if (!$dudi) {
            return $this->response->setJSON(['error' => 'DUDI tidak ditemukan']);
        }

        // Cek sudah diterima di DUDI lain
        $sudahDiterima = $this->magangModel
            ->where('siswa_id', $siswaId)
            ->where('status', 'aktif')
            ->first();
        if ($sudahDiterima) {
            return $this->response->setJSON(['error' => 'Anda sudah diterima di DUDI lain.']);
        }

        // Cek kuota maksimal pendaftaran
        $jumlahPendaftaran = $this->magangModel
            ->where('siswa_id', $siswaId)
            ->countAllResults();
        if ($jumlahPendaftaran >= 3) {
            return $this->response->setJSON(['error' => 'Sudah mencapai batas maksimal pendaftaran.']);
        }

        // Cek sudah daftar di DUDI ini
        $sudahDaftar = $this->magangModel->where([
            'siswa_id' => $siswaId,
            'dudi_id'  => $dudiId
        ])->first();
        if ($sudahDaftar) {
            return $this->response->setJSON(['error' => 'Anda sudah daftar di DUDI ini']);
        }

        // Insert pendaftaran
        $this->magangModel->insert([
            'siswa_id' => $siswaId,
            'dudi_id'  => $dudiId,
            'guru_id'  => $dudi['guru_id'],
            'status'   => 'pending'
        ]);

        return $this->response->setJSON(['success' => 'Pendaftaran berhasil, menunggu verifikasi.']);
    }    

    public function addJurnal()
    {
        $logbookModel = new \App\Models\LogbookModel();

        $userId = session()->get('siswa_id');
        log_message('debug', '=== DEBUG ADD JURNAL ===');
        log_message('debug', 'Session siswa_id: ' . ($userId ?? 'KOSONG'));
        log_message('debug', 'All POST data: ' . json_encode($this->request->getPost()));
        log_message('debug', 'File received: ' . ($this->request->getFile('file')->getName() ?? 'TIDAK ADA'));
        
        $siswa = $this->siswaModel->find($userId);
        
        if (!$siswa) {
            log_message('error', 'Siswa dengan ID ' . $userId . ' tidak ditemukan');
            return $this->response->setJSON(['error' => 'Siswa tidak ditemukan']);
        }

        // Cek status magang
        $statusMagang = $this->magangModel
            ->where('siswa_id', $userId)
            ->where('status', 'berlangsung')
            ->first();

        log_message('debug', 'Status magang result: ' . ($statusMagang ? 'ADA' : 'TIDAK ADA'));
        if ($statusMagang) {
            log_message('debug', 'Magang ID: ' . $statusMagang['id'] . ', Status: ' . $statusMagang['status']);
        }

        if (!$statusMagang) {
            log_message('error', 'Tidak ada magang berlangsung untuk siswa ' . $userId);
            return $this->response->setJSON([
                'error' => 'Anda belum memulai magang, tidak dapat menambahkan jurnal.'
            ]);
        }

        // Ambil data dari form
        $tanggal  = $this->request->getPost('tanggal');
        $kegiatan = $this->request->getPost('kegiatan');
        $kendala  = $this->request->getPost('kendala');
        $file     = $this->request->getFile('file');

        if (empty($tanggal) || empty($kegiatan)) {
            return $this->response->setJSON(['error' => 'Tanggal dan kegiatan wajib diisi']);
        }

        $fileName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
            $ext = $file->getExtension();
            $fileName = $originalName . '_' . time() . '.' . $ext;
            $file->move(FCPATH . 'uploads/logbook', $fileName);
        }

        // Simpan ke database
        $logbookModel->insert([
            'magang_id'        => $statusMagang['id'],
            'tanggal'          => $tanggal,
            'kegiatan'         => $kegiatan,
            'kendala'          => $kendala,
            'status_verifikasi'=> 'pending',
            'file'             => $fileName,
            'created_at'       => date('Y-m-d H:i:s')
        ]);
    
        return $this->response->setJSON(['success' => 'Jurnal berhasil disimpan!']);
    
    }

    public function detailJurnal($id)
    {
        $logbookModel = new LogbookModel();

        $logbook = $logbookModel
            ->select('logbook.*, 
                    siswa.nama as nama_siswa, siswa.nis, siswa.kelas, siswa.jurusan,
                    dudi.nama_perusahaan as nama_perusahaan, dudi.alamat as alamat_perusahaan, dudi.penanggung_jawab, logbook.status_verifikasi')
            ->join('magang', 'magang.id = logbook.magang_id')
            ->join('siswa', 'siswa.id = magang.siswa_id')
            ->join('dudi', 'dudi.id = magang.dudi_id')
            ->where('logbook.id', $id)
            ->first();

        if (!$logbook) {
            return $this->response->setJSON([
                'error' => 'Data jurnal tidak ditemukan'
            ])->setStatusCode(404);
        }

        // Ambil nama file saja
        if (!empty($logbook['file'])) {
            $logbook['file'] = basename($logbook['file']);
        }

        return $this->response->setJSON($logbook);
    }

    public function updateJurnal($id)
    {
        $logbookModel = new LogbookModel();
        $jurnal = $logbookModel->find($id);

        if (!$jurnal) {
            return $this->response->setJSON(['error' => 'Jurnal tidak ditemukan'])->setStatusCode(404);
        }

        // Hanya boleh edit jika status pending/ditolak
        if (!in_array($jurnal['status_verifikasi'], ['pending', 'ditolak'])) {
            return $this->response->setJSON(['error' => 'Jurnal tidak dapat diedit'])->setStatusCode(403);
        }

        $data = [
            'kegiatan' => $this->request->getPost('kegiatan'),
            'kendala'  => $this->request->getPost('kendala'),
        ];

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $originalName = pathinfo($file->getName(), PATHINFO_FILENAME);
            $ext = $file->getExtension();
            $newName = $originalName . '_' . time() . '.' . $ext;

            $file->move(FCPATH . 'uploads/logbook', $newName);

            // Hapus file lama jika ada
            if (!empty($jurnal['file']) && file_exists(FCPATH . 'uploads/logbook/' . $jurnal['file'])) {
                unlink(FCPATH . 'uploads/logbook/' . $jurnal['file']);
            }

            $data['file'] = $newName;
        }


        // Jika upload file baru
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/logbook', $newName);

            // Hapus file lama jika ada
            if (!empty($jurnal['file']) && file_exists(FCPATH . 'uploads/logbook/' . $jurnal['file'])) {
                unlink(FCPATH . 'uploads/logbook/' . $jurnal['file']);
            }

            $data['file'] = $newName;
        }

        $logbookModel->update($id, $data);

        return $this->response->setJSON(['success' => true]);
    }

    public function deleteJurnal($id)
    {
        $logbookModel = new \App\Models\LogbookModel();

        $logbook = $logbookModel->find($id);
        if (!$logbook) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Jurnal tidak ditemukan'
            ]);
        }

        // Soft delete
        $logbookModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Jurnal berhasil dihapus'
        ]);
    }

    public function getSchool()
    {
        $school = $this->schoolModel->first();
        return $this->response->setJSON($school);
    }

}
