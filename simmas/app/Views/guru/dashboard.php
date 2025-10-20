<?= $this->extend('guru/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #f8fafc;
        color: #334155;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 24px 24px 24px 40px;;;
    }

    .header {
        background: white;
        padding: 20px 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-left h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .header-subtitle {
        color: #64748b;
        font-size: 14px;
    }

    .header-right {
        text-align: right;
    }

    .current-date {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 4px;
    }

    .user-info {
        font-weight: 600;
    }

    .user-role {
        font-size: 12px;
        color: #059669;
        background: #d1fae5;
        padding: 2px 8px;
        border-radius: 12px;
        display: inline-block;
        margin-top: 4px;
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

    .stat-icon.students { background: #3b82f6; }
    .stat-icon.partners { background: #10b981; }
    .stat-icon.internships { background: #f59e0b; }
    .stat-icon.logbooks { background: #8b5cf6; }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-label {
        color: #64748b;
        font-size: 14px;
    }

    /* Panels */
    .panels-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        align-items: start;
    }

    .panel.dudi-panel {
        grid-column: 2;
        grid-row: 1 / 3;
    }

    .panel.logbook-panel {
        grid-column: 1;
        grid-row: 2;
    }

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
        gap: 8px;
    }

    .panel-title {
        font-weight: 600;
        font-size: 16px;
    }

    .panel-icon {
        font-size: 18px;
    }

    .panel-content {
        padding: 0;
    }

    .logbook-avatar {
            width: 36px;
            height: 36px;
            background: #10b981;
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            flex-shrink: 0;
        }

    .list-item {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .list-item:last-child {
        border-bottom: none;
    }

    .item-info h4 {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .item-details {
        font-size: 12px;
        color: #64748b;
        line-height: 1.4;
    }

    .item-meta {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 4px;
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-new {
        background: #dbeafe;
        color: #1d4ed8;
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

    .item-count {
        background: #fef3c7;
        color: #92400e;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Logbook Section Styles */
    .logbook-section {
            margin-top: 24px;
        }

        .logbook-item {
            padding: 20px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .logbook-item:last-child {
            border-bottom: none;
        }

        .logbook-avatar {
            width: 44px;
            height: 44px;
            background: #10b981;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
        }

        .logbook-content {
            flex: 1;
            min-width: 0;
        }

        .logbook-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .logbook-date {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .logbook-activity {
            font-size: 13px;
            color: #94a3b8;
            font-style: italic;
        }

        .logbook-status {
            flex-shrink: 0;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-rejected {
            background: #fce7f3;
            color: #be185d;
        }


    @media (max-width: 768px) {
        .sidebar {
            width: 60px;
        }

        .main-content {
            margin-left: 60px;
        }

        .nav-item span {
            display: none;
        }

        .panels-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    .company-contact {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 2px;
    }

    .period-info {
        text-align: right;
        font-size: 11px;
        color: #94a3b8;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 60px;
        }

        .nav-item span {
            display: none;
        }

        .panels-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .list-item {
            flex-direction: column;
            gap: 8px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="dashboard">
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>Dashboard</h1>
                <p class="header-subtitle">Ringkasan aktivitas siswa bimbingan Anda</p>
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
                <div class="stat-icon students">👨‍🎓</div>
                <div class="stat-number"><?= $totalSiswaBimbingan ?></div>
                <div class="stat-label">Total Siswa Bimbingan</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon partners">🏢</div>
                <div class="stat-number"><?= count($allDudi) ?></div>
                <div class="stat-label">DUDI Partner Terhubung</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon internships">📋</div>
                <div class="stat-number"><?= count($recentMagang) ?></div>
                <div class="stat-label">Siswa Magang Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon logbooks">📝</div>
                <div class="stat-number"><?= count($recentLogbook) ?></div>
                <div class="stat-label">Logbook Hari Ini</div>
            </div>
        </div>

        <!-- Panels -->
        <div class="panels-grid">
            <!-- Column 1: Magang Terbaru -->
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-icon">🔄</span>
                    <span class="panel-title">Magang Terbaru</span>
                </div>
                <div class="panel-content">
                    <?php foreach ($recentMagang as $m): ?>
                        <div class="list-item"> 
                            <div class="item-info">
                                <h4><?= $m['nama_siswa'] ?></h4>
                                <div class="item-details"><?= $m['nama_dudi'] ?> • <?= $m['jurusan'] ?></div>
                                <div class="item-meta">
                                    Periode: <?= date('d M Y', strtotime($m['tanggal_mulai'])) ?> - 
                                            <?= date('d M Y', strtotime($m['tanggal_selesai'])) ?>
                                </div>
                            </div>
                            <span class="status-badge <?= strtolower($m['status']) == 'berlangsung' ? 'status-aktif' : 'status-selesai' ?>"><?= esc($m['status']) ?></span>                        
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Column 2: DUDI Aktif -->
            <div class="panel dudi-panel">
                <div class="panel-header">
                    <span class="panel-icon">🏢</span>
                    <span class="panel-title">DUDI Aktif</span>
                </div>
                <div class="panel-content">
                    <?php foreach ($allDudi as $d): ?>
                    <div class="list-item">
                        <div class="item-info">
                            <h4><?= $d['nama_perusahaan'] ?></h4>
                            <div class="item-details"><?= $d['alamat'] ?></div>
                            <div class="company-contact">📞 <?= $d['telepon'] ?></div>
                        </div>
                        <span class="item-count"><?= $d['jumlah_siswa'] ?> siswa</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Column 1 (row 2): Logbook Terbaru -->
            <div class="panel logbook-panel">
                <div class="panel-header">
                    <span class="panel-icon">📝</span>
                    <span class="panel-title">Logbook Terbaru</span>
                </div>
                <div class="panel-content">
                    <?php foreach ($recentLogbook as $l): ?>
                    <?php 
                        // Tentukan class status
                        $statusClass = '';
                        if ($l['status_verifikasi'] == 'disetujui') {
                            $statusClass = 'status-approved';
                        } elseif ($l['status_verifikasi'] == 'pending') {
                            $statusClass = 'status-pending';
                        } elseif ($l['status_verifikasi'] == 'ditolak') {
                            $statusClass = 'status-rejected';
                        }
                    ?>
                    <div class="logbook-item">
                        <div class="logbook-avatar">LP</div>
                        <div class="logbook-content">
                            <h4><?= $l['kegiatan'] ?></h4>
                            <div class="item-details">📅 <?= date('j/m/Y', strtotime($l['tanggal'])) ?></div>
                            <div class="item-meta">Kendala: <?= $l['kendala'] ?></div>
                        </div>
                        <span class="status-badge <?= $statusClass ?>"><?= $l['status_verifikasi'] ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Update current date
    function updateDate() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const dateString = now.toLocaleDateString('id-ID', options);
        document.getElementById('currentDate').textContent = dateString;
    }

    // Navigation functionality
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all items
            document.querySelectorAll('.nav-item').forEach(nav => {
                nav.classList.remove('active');
            });
            
            // Add active class to clicked item
            this.classList.add('active');
            
            console.log('Navigation clicked:', this.textContent.trim());
        });
    });

    // Animate numbers on page load
    function animateNumbers() {
        const numbers = document.querySelectorAll('.stat-number');
        numbers.forEach(number => {
            const finalValue = parseInt(number.textContent);
            let currentValue = 0;
            const increment = finalValue / 30;
            
            const timer = setInterval(() => {
                currentValue += increment;
                if (currentValue >= finalValue) {
                    currentValue = finalValue;
                    clearInterval(timer);
                }
                number.textContent = Math.floor(currentValue);
            }, 50);
        });
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateDate();
        animateNumbers();
        
        // Update date every minute
        setInterval(updateDate, 60000);
    });
</script>
<?= $this->endSection() ?>