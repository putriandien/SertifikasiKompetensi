<?= $this->extend('siswa/templates/layout') ?>

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

    /* Existing styles... */
    .reminder-card {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        padding: 20px 24px;
        border-radius: 12px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        border: 1px solid #fbbf24;
    }

    .reminder-icon {
        width: 48px;
        height: 48px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .reminder-content {
        flex: 1;
    }

    .reminder-title {
        font-size: 16px;
        font-weight: 600;
        color: #d97706;
        margin-bottom: 4px;
    }

    .reminder-text {
        font-size: 13px;
        color: #92400e;
    }

    .btn-reminder {
        padding: 10px 20px;
        background: white;
        color: #d97706;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s;
    }

    .btn-reminder:hover {
        background: #fef3c7;
    }

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
    .stat-card:nth-child(2) .stat-icon { background: #dcfce7; }
    .stat-card:nth-child(3) .stat-icon { background: #fef3c7; }
    .stat-card:nth-child(4) .stat-icon { background: #fee2e2; }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 14px;
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
        padding: 14px 20px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e2e8f0;
    }

    td {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14px;
        color: #334155;
    }

    tr:hover {
        background: #f8fafc;
    }

    .journal-date {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1e293b;
    }

    .journal-content {
        max-width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #64748b;
    }

    .journal-section {
        margin-bottom: 0.75rem;
    }

    .journal-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.25rem;
    }

    .journal-text {
        color: #475569;
        line-height: 1.5;
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

    .feedback-col {
        max-width: 200px;
    }

    .feedback-text {
        font-size: 12px;
        color: #64748b;
        line-height: 1.4;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        font-size: 14px;
    }

    .btn-view {
        background: #dbeafe;
        color: #1e40af;
    }

    .btn-view:hover {
        background: #bfdbfe;
    }

    .btn-edit {
        background: #fef3c7;
        color: #d97706;
    }

    .btn-edit:hover {
        background: #fde68a;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
    }

    @media (max-width: 768px) {
        .filter-section {
            grid-template-columns: 1fr;
        }

        .filter-actions {
            flex-direction: column;
        }
    }

    
    /* ====== FORM CONTAINER ====== */
    .custom-swal-form,
    .edit-form-container {
        padding: 0 24px 20px;
        text-align: left;
        max-height: 450px;
        overflow-y: auto;
        }

    /* ====== SECTION TITLE ====== */
    .form-section-title,
        .form-section-title-edit {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
        margin: 20px 0 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid #e2e8f0;
        }

    /* ====== GROUP & ROW ====== */
    .form-group,
    .form-group-edit {
        margin-bottom: 16px;
        }

    .form-row,
    .form-row-edit {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        }

    /* ====== LABEL ====== */
    .form-label,
    .form-label-edit {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 6px;
        }

    .form-label.required::after,
    .form-label-edit .required::after {
        content: " *";
        color: #dc2626;
        }

    .form-label-note {
        font-size: 11px;
        font-weight: 400;
        color: #94a3b8;
        margin-left: 4px;
        }

    /* ====== INPUT / TEXTAREA ====== */
    .swal2-input,
    .swal2-input-edit,
    .swal2-textarea,
    .swal2-textarea-edit,
    .swal2-file,
    .swal2-file-edit {
        width: 100% !important;
        padding: 10px 14px !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        margin: 0 !important;
        box-sizing: border-box !important;
        background: white !important;
        transition: all 0.2s !important;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        }

    .swal2-input:focus,
    .swal2-input-edit:focus,
    .swal2-textarea:focus,
    .swal2-textarea-edit:focus {
        outline: none !important;
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102,126,234,0.1) !important;
        }

    .swal2-input:disabled,
    .swal2-input-edit:disabled {
        background: #f8fafc !important;
        color: #64748b !important;
        cursor: not-allowed !important;
        }

    .swal2-textarea,
    .swal2-textarea-edit {
        min-height: 100px !important;
        resize: vertical !important;
        }

    .swal2-file,
    .swal2-file-edit {
        padding: 8px 12px !important;
        cursor: pointer !important;
        font-size: 13px !important;
        }

    /* ====== HELPER TEXT ====== */
    .form-help,
    .form-help-edit {
        display: block;
        margin-top: 6px;
        font-size: 11px;
        color: #64748b;
        }

    .char-count,
    .char-count-edit {
        text-align: right;
        font-size: 11px;
        color: #94a3b8;
        margin-top: 4px;
        }

    /* ====== INFO BOX ====== */
    .info-box,
    .info-box-edit {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 12px;
        padding: 16px;
        margin: 0 0 20px 0;
        text-align: left;
        }

    .info-box-title,
    .info-box-edit-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 8px;
        }

    .info-box ul,
    .info-box-edit ul {
        margin: 0;
        padding-left: 20px;
        list-style: disc;
        }

    .info-box li,
    .info-box-edit li {
        font-size: 12px;
        color: #1e3a8a;
        line-height: 1.6;
        margin-bottom: 4px;
        }

    /* ====== WARNING BOX ====== */
    .warning-box,
    .warning-box-edit {
        background: #fef3c7;
        border: 1px solid #fbbf24;
        border-radius: 12px;
        padding: 16px;
        margin: 20px 0;
        text-align: left;
        }

    .warning-box-title,
    .warning-box-edit-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #d97706;
        margin-bottom: 8px;
        }

    .warning-box ul,
    .warning-box-edit ul {
        margin: 0;
        padding-left: 20px;
        list-style: disc;
        }

    .warning-box li,
    .warning-box-edit li {
        font-size: 12px;
        color: #92400e;
        line-height: 1.6;
        margin-bottom: 4px;
        }

    /* ====== BUTTONS ====== */
    .swal2-actions {
        padding: 16px 24px 24px !important;
        margin: 0 !important;
        gap: 12px !important;
        border-top: 1px solid #e2e8f0 !important;
        }

    .swal2-confirm {
        background: linear-gradient(135deg, #667eea, #764ba2) !important;
        color: white !important;
        border: none !important;
        border-radius: 8px !important;
        padding: 11px 24px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.3s !important;
        box-shadow: none !important;
        }

    .swal2-confirm:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3) !important;
        }

    .swal2-cancel {
        background: white !important;
        color: #64748b !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 8px !important;
        padding: 10px 24px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.3s !important;
        box-shadow: none !important;
        }

    .swal2-cancel:hover {
        background: #f8fafc !important;
        }

    /* ====== VALIDATION ====== */
    .swal2-validation-message {
        background: #fee2e2 !important;
        color: #dc2626 !important;
        border: 1px solid #fecaca !important;
        border-radius: 8px !important;
        padding: 12px 16px !important;
        margin: 0 24px 16px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        }

    /* ====== SCROLLBAR ====== */
    .custom-swal-form::-webkit-scrollbar,
    .edit-form-container::-webkit-scrollbar {
        width: 6px;
        }

    .custom-swal-form::-webkit-scrollbar-track,
    .edit-form-container::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
        }

    .custom-swal-form::-webkit-scrollbar-thumb,
    .edit-form-container::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
        }

    .custom-swal-form::-webkit-scrollbar-thumb:hover,
    .edit-form-container::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
        }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 768px) {
        .swal2-popup {
        width: 95% !important;
        }

    .form-row,
        .form-row-edit {
        grid-template-columns: 1fr;
        }

    .info-box,
    .warning-box,
    .info-box-edit,
    .warning-box-edit {
        margin: 0 16px 16px;
        }

    .custom-swal-form,
        .edit-form-container {
        padding: 0 16px 16px;
        }

    .swal2-title {
        padding: 20px 16px 12px !important;
        font-size: 18px !important;
        }
    }

    .detail-jurnal-container {
        text-align: left;
        padding: 0 10px 10px;
    }
    
    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .header-left {
        flex: 1;
    }
    
    .header-right-swal {
        flex: 1;
        margin-left: 20px;
    }
    
    .section-title {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 12px;
    }
    
    .section-title .icon {
        font-size: 16px;
    }
    
    .detail-row {
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .detail-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 14px;
        margin-bottom: 2px;
    }
    
    .detail-value {
        color: #64748b;
        font-size: 13px;
    }
    
    .date-status-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 14px 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .date-info {
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
    
    .detail-section {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .detail-text {
        color: #475569;
        white-space: pre-line;
        line-height: 1.6;
        font-size: 14px;
    }
    
    .doc-section {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .doc-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: #f8fafc;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
    }
    
    .doc-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .doc-icon {
        font-size: 20px;
    }
    
    .doc-name {
        font-size: 13px;
        color: #475569;
        font-weight: 500;
    }
    
    .badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    
    .badge-success {
        background: #dcfce7;
        color: #166534;
    }
    
    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .badge-warning {
        background: #fef3c7;
        color: #92400e;
    }
    
    .badge-secondary {
        background: #f1f5f9;
        color: #475569;
    }
    
    .btn-download {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
    }
    
    .btn-download:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        color: #fff;
    }
    
    .text-muted {
        color: #94a3b8;
        font-style: italic;
        font-size: 13px;
    }
    
    .footer-info {
        display: flex;
        justify-content: space-between;
        font-size: 11px;
        color: #94a3b8;
        padding-top: 16px;
        border-top: 1px solid #e2e8f0;
        margin-top: 20px;
    }


    .swal2-html-container {
        margin: 20px 0 !important;
    }

    @media (max-width: 768px) {
        .detail-header {
            flex-direction: column;
        }

        .header-right-swal {
            margin-left: 0;
            margin-top: 16px;
        }

        .date-status-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="jurnal-harian">
    <div class="main-content">
        <div class="header">
            <div class="header-left">
                <h1>Jurnal Harian Magang</h1>
                <p class="header-subtitle">Catat dan pantau aktivitas magang Anda setiap hari</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($siswa['nama']) ?></div>
                <span class="user-role">Siswa</span>
            </div>
        </div>

        <!-- Reminder Card -->
        <?php if ($showReminder): ?>
            <div class="reminder-card">
                <div class="reminder-icon">⚠️</div>
                <div class="reminder-content">
                    <div class="reminder-title">Jangan Lupa Jurnal Hari Ini!</div>
                    <div class="reminder-text">Anda belum membuat jurnal untuk hari ini. Catat kegiatan magang Anda sekarang sebelum Anda lupa!</div>
                </div>
                <button class="btn-reminder" onclick="tambahJurnal()">Buat Sekarang</button>
            </div>
        <?php endif; ?>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-number"><?= $total ?></div>
                <div class="stat-label">Total Jurnal</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-number"><?= $disetujui ?></div>
                <div class="stat-label">Disetujui</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🕒</div>
                <div class="stat-number"><?= $menunggu ?></div>
                <div class="stat-label">Menunggu</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">❌</div>
                <div class="stat-number"><?= $ditolak ?></div>
                <div class="stat-label">Ditolak</div>
            </div>
        </div>

        <!-- Daftar Jurnal Panel -->
        <div class="panel">
            <div class="panel-header">
                <div class="panel-header-left">
                    <span class="panel-icon">📋</span>
                    <span class="panel-title">Riwayat Jurnal</span>
                </div>
                <button class="btn-primary" onclick="tambahJurnal()">
                    + Tambah Jurnal
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
                        <input type="text" id="searchInput" placeholder="Cari kegiatan, kendala..." onkeyup="searchTable()">
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table id="jurnalTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kegiatan & Keterangan</th>
                                <th>Status</th>
                                <th>Feedback Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="jurnalTableBody">
                            <?php foreach ($logbook as $item): ?>
                            <tr data-status="<?= strtolower($item['status_verifikasi'] ?? 'pending') ?>" 
                                data-tanggal="<?= $item['tanggal'] ?>">
                                <td>
                                    <div class="journal-date">
                                        <?= date('d-m-Y', strtotime($item['tanggal'])) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="journal-content">
                                        <div class="journal-section">
                                            <div class="journal-label">Kegiatan:</div>
                                            <div class="journal-text"><?= esc($item['kegiatan']) ?></div>
                                        </div>
                                        <div class="journal-section">
                                            <div class="journal-label">Kendala:</div>
                                            <div class="journal-text"><?= esc($item['kendala']) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        $statusClass = match(strtolower($item['status_verifikasi'])) {
                                            'disetujui' => 'status-disetujui',
                                            'ditolak'   => 'status-ditolak',
                                            default     => 'status-pending',
                                        };
                                    ?>
                                    <span class="status-badge <?= $statusClass ?>">
                                        <?= ucfirst($item['status_verifikasi'] ?? 'Pending') ?>
                                    </span>
                                </td>
                                <td class="feedback-col">
                                    <div class="feedback-text">👤 Catatan Guru:<br><?= esc($item['catatan_guru'] ?? '-') ?></div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon btn-view" title="Lihat Detail" onclick="lihatDetailJurnal(<?= $item['id'] ?>)">👁️</button>
                                        <button class="btn-icon btn-edit" title="Edit" onclick="editJurnal(<?= $item['id'] ?>)">✏️</button>
                                        <button class="btn-icon btn-delete" title="Hapus" onclick="hapusJurnal(<?= $item['id'] ?>)">🗑️</button>
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
                        <span id="paginationInfo">Menampilkan data</span>
                    </div>
                    <div class="pagination-controls" id="paginationControls"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    window.statusMagang = "<?= $statusMagang ?? '' ?>";
    function tambahJurnal() {
        if (window.statusMagang !== 'berlangsung') {
            Swal.fire({
                icon: 'warning',
                title: 'Tidak Dapat Menambahkan Jurnal',
                text: 'Anda belum memulai magang atau status magang belum berlangsung.',
                confirmButtonColor: '#f59e0b'
            });
            return;
        }
        
        Swal.fire({
            title: '+ Tambah Jurnal Harian',
            html: `
                <div class="info-box">
                    <div class="info-box-title">
                        <span>ℹ️</span>
                        Panduan Pengisian Jurnal
                    </div>
                    <ul>
                        <li>Pastikan Anda mengisi jurnal sesuai dengan kegiatan yang benar-benar dilakukan</li>
                        <li>Jelaskan kegiatan secara detail dan spesifik agar mudah dipahami</li>
                        <li>Sertakan waktu atau durasi kegiatan jika diperlukan (Opsional)</li>
                        <li>Upload dokumentasi pendukung seperti foto kegiatan atau screenshot</li>
                        <li>Jurnal akan diverifikasi oleh pembimbing dalam 1x24 jam</li>
                    </ul>
                </div>
                <div class="custom-swal-form">
                    <div class="form-section-title">Informasi Dasar</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label required">Tanggal</label>
                            <input type="date" id="tanggal" class="swal2-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status <span class="form-label-note">(Otomatis)</span></label>
                            <input type="text" id="status" class="swal2-input" value="Menunggu Verifikasi" disabled>
                        </div>
                    </div>
                    <div class="form-section-title">Kegiatan Harian</div>
                    <div class="form-group">
                        <label class="form-label required">Deskripsi Kegiatan</label>
                        <textarea 
                            id="kegiatan" 
                            class="swal2-textarea" 
                            placeholder="Contoh: Melakukan meeting dengan team leader untuk membahas progress proyek website perusahaan. Dilanjutkan dengan coding fitur login dan registrasi menggunakan PHP dan MySQL..." 
                            rows="5" 
                            maxlength="500"
                            oninput="updateCharCount(this)"
                            required></textarea>
                        <div class="char-count">
                            <span id="charCount">0</span>/500 karakter
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kendala yang Dihadapi <span class="form-label-note">(Opsional)</span></label>
                        <input 
                            type="text" 
                            id="kendala" 
                            class="swal2-input" 
                            placeholder="Contoh: Kesulitan memahami konsep OOP, jaringan internet lambat, dll..." 
                            maxlength="200">
                    </div>
                    <div class="form-section-title">Dokumentasi Pendukung</div>
                    <div class="form-group">
                        <label class="form-label required">Upload File</label>
                        <input type="file" id="file" class="swal2-file" accept="image/*,.pdf" onchange="handleFileSelect(this)" required>
                        <span class="form-help">Format: JPG, PNG, atau PDF. Maksimal 10MB.</span>
                        <div id="filePreview" style="margin-top: 8px; font-size: 12px; color: #059669;"></div>
                    </div>
                </div>
                <div class="warning-box" style="margin: 0 24px 20px;">
                    <div class="warning-box-title">
                        <span>⚠️</span>
                        Catatan Penting
                    </div>
                    <ul>
                        <li>Data yang sudah disubmit tidak dapat dibatalkan</li>
                        <li>Pastikan semua informasi yang Anda isi sudah benar</li>
                    </ul>
                </div>
            `,
            width: '600px',
            showCancelButton: true,
            confirmButtonText: 'Simpan Jurnal',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'swal-jurnal-popup',
                title: 'swal-jurnal-title',
                htmlContainer: 'swal-jurnal-html'
            },
            didOpen: () => {
                // Set tanggal hari ini sebagai default
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('tanggal').value = today;
                document.getElementById('tanggal').setAttribute('max', today);
            },
            preConfirm: () => {
                const tanggal = document.getElementById('tanggal').value;
                const kegiatan = document.getElementById('kegiatan').value.trim();
                const kendala = document.getElementById('kendala').value.trim();
                const file = document.getElementById('file').files[0];

                // Validasi tanggal
                if (!tanggal) {
                    Swal.showValidationMessage('⚠️ Tanggal harus diisi!');
                    return false;
                }

                // Validasi kegiatan
                if (!kegiatan) {
                    Swal.showValidationMessage('⚠️ Deskripsi kegiatan harus diisi!');
                    return false;
                }

                if (kegiatan.length < 50) {
                    Swal.showValidationMessage('⚠️ Deskripsi kegiatan terlalu singkat! Minimal 50 karakter.');
                    return false;
                }

                // Validasi file (wajib)
                if (!file) {
                    Swal.showValidationMessage('⚠️ File dokumentasi harus diupload!');
                    return false;
                }

                const maxSize = 10 * 1024 * 1024; // 10MB
                if (file.size > maxSize) {
                    Swal.showValidationMessage('⚠️ Ukuran file maksimal 10MB!');
                    return false;
                }

                // Buat FormData
                const formData = new FormData();
                const now = new Date().toISOString().slice(0, 19).replace('T', ' '); 
                formData.append('tanggal', tanggal);
                formData.append('status_verifikasi', 'pending');
                formData.append('kegiatan', kegiatan);
                formData.append('kendala', kendala);
                formData.append('created_at', now);
                formData.append('updated_at', now);
                formData.append('file', file); // File wajib diupload

                return formData;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading
                Swal.fire({
                    title: 'Menyimpan...',
                    html: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Kirim data ke server
                fetch('/siswa/add-jurnal', {
                    method: 'POST',
                    body: result.value
                })
                .then(res => res.json())
                .then(resp => {
                    if (resp.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: resp.success || 'Jurnal berhasil ditambahkan dan menunggu verifikasi pembimbing.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#10b981'
                        }).then(() => {
                            const reminderCard = document.querySelector('.reminder-card');
                            if (reminderCard) {
                                reminderCard.style.transition = 'opacity 0.3s ease';
                                reminderCard.style.opacity = '0';
                                setTimeout(() => {
                                    reminderCard.style.display = 'none';
                                }, 300);
                            }
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: resp.error || 'Terjadi kesalahan saat menyimpan jurnal.',
                            confirmButtonColor: '#dc2626'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan koneksi. Silakan coba lagi.',
                        confirmButtonColor: '#dc2626'
                    });
                });
            }
        });
    }

    function lihatDetailJurnal(id) {
        fetch(`/siswa/detail-jurnal/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    Swal.fire('Error', data.error, 'error');
                    return;
                }

                // Format tanggal
                const createdAtFormatted = formatTanggalIndo(data.tanggal);

                // Status badge
                let statusBadge = '';
                let status = data.status_verifikasi ?? null;
                
                if (status === 'disetujui') {
                    statusBadge = '<span class="badge badge-success">Disetujui</span>';
                } else if (status === 'ditolak') {
                    statusBadge = '<span class="badge badge-danger">Ditolak</span>';
                } else if (status === 'pending') {
                    statusBadge = '<span class="badge badge-warning">Pending</span>';
                } else {
                    statusBadge = '<span class="badge badge-secondary">-</span>';
                }

                // Kendala (hilang kalau null)
                let kendalaHTML = '';
                if (data.kendala) {
                    kendalaHTML = `
                        <div class="detail-section">
                            <div class="section-title">
                                <span class="icon">⚠️</span>
                                <span>Kendala</span>
                            </div>
                            <div class="detail-text">${data.kendala}</div>
                        </div>
                    `;
                }

                // Dokumentasi (hilang kalau ditolak)
                let dokumentasiHTML = '';
                if (data.status_verifikasi !== 'ditolak') {
                    dokumentasiHTML = `
                        <div class="doc-section">
                            <div class="section-title">
                                <span class="icon">📎</span>
                                <span>Dokumentasi</span>
                            </div>
                            <div class="doc-item">
                                <div class="doc-info">
                                    <span class="doc-icon">📄</span>
                                    <span class="doc-name">${data.file ?? '-'}</span>
                                </div>
                                ${data.file ? `<a href="/uploads/logbook/${data.file}" target="_blank" class="btn-download">Unduh</a>` : ''}
                            </div>
                        </div>
                    `;
                }
                Swal.fire({
                    title: '📘 Detail Jurnal Harian',
                    html: `
                        <div class="detail-jurnal-container">
                            <!-- Header: Info Siswa & Tempat Magang -->
                            <div class="detail-header">
                                <div class="header-left">
                                    <div class="section-title">
                                        <span class="icon">👤</span>
                                        <span>Informasi Siswa</span>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">${data.nama_siswa}</div>
                                        <div class="detail-value">ID NIS: ${data.nis}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-value">Jurusan: ${data.jurusan}</div>
                                    </div>
                                </div>
                                
                                <div class="header-right-swal">
                                    <div class="section-title">
                                        <span class="icon">🏢</span>
                                        <span>Tempat Magang</span>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">${data.nama_perusahaan}</div>
                                        <div class="detail-value">${data.alamat_perusahaan}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-value">PIC: ${data.penanggung_jawab}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggal & Status dalam 1 Card -->
                            <div class="date-status-card">
                                <div class="date-info">
                                    <span class="date-icon">📅</span>
                                    <span class="date-text">${createdAtFormatted}</span>
                                </div>
                                ${statusBadge}
                            </div>

                            <!-- Kegiatan -->
                            <div class="detail-section">
                                <div class="section-title">
                                    <span class="icon">📝</span>
                                    <span>Kegiatan Hari Ini</span>
                                </div>
                                <div class="detail-text">${data.kegiatan}</div>
                            </div>

                            <!-- Kendala -->
                            ${kendalaHTML}

                            <!-- Catatan Guru -->
                            ${data.catatan_guru ? `
                            <div class="detail-section">
                                <div class="section-title">
                                    <span class="icon">💬</span>
                                    <span>Catatan Guru</span>
                                </div>
                                <div class="detail-text">${data.catatan_guru}</div>
                            </div>
                            ` : ''}

                            <!-- Dokumentasi -->
                            ${dokumentasiHTML}

                            <!-- Footer: Dibuat & Diperbarui -->
                            <div class="footer-info">
                                <span>Dibuat: ${data.created_at || '-'}</span>
                                <span>Diperbarui: ${data.updated_at || '-'}</span>
                            </div>
                        </div>
                    `,
                    confirmButtonText: 'Tutup',
                    width: 700,
                    showClass: {
                        popup: 'swal2-show'
                    },
                    hideClass: {
                        popup: 'swal2-hide'
                    }
                });
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Gagal mengambil data jurnal. Silakan coba lagi.',
                    confirmButtonColor: '#ef4444'
                });
            });
    }

    function editJurnal(id) {
        fetch(`/siswa/detail-jurnal/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    Swal.fire('Error', data.error, 'error');
                    return;
                }

                if (data.status_verifikasi === 'disetujui') {
                    Swal.fire('Info', 'Jurnal yang sudah disetujui tidak dapat diedit.', 'info');
                    return;
                }

                // Cek apakah ada file
                let currentFileName = data.file || '';
                let fileDisplayHTML = '';
                
                if (currentFileName) {
                    fileDisplayHTML = `
                        <div id="currentFile" style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; margin-bottom: 10px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 20px;">📄</span>
                                <span style="font-size: 13px; color: #166534; font-weight: 500;">${currentFileName}</span>
                            </div>
                            <button type="button" onclick="hapusFile()" style="background: #ef4444; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; font-weight: 500;">Hapus</button>
                        </div>
                    `;
                }

                Swal.fire({
                    title: 'Edit Jurnal Harian',
                    html: `

                        <div class="info-box-edit">
                            <div class="info-box-edit-title">
                                <span>ℹ️</span>
                                Panduan Perubahan Jurnal
                            </div>
                            <ul>
                                <li>Anda dapat mengubah jurnal sebelum diverifikasi</li>
                                <li>Deskripsikan kegiatan secara detail dan akurat sesuai dengan kegiatan yang dilakukan</li>
                                <li>Cantumkan kendala yang dihadapi (jika ada)</li>
                                <li>Upload ulang dokumentasi jika diperlukan (opsional)</li>
                                <li>Pastikan tanggal sesuai dengan hari kegiatan dilakukan</li>
                            </ul>
                        </div>

                        <form id="formEditJurnal" enctype="multipart/form-data" class="edit-form-container">
                            <div class="form-section-title-edit">Informasi Dasar</div>
                            
                            <div class="form-row-edit">
                                <div class="form-group-edit">
                                    <label class="form-label-edit">
                                        <span class="required">Tanggal</span>
                                    </label>
                                    <input type="text" name="tanggal" id="editTanggal" class="swal2-input-edit" value="${data.tanggal}" readonly style="background: #f8fafc !important; color: #64748b !important; cursor: not-allowed !important;">
                                </div>
                                <div class="form-group-edit">
                                    <label class="form-label-edit">
                                        Status <span style="font-size: 11px; color: #94a3b8;">(Tidak dapat diubah)</span>
                                    </label>
                                    <input type="text" class="swal2-input-edit" value="Edit Mode" disabled style="background: #f8fafc !important; color: #64748b !important; cursor: not-allowed !important;">
                                </div>
                            </div>

                            <div class="form-section-title-edit">Kegiatan Harian</div>
                            
                            <div class="form-group-edit">
                                <label class="form-label-edit">
                                    <span class="required">Deskripsi Kegiatan</span>
                                </label>
                                <textarea 
                                    name="kegiatan" 
                                    id="editKegiatan" 
                                    class="swal2-textarea-edit" 
                                    placeholder="Jelaskan kegiatan yang dilakukan secara detail..." 
                                    maxlength="500"
                                    oninput="updateCharCountEdit(this)"
                                    required>${data.kegiatan}</textarea>
                                <div class="char-count-edit">
                                    <span id="charCountEdit">${data.kegiatan.length}</span>/500 karakter
                                </div>
                            </div>

                            <div class="form-group-edit">
                                <label class="form-label-edit">
                                    Kendala yang Dihadapi <span style="font-size: 11px; color: #94a3b8;">(Opsional)</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="kendala" 
                                    class="swal2-input-edit" 
                                    placeholder="Contoh: Kesulitan memahami konsep, kendala teknis, dll..." 
                                    value="${data.kendala || ''}"
                                    maxlength="200">
                            </div>

                            <div class="form-section-title-edit">Dokumentasi Pendukung</div>
                            
                            <div class="form-group-edit">
                                <label class="form-label-edit">
                                    Upload File (Opsional)
                                </label>
                                ${fileDisplayHTML}
                                <input type="file" name="file" id="editFile" class="swal2-file-edit" accept="image/*,.pdf" onchange="handleFileSelectEdit(this)">
                                <input type="hidden" name="hapus_file" id="hapusFileFlag" value="0">
                                <span class="form-help-edit">Format: JPG, PNG, atau PDF. Maksimal 10MB. Kosongkan jika tidak ingin mengubah file.</span>
                                <div id="filePreviewEdit" style="margin-top: 8px; font-size: 12px; color: #059669;"></div>
                            </div>
                        </form>

                        <div class="warning-box-edit">
                            <div class="warning-box-edit-title">
                                <span>⚠️</span>
                                Catatan Penting
                            </div>
                            <ul>
                                ${data.status_verifikasi === 'ditolak' ? '<li><strong>Jurnal yang ditolak akan dikembalikan ke status "Menunggu Verifikasi" setelah diedit</strong></li>' : ''}
                                <li>Perubahan data akan menunggu verifikasi ulang dari pembimbing</li>
                                <li>Pastikan semua informasi yang diubah sudah benar</li>
                            </ul>
                        </div>
                    `,
                    width: '600px',
                    showCancelButton: true,
                    confirmButtonText: 'Update Jurnal',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'swal2-popup',
                        title: 'swal2-title',
                        actions: 'swal2-actions',
                        confirmButton: 'swal2-confirm',
                        cancelButton: 'swal2-cancel'
                    },
                    preConfirm: () => {
                        const form = document.getElementById('formEditJurnal');
                        const kegiatan = form.kegiatan.value.trim();
                        const tanggal = form.tanggal.value;

                        // Validasi
                        if (!tanggal) {
                            Swal.showValidationMessage('⚠️ Tanggal harus diisi!');
                            return false;
                        }

                        if (!kegiatan) {
                            Swal.showValidationMessage('⚠️ Deskripsi kegiatan harus diisi!');
                            return false;
                        }

                        if (kegiatan.length < 50) {
                            Swal.showValidationMessage('⚠️ Deskripsi kegiatan terlalu singkat! Minimal 50 karakter.');
                            return false;
                        }

                        const fileInput = document.getElementById('editFile');
                        if (fileInput.files[0]) {
                            const maxSize = 10 * 1024 * 1024;
                            if (fileInput.files[0].size > maxSize) {
                                Swal.showValidationMessage('⚠️ Ukuran file maksimal 10MB!');
                                return false;
                            }
                        }

                        const formData = new FormData(form);
                        formData.append('_method', 'PUT');
                        
                        // Ubah status menjadi pending jika jurnal ditolak
                        if ('${data.status_verifikasi}' === 'ditolak') {
                            formData.append('status_verifikasi', 'pending');
                        }

                        return fetch(`/siswa/update-jurnal/${id}`, {
                            method: 'POST',
                            body: formData
                        }).then(res => res.json());
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        if (result.value.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Jurnal berhasil diperbarui',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#10b981'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: result.value.error || 'Gagal update jurnal',
                                confirmButtonColor: '#dc2626'
                            });
                        }
                    }
                });
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Gagal mengambil data jurnal',
                    confirmButtonColor: '#dc2626'
                });
            });
    }

    function hapusJurnal(id) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah anda yakin menghapus jurnal ini? Aksi tidak bisa dibatalkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/siswa/delete-jurnal/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(response => {
                    if (response.status === 'success') {
                        Swal.fire('Terhapus!', response.message, 'success')
                        .then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Gagal!', response.message, 'error');
                    }
                });
            }
        });
    }

    // Helper function untuk update character count
    function updateCharCount(textarea) {
        const count = textarea.value.length;
        const counter = document.getElementById('charCount');
        if (counter) {
            counter.textContent = count;
            counter.style.color = count > 450 ? '#dc2626' : '#94a3b8';
        }
    }

    // Helper function untuk handle file select
    function handleFileSelect(input) {
        const preview = document.getElementById('filePreview');
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const size = (file.size / 1024 / 1024).toFixed(2);
            preview.innerHTML = `✓ File dipilih: ${file.name} (${size} MB)`;
        } else {
            preview.innerHTML = '';
        }
    }

    function hapusFile() {
        document.getElementById('currentFile').style.display = 'none';
        document.getElementById('hapusFileFlag').value = '1';
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