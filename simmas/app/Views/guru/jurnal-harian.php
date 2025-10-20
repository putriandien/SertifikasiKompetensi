<?= $this->extend('guru/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
    /* Filter Section */
    .filter-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 12px;
        margin-bottom: 20px;
        padding: 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .filter-label {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .filter-select {
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        color: #334155;
        background: white;
        cursor: pointer;
        transition: all 0.2s;
    }

    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .filter-select:hover {
        border-color: #cbd5e1;
    }

    .filter-actions {
        display: flex;
        gap: 8px;
        align-items: flex-end;
    }

    .btn-filter {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        flex: 1;
    }

    .btn-apply-filter {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .btn-apply-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-reset-filter {
        background: white;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .btn-reset-filter:hover {
        background: #f8fafc;
    }

    .active-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .filter-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 20px;
        font-size: 12px;
        color: #1e40af;
        font-weight: 500;
    }

    .filter-badge-remove {
        cursor: pointer;
        font-weight: bold;
        color: #1e40af;
        transition: color 0.2s;
    }

    .filter-badge-remove:hover {
        color: #dc2626;
    }

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

    .stat-card:nth-child(1) .stat-icon { background: #dbeafe; }
    .stat-card:nth-child(2) .stat-icon { background: #fed7aa; }
    .stat-card:nth-child(3) .stat-icon { background: #d1fae5; }
    .stat-card:nth-child(4) .stat-icon { background: #fecaca; }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 14px;
    }

    .main-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .table-container {
            overflow-x: auto;
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

        .student-meta {
            font-size: 0.75rem;
            color: #64748b;
        }

        .journal-content {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            line-height: 1.5;
        }

        .journal-section {
            margin-bottom: 0.75rem;
            overflow: hidden;
        }

        .journal-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .journal-text {
            color: #475569;
            line-height: 1.5;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .status-badge {
            display: inline-block;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-disetujui {
            background: #d1fae5;
            color: #065f46;
        }

        .status-pending {
            background: #fed7aa;
            color: #92400e;
        }

        .status-ditolak {
            background: #fecaca;
            color: #991b1b;
        }

        .catatan-guru {
            background: #fef3c7;
            padding: 0.75rem;
            border-radius: 6px;
            border-left: 3px solid #fbbf24;
            font-size: 0.875rem;
            color: #78350f;
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

    .page-btn {
        width: 36px;
        height: 36px;
        border: 1px solid #e2e8f0;
        background: white;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .page-btn:hover {
        border-color: #06b6d4;
        color: #06b6d4;
    }

    .page-btn.active {
        background: #06b6d4;
        color: white;
        border-color: #06b6d4;
    }

    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .table-container {
            overflow-x: scroll;
        }

        table {
            min-width: 1000px;
        }
    }

    @media (max-width: 640px) {
        body {
            padding: 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .controls {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            max-width: 100%;
        }

    }

    .detail-jurnal-guru {
        text-align: left;
        padding: 0 10px 10px;
        max-height: 450px;
        overflow-y: auto;
    }
    
    .detail-section-guru {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .section-title-guru {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 12px;
    }
    
    .section-title-guru .icon {
        font-size: 16px;
    }
    
    .detail-text-guru {
        color: #475569;
        white-space: pre-line;
        line-height: 1.6;
        font-size: 14px;
    }
    
    .date-display {
        padding: 14px 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .date-icon {
        font-size: 18px;
    }
    
    .date-text {
        font-size: 14px;
        color: #1e293b;
        font-weight: 500;
    }
    
    .doc-section-guru {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .doc-item-guru {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: #f0fdf4;
        border-radius: 6px;
        border: 1px solid #bbf7d0;
    }
    
    .doc-info-guru {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .doc-icon-guru {
        font-size: 20px;
    }
    
    .doc-name-guru {
        font-size: 13px;
        color: #166534;
        font-weight: 500;
    }
    
    .btn-download-guru {
        background: #10b981;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s;
        display: inline-block;
    }
    
    .btn-download-guru:hover {
        background: #059669;
        color: #fff;
    }
    
    .text-muted-guru {
        color: #94a3b8;
        font-style: italic;
        font-size: 13px;
    }
    
    .catatan-section {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: #fef3c7;
        border: 1px solid #fbbf24;
    }
    
    .catatan-section .section-title-guru {
        color: #92400e;
    }
    
    .swal2-textarea-guru {
        width: 100% !important;
        padding: 10px 14px !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        margin: 8px 0 0 0 !important;
        box-sizing: border-box !important;
        transition: all 0.2s !important;
        background: white !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        min-height: 100px !important;
        resize: vertical !important;
    }
    
    .swal2-textarea-guru:focus {
        outline: none !important;
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
    }
    
    .footer-info-guru {
        display: flex;
        justify-content: space-between;
        font-size: 11px;
        color: #94a3b8;
        padding-top: 16px;
        border-top: 1px solid #e2e8f0;
        margin-top: 20px;
    }
    
    .detail-jurnal-guru::-webkit-scrollbar {
        width: 6px;
    }
    
    .detail-jurnal-guru::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    
    .detail-jurnal-guru::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    .detail-jurnal-guru::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    .badge-deleted {
        display: inline-block;
        margin-left: 8px;
        padding: 2px 6px;
        background-color: #fee2e2;
        color: #991b1b;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        border: 1px solid #fecaca;
    }

    tr[style*="background-color: #f3f4f6"] {
        opacity: 0.6;
    }

    tr[style*="background-color: #f3f4f6"] .btn-icon:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="magang">
    <main class="main-content">
        <div class="header">
            <div class="header-left">
                <h1>Manajemen Jurnal Harian Magang</h1>
                <p class="header-subtitle">Pantau dan kelola jurnal harian siswa bimbingan Anda</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($guru['nama']) ?></div>
                <span class="user-role">Pembimbing</span>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-number"><?= $totalLogbook ?></div>
                <div class="stat-label">Total Logbook</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon icon-orange">⏳</div>
                <div class="stat-number"><?= $totalBelumDiverifikasi ?></div>
                <div class="stat-label">Belum Diverifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon stat-icon icon-blue">✅</div>
                <div class="stat-number"><?= $totalDisetujui ?></div>
                <div class="stat-label icon-green">Disetujui</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">❌</div>
                <div class="stat-number"><?= $totalDitolak ?></div>
                <div class="stat-label icon-red">Ditolak</div>
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
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select id="filterStatus" class="filter-select">
                            <option value="">Semua Status</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="pending">Menunggu</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Bulan</label>
                        <select id="filterBulan" class="filter-select">
                            <option value="">Semua Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Tahun</label>
                        <select id="filterTahun" class="filter-select">
                            <option value="">Semua Tahun</option>
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="btn-filter btn-apply-filter" onclick="terapkanFilter()">
                            Terapkan Filter
                        </button>
                        <button class="btn-filter btn-reset-filter" onclick="resetFilter()">
                            Reset
                        </button>
                    </div>
                </div>

                <!-- Active Filters -->
                <div id="activeFilters" class="active-filters" style="display: none;"></div>

                <!-- Controls -->
                <div class="controls">
                    <div class="entries-control">
                        <span>Tampilkan:</span>
                        <select id="entriesPerPage" onchange="changeEntriesPerPage()">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>entri</span>
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
                                <th>Siswa & Tanggal</th>
                                <th>Kegiatan & Kendala</th>
                                <th>Status</th>
                                <th>Catatan Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="jurnalTableBody">
                            <?php foreach ($logbookList as $log): ?>
                                <!-- Cek apakah jurnal sudah dihapus (soft delete) -->
                                <?php $isDeleted = !empty($log['deleted_at']); ?>
                                
                                <tr data-status="<?= strtolower($log['status_verifikasi'] ?? 'pending') ?>" 
                                    data-tanggal="<?= $log['tanggal'] ?>"
                                    <?php if ($isDeleted): ?> style="opacity: 0.6; background-color: #f3f4f6;" <?php endif; ?>>
                                    
                                    <td>
                                        <div class="student-info">
                                            <div class="student-name">
                                                <?= $log['nama_siswa'] ?>
                                                <!-- Badge dihapus -->
                                                <?php if ($isDeleted): ?>
                                                    <span class="badge-deleted" title="Jurnal ini dihapus oleh siswa">🗑️ Dihapus</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="student-meta">NIS: <?= $log['nis'] ?></div>
                                            <div class="student-meta"><?= $log['kelas'] ?> <?= $log['jurusan'] ?></div>
                                            <div class="student-meta">📅 <?= date('d M Y', strtotime($log['tanggal'])) ?></div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="journal-content">
                                            <div class="journal-section">
                                                <div class="journal-label">Kegiatan:</div>
                                                <div class="journal-text"><?= $log['kegiatan'] ?></div>
                                            </div>
                                            <div class="journal-section">
                                                <div class="journal-label">Kendala:</div>
                                                <div class="journal-text"><?= $log['kendala'] ?></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <?php
                                            $statusClass = match(strtolower($log['status_verifikasi'])) {
                                                'disetujui' => 'status-disetujui',
                                                'ditolak'   => 'status-ditolak',
                                                default     => 'status-pending',
                                            };
                                        ?>
                                        <span class="status-badge <?= $statusClass ?>">
                                            <?= ucfirst($log['status_verifikasi'] ?? 'Pending') ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="catatan-guru"><?= $log['catatan_guru'] ?></div>
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <!-- Bisa lihat detail, tapi beda behavior jika dihapus -->
                                            <button class="btn-icon" 
                                                title="Detail"
                                                onclick="detailJurnal(<?= $log['id'] ?>, <?= $isDeleted ? 'true' : 'false' ?>)">
                                                👁️
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
    </div>


    </main>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    function detailJurnal(id, isDeleted = false) {
        fetch(`/guru/detail-jurnal/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    Swal.fire('Error', data.error, 'error');
                    return;
                }

                const createdAtFormatted = formatTanggalIndo(data.tanggal);

                // Jika jurnal dihapus, tampilkan read-only
                if (isDeleted) {
                    Swal.fire({
                        title: '📘 Detail Jurnal Harian',
                        html: `
                            <div class="detail-jurnal-guru">
                                <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); padding: 16px; border-radius: 6px; border-left: 4px solid #dc2626; display: flex; align-items: flex-start; gap: 12px; margin-bottom: 20px;">
                                    <span style="font-size: 24px; flex-shrink: 0;">🗑️</span>
                                    <div style="text-align: left; flex: 1;">
                                        <div style="color: #991b1b; font-weight: 700; font-size: 14px; margin-bottom: 4px;">Jurnal Dihapus</div>
                                        <div style="color: #b91c1c; font-size: 12px; line-height: 1.5;">Jurnal ini telah dihapus oleh siswa dan tidak dapat diverifikasi</div>
                                    </div>
                                </div>

                                <div class="date-display">
                                    <span class="date-icon">📅</span>
                                    <span class="date-text">${createdAtFormatted}</span>
                                </div>

                                <div class="detail-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">📝</span>
                                        <span>Kegiatan Hari Ini</span>
                                    </div>
                                    <div class="detail-text-guru">${data.kegiatan}</div>
                                </div>

                                <div class="detail-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">⚠️</span>
                                        <span>Kendala yang Dihadapi</span>
                                    </div>
                                    <div class="detail-text-guru">${data.kendala || '<span class="text-muted-guru">Tidak ada kendala</span>'}</div>
                                </div>

                                <div class="doc-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">📎</span>
                                        <span>Dokumentasi</span>
                                    </div>
                                    ${data.file 
                                        ? `<div class="doc-item-guru">
                                            <div class="doc-info-guru">
                                                <span class="doc-icon-guru">📄</span>
                                                <span class="doc-name-guru">${data.file}</span>
                                            </div>
                                            <a href="/uploads/logbook/${data.file}" target="_blank" class="btn-download-guru">Unduh</a>
                                        </div>` 
                                        : '<span class="text-muted-guru">Tidak ada file</span>'}
                                </div>

                                <div class="footer-info-guru">
                                    <span>Dibuat: ${data.created_at || '-'}</span>
                                    <span>Dihapus: ${data.deleted_at || '-'}</span>
                                </div>
                            </div>
                        `,
                        
                        confirmButtonText: 'Tutup',
                        confirmButtonColor: '#6b7280',
                        width: '650px',
                        maxHeight: '90vh',
                        scrollType: 'inside',
                        didOpen: () => {
                            const popup = Swal.getPopup();
                            popup.style.maxHeight = '90vh';
                            popup.style.overflowY = 'hidden';
                        }
                    });
                } else {
                    // Tampilkan normal dengan tombol verifikasi
                    Swal.fire({
                        title: '📘 Detail Jurnal Harian',
                        html: `
                            <div class="detail-jurnal-guru">
                                <div class="date-display">
                                    <span class="date-icon">📅</span>
                                    <span class="date-text">${createdAtFormatted}</span>
                                </div>

                                <div class="detail-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">📝</span>
                                        <span>Kegiatan Hari Ini</span>
                                    </div>
                                    <div class="detail-text-guru">${data.kegiatan}</div>
                                </div>

                                <div class="detail-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">⚠️</span>
                                        <span>Kendala yang Dihadapi</span>
                                    </div>
                                    <div class="detail-text-guru">${data.kendala || '<span class="text-muted-guru">Tidak ada kendala</span>'}</div>
                                </div>

                                <div class="doc-section-guru">
                                    <div class="section-title-guru">
                                        <span class="icon">📎</span>
                                        <span>Dokumentasi</span>
                                    </div>
                                    ${data.file 
                                        ? `<div class="doc-item-guru">
                                            <div class="doc-info-guru">
                                                <span class="doc-icon-guru">📄</span>
                                                <span class="doc-name-guru">${data.file}</span>
                                            </div>
                                            <a href="/uploads/logbook/${data.file}" target="_blank" class="btn-download-guru">Unduh</a>
                                        </div>` 
                                        : '<span class="text-muted-guru">Tidak ada file</span>'}
                                </div>

                                <div class="catatan-section">
                                    <div class="section-title-guru">
                                        <span class="icon">💬</span>
                                        <span>Catatan Guru</span>
                                    </div>
                                    <textarea id="catatanGuru" class="swal2-textarea-guru" placeholder="Tuliskan catatan untuk siswa...">${data.catatan_guru || ''}</textarea>
                                </div>

                                <div class="footer-info-guru">
                                    <span>Dibuat: ${data.created_at || '-'}</span>
                                    <span>Diperbarui: ${data.updated_at || '-'}</span>
                                </div>
                            </div>
                        `,
                        
                        showDenyButton: true,
                        confirmButtonText: '✅ Setujui',
                        denyButtonText: '❌ Tolak',
                        focusConfirm: false,
                        preConfirm: () => {
                            const catatan = document.getElementById('catatanGuru').value;
                            return fetch(`/guru/update-jurnal/${id}`, {
                                method: 'POST',
                                body: JSON.stringify({
                                    status_verifikasi: 'disetujui',
                                    catatan_guru: catatan
                                }),
                                headers: { 'Content-Type': 'application/json' }
                            }).then(r => r.json());
                        }
                    }).then(result => {
                        if (result.isConfirmed && result.value.success) {
                            Swal.fire('Berhasil', 'Jurnal disetujui', 'success')
                                .then(() => location.reload());
                        } 
                        else if (result.isDenied) {
                            const catatan = document.getElementById('catatanGuru').value;
                            fetch(`/guru/update-jurnal/${id}`, {
                                method: 'POST',
                                body: JSON.stringify({
                                    status_verifikasi: 'ditolak',
                                    catatan_guru: catatan
                                }),
                                headers: { 'Content-Type': 'application/json' }
                            }).then(res => res.json())
                            .then(res => {
                                if (res.success) {
                                    Swal.fire('Ditolak', 'Jurnal berhasil ditolak', 'success')
                                        .then(() => location.reload());
                                } else {
                                    Swal.fire('Error', res.error || 'Gagal update', 'error');
                                }
                            });
                        }
                    });
                }
            })
            .catch(err => {
                Swal.fire('Error', 'Gagal mengambil data jurnal', 'error');
            });
    }

    function formatTanggalIndo(tanggalString) {
        if (!tanggalString) return '-';
        const tanggal = new Date(tanggalString);

        const hari = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];
        const bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        const namaHari = hari[tanggal.getDay()];
        const tgl = tanggal.getDate();
        const namaBulan = bulan[tanggal.getMonth()];
        const tahun = tanggal.getFullYear();

        return `${namaHari}, ${tgl} ${namaBulan} ${tahun}`;
    }
    
    // Set max date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('editTanggal').setAttribute('max', today);
</script>
<?= $this->endSection() ?>