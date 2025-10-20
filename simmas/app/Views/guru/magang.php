<?= $this->extend('guru/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        margin-bottom: 12px;
    }

    .stat-card:nth-child(1) .stat-icon { background: #3b82f6; }
    .stat-card:nth-child(2) .stat-icon { background: #8b5cf6; }
    .stat-card:nth-child(3) .stat-icon { background: #f59e0b; }
    .stat-card:nth-child(4) .stat-icon { background: #ec4899; }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 14px;
    }

    /* Student List */
    .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.875rem;
        }

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .student-info {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .student-name {
            font-weight: 600;
            color: #1e293b;
        }

        .student-nis {
            font-size: 0.75rem;
            color: #64748b;
        }

        .student-class {
            font-size: 0.75rem;
            color: #64748b;
        }

        .company-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .company-icon {
            width: 32px;
            height: 32px;
            background: #f1f5f9;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .company-details {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }

        .company-name {
            font-weight: 500;
            color: #1e293b;
        }

        .company-location {
            font-size: 0.75rem;
            color: #64748b;
        }

        .teacher-info {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }

        .teacher-name {
            color: #1e293b;
        }

        .period-info {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }

        .period-duration {
            font-size: 0.75rem;
            color: #64748b;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-aktif {
            background: #d1fae5;
            color: #065f46;
        }

        .status-selesai {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-ditolak {
            background: #fee2e2;  /* merah lembut */
            color: #991b1b;       /* teks merah tua */
        }

        .status-dibatalkan {
            background: #f3f4f6;  /* abu-abu muda */
            color: #374151;       /* teks abu-abu tua */
        }


        .score-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            border: none;
            background: #f1f5f9;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .btn-icon:hover {
            background: #e2e8f0;
        }

    @media (max-width: 768px) {
        .main-content {
            padding: 16px;
        }

        .student-body {
            grid-template-columns: 1fr;
        }

        .controls {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-search input {
            width: 100%;
        }
    }

    .custom-swal-form {
        text-align: left;
        padding: 10px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
    }
    
    .form-label .icon {
        font-size: 16px;
    }
    
    .required::after {
        content: "*";
        color: #ef4444;
        margin-left: 4px;
    }
    
    .swal2-input,
    .swal2-textarea,
    .swal2-select {
        width: 100% !important;
        padding: 10px 14px !important;
        border: 1.5px solid #e2e8f0 !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        transition: all 0.2s !important;
        background: #f8fafc !important;
        box-sizing: border-box !important;
        margin: 0 !important;
    }
    
    .swal2-input:focus,
    .swal2-textarea:focus,
    .swal2-select:focus {
        outline: none !important;
        border-color: #0ea5e9 !important;
        background: white !important;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1) !important;
    }
    
    .swal2-textarea {
        min-height: 80px !important;
        resize: vertical !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    }
    
    .swal2-select {
        cursor: pointer !important;
    }
    
    /* Custom SweetAlert2 styling */
    .swal2-popup {
        border-radius: 16px !important;
        padding: 24px !important;
    }
    
    .swal2-title {
        font-size: 22px !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        margin-bottom: 8px !important;
    }
    
    .swal2-html-container {
        margin: 20px 0 !important;
    }
    
    .swal2-actions {
        gap: 12px !important;
        margin-top: 24px !important;
    }
    
    .swal2-confirm {
        background: #10b981 !important;
        border-radius: 8px !important;
        padding: 10px 24px !important;
        font-weight: 500 !important;
        box-shadow: none !important;
    }
    
    .swal2-confirm:hover {
        background: #059669 !important;
    }
    
    .swal2-cancel {
        background: #f1f5f9 !important;
        color: #475569 !important;
        border-radius: 8px !important;
        padding: 10px 24px !important;
        font-weight: 500 !important;
        box-shadow: none !important;
    }
    
    .swal2-cancel:hover {
        background: #e2e8f0 !important;
    }
    
    .swal2-validation-message {
        background: #fee2e2 !important;
        color: #991b1b !important;
        border: none !important;
        border-radius: 8px !important;
        font-size: 13px !important;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="magang">
    <main class="main-content">
        <div class="header">
            <div class="header-left">
                <h1>Manajemen Siswa Magang</h1>
                <p class="header-subtitle">Kelola data siswa yang sedang magang</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($guru['nama']) ?></div>
                <span class="user-role">Pembimbing</span>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👨‍🎓</div>
                <div class="stat-number"><?= $totalSiswaBimbingan ?></div>
                <div class="stat-label">Siswa bimbingan</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-number"><?= $totalSedangMagang ?></div>
                <div class="stat-label">Sedang magang</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏳</div>
                <div class="stat-number"><?= $totalMagangSelesai ?></div>
                <div class="stat-label">Magang selesai</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏸️</div>
                <div class="stat-number"><?= $totalMenunggu ?></div>
                <div class="stat-label">Menunggu penempatan</div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <div class="panel-title-section">
                    <span class="panel-icon">📋</span>
                    <span class="panel-title">Daftar Siswa Magang</span>
                </div>
                <button class="btn-tambah" onclick="tambahMagang()">
                    + Tambah
                </button>
            </div>

            <div class="panel-content">
                <div class="controls">
                    <div class="entries-control">
                        <span>Tampilkan:</span>
                        <select>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>entri</span>
                    </div>
                <div class="filter-controls">
                    <select id="filterStatus" class="filter-select" onchange="filterTable()">
                        <option value="">Semua Status</option>
                        <option value="berlangsung">Aktif</option>
                        <option value="selesai">Selesai</option>
                        <option value="pending">Pending</option>
                    </select>

                    <select id="filterDudi" class="filter-select" onchange="filterTable()">
                        <option value="">Semua Perusahaan</option>
                        <?php foreach ($dudiList as $dudi): ?>
                            <option value="<?= esc($dudi['nama_perusahaan']) ?>"><?= esc($dudi['nama_perusahaan']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" placeholder="Cari siswa, dudi pembimbing..." onkeyup="searchTable()">
                </div>
            </div>


                <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Penanggung Jawab</th>
                            <th>DUDI</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="magangTableBody">
                    <?php foreach ($magangBimbingan as $magang): ?>
                        <tr id="magang-<?= $magang['id'] ?>">
                            <td>
                                <div class="student-info">
                                    <div class="student-name"><?= esc($magang['nama_siswa']) ?></div>
                                    <div class="student-nis">NIS: <?= esc($magang['nis'] ?? '-') ?></div>
                                    <div class="student-class"><?= esc($magang['kelas'] ?? '-') ?> • <?= esc($magang['jurusan'] ?? '-') ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="teacher-info">
                                    <div class="teacher-name"><?= esc($magang['penanggung_jawab'] ?? '-') ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="company-info">
                                    <div class="company-icon">🏢</div>
                                    <div class="company-details">
                                        <div class="company-name"><?= esc($magang['nama_dudi']) ?></div>
                                        <div class="company-location"><?= esc($magang['alamat_dudi'] ?? '-') ?></div>
                                        <div class="company-location"><?= esc($magang['penanggung_jawab'] ?? '-') ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="period-info">
                                    <?php if (strtolower($magang['status']) === 'pending'): ?>
                                        <div class="period-duration">-</div>
                                        <div class="period-duration">-</div>
                                    <?php else: ?>
                                        <div class="period-duration"><?= date('j M Y', strtotime($magang['tanggal_mulai'])) ?> s.d <?= date('j M Y', strtotime($magang['tanggal_selesai'])) ?></div>
                                        <div class="period-duration">
                                            <?php 
                                            $start = strtotime($magang['tanggal_mulai']);
                                            $end   = strtotime($magang['tanggal_selesai']);
                                            echo ceil(($end - $start)/86400) . ' hari';
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <td>
                                <?php
                                $statusClass = match(strtolower($magang['status'])) {
                                    'berlangsung', 'diterima' => 'status-aktif',
                                    'pending' => 'status-pending',
                                    'selesai' => 'status-selesai',
                                    'ditolak', 'dibatalkan' => 'status-ditolak',
                                    default => 'status-default'
                                };
                                ?>
                                <span class="status-badge <?= $statusClass ?>"><?= ucfirst($magang['status']) ?></span>                           
                            </td>
                            <td>
                                <span class="score-badge score-high"><?= esc($magang['nilai_akhir'] ?? '-') ?></span>
                            </td>
                            <td>
                                <div class="actions">
                                    <button class="btn-icon" title="Detail" onclick="detailMagang(<?= $magang['id'] ?>)">👁️</button>
                                    <button class="btn-icon" title="Edit" onclick="editMagang(<?= $magang['id'] ?>)">✏️</button>
                                    <button class="btn-icon" title="Hapus" onclick="deleteMagang(<?= $magang['id'] ?>)">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <div class="pagination-info">
                    <span id="paginationInfo">Menampilkan 1 sampai 2 dari 2 entri</span>
                </div>
                <div class="pagination-controls" id="paginationControls">
                    <button class="pagination-btn pagination-nav" onclick="previousPage()" disabled>◀</button>
                    <button class="pagination-btn active" onclick="goToPage(1)">1</button>
                    <button class="pagination-btn pagination-nav" onclick="nextPage()" disabled>▶</button>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script> 
    function detailMagang(magangId) {
        fetch(`/guru/get-magang/${magangId}`)
            .then(res => res.json())
            .then(data => {
                let periodeHtml = '';
                if (data.status.toLowerCase() === 'pending') {
                    periodeHtml = `
                        <tr><th>Periode</th><td>-</td></tr>
                        <tr><th>Durasi</th><td>-</td></tr>
                    `;
                } else {
                    const start = new Date(data.tanggal_mulai);
                    const end   = new Date(data.tanggal_selesai);
                    const diff  = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                    periodeHtml = `
                        <tr><th>Periode</th><td>${start.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })} 
                        s.d ${end.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}</td></tr>
                        <tr><th>Durasi</th><td>${diff} hari</td></tr>
                    `;
                }

                Swal.fire({
                    title: 'Detail Magang',
                    html: `
                        <table class="table table-bordered text-start">
                            <tr><th>Nama Siswa</th><td>${data.nama_siswa} (NIS: ${data.nis ?? '-'})</td></tr>
                            <tr><th>Kelas/Jurusan</th><td>${data.kelas ?? '-'} • ${data.jurusan ?? '-'}</td></tr>
                            <tr><th>Guru Pembimbing</th><td>${data.nama_guru ?? '-'} (NIP: ${data.nip ?? '-'})</td></tr>
                            <tr><th>Perusahaan</th><td>${data.nama_perusahaan}</td></tr>
                            <tr><th>Alamat</th><td>${data.alamat ?? '-'}</td></tr>
                            <tr><th>Penanggung Jawab</th><td>${data.penanggung_jawab ?? '-'}</td></tr>
                            ${periodeHtml}
                            <tr><th>Status</th><td>${data.status}</td></tr>
                            <tr><th>Nilai Akhir</th><td>${data.nilai_akhir ?? '-'}</td></tr>
                        </table>
                    `,
                    width: 700,
                    icon: 'info'
                });
            });
    }

    function editMagang(magangId) {
        fetch(`/guru/get-magang/${magangId}`)
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    title: '✏️ Edit Data Siswa Magang',
                    html: `
                        <div class="custom-swal-form">
                            <!-- Periode & Status -->
                            <div class="form-group">
                                <label class="form-label">📅 Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" class="swal2-input" value="${data.tanggal_mulai ?? ''}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">📅 Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" class="swal2-input" value="${data.tanggal_selesai ?? ''}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">🔄 Status</label>
                                <select id="status" class="swal2-select">
                                    <option value="pending" ${data.status === 'pending' ? 'selected' : ''}>⏳ Pending</option>
                                    <option value="berlangsung" ${data.status === 'berlangsung'   ? 'selected' : ''}>✅ Aktif</option>
                                    <option value="ditolak" ${data.status === 'ditolak' ? 'selected' : ''}>❌ ditolak</option>
                                    <option value="dibatalkan" ${data.status === 'dibatalkan' ? 'selected' : ''}>🛑 dibatalkan</option>
                                    <option value="selesai" ${data.status === 'selesai' ? 'selected' : ''}>🏁 Selesai</option>
                                </select>
                            </div>

                            <!-- Penilaian -->
                            <div class="form-group">
                                <label class="form-label">📊 Nilai Akhir</label>
                                <input type="number" id="nilai_akhir" class="swal2-input" value="${data.nilai_akhir ?? ''}" 
                                    placeholder="Isi nilai akhir" ${data.status === 'selesai' ? '' : 'disabled'}>
                                <small class="text-muted">Nilai hanya bisa diisi jika status Selesai</small>
                            </div>
                        </div>
                    `,
                    width: '600px',
                    showCancelButton: true,
                    confirmButtonText: '💾 Simpan',
                    cancelButtonText: '✖️ Batal',
                    didOpen: () => {
                        // toggle nilai akhir ketika status berubah
                        const statusSelect = Swal.getPopup().querySelector('#status');
                        const nilaiInput   = Swal.getPopup().querySelector('#nilai_akhir');

                        statusSelect.addEventListener('change', () => {
                            if (statusSelect.value === 'selesai') {
                                nilaiInput.removeAttribute('disabled');
                            } else {
                                nilaiInput.setAttribute('disabled', true);
                                nilaiInput.value = '';
                            }
                        });
                    },
                    preConfirm: () => {
                        return {
                            tanggal_mulai: document.getElementById('tanggal_mulai').value,
                            tanggal_selesai: document.getElementById('tanggal_selesai').value,
                            status: document.getElementById('status').value,
                            nilai_akhir: document.getElementById('nilai_akhir').value
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/guru/update-magang/${magangId}`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(result.value)
                        })
                        .then(res => res.json())
                        .then(resp => {
                            if (resp.success) {
                                Swal.fire('✅ Berhasil', resp.success, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('❌ Gagal', resp.error, 'error');
                            }
                        });
                    }
                });
            });
    }

    window.siswaList = <?= json_encode($siswaList) ?>;
    window.dudiList  = <?= json_encode($dudiList) ?>;   

    function tambahMagang() {
        Swal.fire({
            title: '+ Tambah Data Magang',
            html: `
                <div class="custom-swal-form">
                    <!-- Pilih Siswa -->
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">👨‍🎓</span>
                            <span>Siswa</span>
                        </label>
                        <select id="siswa_id" class="swal2-select">
                            ${window.siswaList.map(s => `<option value="${s.id}">${s.nama} - ${s.kelas} (${s.jurusan})</option>`).join('')}
                        </select>
                    </div>

                    <!-- Pilih DUDI -->
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">🏢</span>
                            <span>Tempat Magang (DUDI)</span>
                        </label>
                        <select id="dudi_id" class="swal2-select">
                            ${window.dudiList.map(d => `<option value="${d.id}">${d.nama_perusahaan}</option>`).join('')}
                        </select>
                    </div>

                    <!-- Periode -->
                    <div class="form-group">
                        <label class="form-label">📅 Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" class="swal2-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label">📅 Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" class="swal2-input">
                    </div>

                    <!-- Info otomatis -->
                    <small style="display:block; margin-top:10px; color:#d9534f; font-size:13px;">
                        ⚠️ Status magang otomatis <b>Aktif</b> dan guru pembimbing otomatis sesuai akun login Anda.
                    </small>
                </div>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                return {
                    siswa_id: document.getElementById('siswa_id').value,
                    dudi_id: document.getElementById('dudi_id').value,
                    tanggal_mulai: document.getElementById('tanggal_mulai').value,
                    tanggal_selesai: document.getElementById('tanggal_selesai').value,
                    status: "berlangsung" // default
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/guru/add-magang`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(result.value)
                })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: resp.success,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => location.reload());
                    } else {
                        Swal.fire('Error', resp.error, 'error');
                    }
                });
            }
        });
    }

    function deleteMagang(magangId) {
        Swal.fire({
            title: 'Yakin?',
            text: "Data magang akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/guru/delete-magang/${magangId}`, { method: 'POST' })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        Swal.fire('✅ Berhasil', resp.success, 'success');

                        // Hapus row dari tabel atau elemen yang sesuai
                        const row = document.getElementById(`magang-${magangId}`);
                        if (row) row.remove();
                    } else {
                        Swal.fire('❌ Gagal', resp.error, 'error');
                    }
                });
            }
        });
    }

    /**
     * Filter Management for Magang Table
     * Handles filtering by status, company, and search
     */

    // Main filter function
    function filterTable() {
        const searchValue = document.getElementById('searchInput').value.toLowerCase().trim();
        const statusValue = document.getElementById('filterStatus').value.toLowerCase().trim();
        const dudiValue = document.getElementById('filterDudi').value.toLowerCase().trim();
        
        const table = document.getElementById('magangTableBody');
        const rows = table.getElementsByTagName('tr');
        let visibleCount = 0;

        // Loop through all table rows
        for (let row of rows) {
            // Get data from each column
            const studentName = row.querySelector('.student-name')?.textContent.toLowerCase() || '';
            const studentNis = row.querySelector('.student-nis')?.textContent.toLowerCase() || '';
            const teacherName = row.querySelector('.teacher-name')?.textContent.toLowerCase() || '';
            const companyName = row.querySelector('.company-name')?.textContent.toLowerCase() || '';
            const status = row.querySelector('.status-badge')?.textContent.toLowerCase().trim() || '';
            
            // Check if row matches search criteria
            const matchSearch = searchValue === '' || 
                studentName.includes(searchValue) || 
                studentNis.includes(searchValue) ||
                teacherName.includes(searchValue) ||
                companyName.includes(searchValue);
            
            // Check if row matches status filter
            const matchStatus = statusValue === '' || status === statusValue;
            
            // Check if row matches company filter
            const matchDudi = dudiValue === '' || companyName === dudiValue;

            // Show/hide row based on all filter criteria
            if (matchSearch && matchStatus && matchDudi) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        }

        // Update pagination info with filtered count
            updatePaginationInfo(visibleCount);
        }

        // Reset all filters to default
        function resetFilters() {
            // Clear all filter inputs
            document.getElementById('searchInput').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterDudi').value = '';
            
            // Re-apply filter (will show all rows)
            filterTable();
            
            // Optional: Show notification
            showResetNotification();
        }

        // Update pagination information
        function updatePaginationInfo(count) {
            const paginationInfo = document.getElementById('paginationInfo');
            
            if (!paginationInfo) return;
            
            if (count === 0) {
                paginationInfo.textContent = 'Tidak ada data yang cocok dengan filter';
                paginationInfo.style.color = '#dc2626';
            } else {
                const totalRows = document.querySelectorAll('#magangTableBody tr').length;
                paginationInfo.textContent = `Menampilkan ${count} dari ${totalRows} entri`;
                paginationInfo.style.color = '#64748b';
            }
        }

        // Show notification when filters are reset
        function showResetNotification() {
            // Create notification element
            const notification = document.createElement('div');
            notification.textContent = '✓ Filter direset';
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #10b981;
                color: white;
                padding: 12px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 9999;
                animation: slideIn 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 2 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 2000);
        }

        // Add CSS animations for notification
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Initialize filters on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Get initial row count
            const totalRows = document.querySelectorAll('#magangTableBody tr').length;
            updatePaginationInfo(totalRows);
            
            // Add event listeners to all filter elements
            const searchInput = document.getElementById('searchInput');
            const filterStatus = document.getElementById('filterStatus');
            const filterDudi = document.getElementById('filterDudi');
            
            if (searchInput) {
                searchInput.addEventListener('input', filterTable);
            }
            
            if (filterStatus) {
                filterStatus.addEventListener('change', filterTable);
            }
            
            if (filterDudi) {
                filterDudi.addEventListener('change', filterTable);
            }
        });

        // Export functions for global use
        window.filterTable = filterTable;
        window.resetFilters = resetFilters;
        window.updatePaginationInfo = updatePaginationInfo;

</script>
<?= $this->endSection() ?>