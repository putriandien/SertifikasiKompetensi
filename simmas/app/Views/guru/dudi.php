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

    .stat-icon.total-dudi { background: #3b82f6; }
    .stat-icon.mean-siswa { background: #f59e0b; }
    .stat-icon.siswa-magang { background: #8b5cf6; }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 14px;
    }

    /* Panel */
    .panel {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .panel-header {
        padding: 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .panel-header-left {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .panel-title {
        font-weight: 600;
        font-size: 16px;
    }

    .panel-icon {
        font-size: 18px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #3b82f6;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
        text-decoration: none;
    }

    .btn-primary:hover {
        background: #2563eb;
    }

    .panel-content {
        padding: 20px;
    }

    /* Controls */
    .controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .entries-control {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #64748b;
    }

    .entries-control select {
        border: 1px solid #d1d5db;
        border-radius: 6px;
        padding: 4px 8px;
        font-size: 14px;
        background: white;
    }

    /* Table */
    .table-container {
        overflow-x: auto;
        margin-bottom: 24px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead tr {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    th {
        padding: 12px 16px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.2s;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    td {
        padding: 16px;
        font-size: 14px;
    }

    /* Company Cell */
    .company-cell {
        display: flex;
        align-items: center;
    }

    .company-avatar {
        width: 40px;
        height: 40px;
        background: #3b82f6;
        color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 600;
        margin-right: 12px;
    }

    .company-info h4 {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .company-address {
        font-size: 12px;
        color: #64748b;
    }

    /* Contact Cell */
    .contact-email {
        margin-bottom: 2px;
    }

    .contact-phone {
        font-size: 12px;
        color: #64748b;
    }

    /* PJ Cell */
    .pj-cell {
        display: flex;
        align-items: center;
    }

    .pj-avatar {
        width: 32px;
        height: 32px;
        background: #10b981;
        color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        margin-right: 8px;
    }

    /* Status Badge */
    .status-badge {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-inactive {
        background: #fce7f3;
        color: #be185d;
    }

    /* Siswa Magang Button */
    .siswa-count {
        background: #fef3c7;
        color: #92400e;
        padding: 4px 8px;
        border: none;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .siswa-count:hover {
        background: #fde68a;
    }

    /* Action Buttons */
    .actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action {
        padding: 6px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .btn-detail {
        color: #06b6d4;
        background: transparent;
    }

    .btn-detail:hover {
        background: #f0f9ff;
    }

    .btn-edit {
        color: #3b82f6;
        background: transparent;
    }

    .btn-edit:hover {
        background: #eff6ff;
    }

    .btn-delete {
        color: #ef4444;
        background: transparent;
    }

    .btn-delete:hover {
        background: #fef2f2;
    }

    .btn-restore {
        color: #10b981;
        background: transparent;
    }

    .btn-restore:hover {
        background: #f0fdf4;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 60px;
            padding: 16px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .controls {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box input {
            width: 100%;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="dudi">
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>Manajemen DUDI</h1>
                <p class="header-subtitle">Kelola data Dunia Usaha dan Dunia Industri</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($guru['nama']) ?></div>
                <span class="user-role">Pembimbing</span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total-dudi">🏢</div>
                <div class="stat-number" id="totalDudi"><?= count($allDudi) ?></div>
                <div class="stat-label">Total DUDI</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon siswa-magang">👥</div>
                <div class="stat-number" id="totalSiswaMagang"><?= $totalSiswaBimbingan ?></div>
                <div class="stat-label">Total Siswa Magang</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon mean-siswa">⚖️</div>
                <div class="stat-number" id="totalSiswaMagang"><?= $rataRataSiswaPerDudi ?></div>
                <div class="stat-label">Rata Rata Siswa</div>
            </div>
        </div>

        <!-- Daftar DUDI Panel -->
        <div class="panel">
            <div class="panel-header">
                <div class="panel-header-left">
                    <span class="panel-icon">📋</span>
                    <span class="panel-title">Daftar DUDI</span>
                </div>
            </div>

            <div class="panel-content">
                <!-- Controls -->
                <div class="controls">
                    <div class="entries-control">
                        <span>Tampilkan:</span>
                        <select id="entriesPerPage" onchange="changeEntriesPerPage()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>entri</span>
                    </div>
                    
                    <div class="search-box">
                        <span class="search-icon">🔍</span>
                        <input type="text" id="searchInput" placeholder="Cari nama perusahaan, alamat, penanggung jawab..." onkeyup="searchTable()">
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table id="dudiTable">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Kontak</th>
                                <th>Penanggung Jawab</th>
                                <th>Siswa Magang</th>
                            </tr>
                        </thead>
                        <tbody id="dudiTableBody">
                            
                        <?php foreach($allDudi as $dudi): ?>
                            <tr data-deleted="false" data-id="1">
                                <td>
                                    <div class="company-cell">
                                        <div class="company-avatar"><?= strtoupper(substr($dudi['nama_perusahaan'], 0, 2)) ?></div>
                                        <div class="company-info">
                                            <h4><?= $dudi['nama_perusahaan'] ?></h4>
                                            <div class="company-address"><?= $dudi['alamat'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="contact-email"><?= $dudi['email'] ?? '-' ?></div>
                                    <div class="contact-phone"><?= $dudi['telepon'] ?? '-' ?></div>
                                </td>
                                <td>
                                    <div class="pj-cell">
                                        <div class="pj-avatar"><?= strtoupper(substr($dudi['penanggung_jawab'] ?? '-', 0, 2)) ?></div>
                                        <span><?= $dudi['penanggung_jawab'] ?? '-' ?></span>
                                    </div>
                                </td>
                                <td>
                                    <button class="siswa-count" onclick="lihatSiswaMagang(<?= $dudi['id'] ?>)"><?= $dudi['jumlah_siswa'] ?? 0 ?></button>
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
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
</script>
<?= $this->endSection() ?>