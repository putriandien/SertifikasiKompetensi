<?= $this->extend('siswa/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
    .status-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
        
    }

    .card-header {
        padding: 24px 32px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .card-header-text h2 {
        font-size: 18px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 2px;
    }

    .card-header-text p {
        font-size: 13px;
        color: #64748b;
    }

    .card-body {
        padding: 32px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        margin-bottom: 32px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #64748b;
        font-weight: 500;
    }

    .info-icon {
        font-size: 16px;
        opacity: 0.8;
    }

    .info-value {
        font-size: 15px;
        color: #1e293b;
        font-weight: 600;
        padding-left: 24px;
    }

    .divider {
        height: 1px;
        background: #f1f5f9;
        margin: 28px 0;
    }

    .status-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-top: 28px;
    }

    .status-box {
        background: #f8fafc;
        padding: 20px 24px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    .status-box-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-badge.aktif {
        background: #dcfce7;
        color: #166534;
    }

    .status-badge.pending {
        background: #fef3c7;
        color: #d97706;
    }

    .status-badge.selesai {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-badge.ditolak {
        background: #fee2e2;
        color: #dc2626;
    }

    .nilai-box {
        text-align: center;
    }

    .nilai-value {
        font-size: 36px;
        font-weight: 700;
        color: #667eea;
        margin-top: 4px;
    }

    .nilai-text {
        font-size: 12px;
        color: #64748b;
        margin-top: 4px;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 64px;
        margin-bottom: 16px;
        opacity: 0.3;
    }

    .empty-title {
        font-size: 18px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
    }

    .empty-text {
        font-size: 14px;
        color: #94a3b8;
        margin-bottom: 24px;
        line-height: 1.6;
    }

    .empty-btn {
        display: inline-block;
        padding: 12px 24px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
    }

    .empty-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    /* Toggle untuk demo */
    .demo-toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 12px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border: 1px solid #e2e8f0;
        z-index: 1000;
    }

    .demo-toggle button {
        padding: 8px 16px;
        margin: 0 4px;
        border: 1px solid #e2e8f0;
        background: white;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s;
    }

    .demo-toggle button:hover {
        background: #f1f5f9;
    }

    .demo-toggle button.active {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }

    @media (max-width: 1024px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .status-section {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px){
        .card-body {
            padding: 24px 20px;
        }
        
        .page-title {
            font-size: 24px;
        }

        .demo-toggle {
            top: 10px;
            right: 10px;
            padding: 8px 12px;
        }

        .demo-toggle button {
            padding: 6px 12px;
            font-size: 11px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="magang">
    <div class="main-content">
        <div class="header">
            <div class="header-left">
                <h1>Status Magang Saya</h1>
                <p class="header-subtitle">Informasi lengkap mengenai program magang yang sedang Anda jalani</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($siswa['nama']) ?></div>
                <span class="user-role">Siswa</span>
            </div>
        </div>

        <?php if($magang): ?>
        <!-- Content With Data -->
        <div id="contentWithData" class="status-card">
            <div class="card-header">
                <div class="card-header-icon">
                    📊
                </div>
                <div class="card-header-text">
                    <h2>Data Magang</h2>
                    <p>Informasi detail program magang Anda</p>
                </div>
            </div>

            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">👤</span>
                            Nama Siswa
                        </div>
                        <div class="info-value"><?= esc($magang['nama_siswa']) ?></div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">🆔</span>
                            NIS
                        </div>
                        <div class="info-value">202<?= esc($magang['nis']) ?>4001</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">🎓</span>
                            Kelas
                        </div>
                        <div class="info-value"><?= esc($magang['kelas']) ?></div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">📚</span>
                            Jurusan
                        </div>
                        <div class="info-value"><?= esc($magang['jurusan']) ?></div>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">🏢</span>
                            Nama Perusahaan
                        </div>
                        <div class="info-value"><?= esc($magang['nama_perusahaan']) ?></div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">📍</span>
                            Alamat Perusahaan
                        </div>
                        <div class="info-value"><?= esc($magang['alamat']) ?></div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <span class="info-icon">📅</span>
                            Periode Magang
                        </div>
                        <div class="info-value"><?= date('j M Y', strtotime($magang['tanggal_mulai'])) ?> s.d <?= date('j M Y', strtotime($magang['tanggal_selesai'])) ?></div>
                    </div>
                </div>

                <div class="status-section">
                    <div class="status-box">
                        <div class="status-box-label">
                            <span class="info-icon">✓</span>
                            Status
                        </div>
                        <?php if(isset($magang['status'])): ?>
                            <?php 
                                $statusClass = match($magang['status']) {
                                    'berlangsung', 'diterima' => 'aktif',
                                    'pending' => 'pending',
                                    'ditolak', 'dibatalkan' => 'ditolak',
                                    'selesai' => 'selesai',
                                    default => 'default'
                                };
                            ?>
                            <span class="status-badge <?= $statusClass ?>">
                                <?= ($magang['status'] === 'berlangsung') ? '✓ Berlangsung' : ucfirst($magang['status']) ?>
                            </span>
                        <?php else: ?>
                            <span class="status-badge pending">Pending</span>
                        <?php endif; ?>
                    </div>

                    <div class="status-box">
                        <div class="status-box-label">
                            <span class="info-icon">⭐</span>
                            Nilai Akhir
                        </div>
                        <?php if(isset($magang['nilai_akhir']) && $magang['nilai_akhir'] !== null): ?>
                            <div class="nilai-box">
                                <span class="nilai-value"><?= esc($magang['nilai_akhir']) ?></span>
                                <span class="nilai-text">/ 100</span>
                            </div>
                        <?php else: ?>
                            <div class="nilai-box">
                                <span class="nilai-value">-</span>
                                <span class="nilai-text">/ 100</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <?php else: ?>
        <!-- Content Empty State -->
        <div id="contentEmpty" class="status-card">
            <div class="card-body">
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3 class="empty-title">Belum Ada Data Magang</h3>
                    <p class="empty-text">Anda belum terdaftar dalam program magang apapun.<br>Silakan pilih dan daftar ke perusahaan yang tersedia.</p>
                    <button class="empty-btn">Cari Tempat Magang</button>
                </div>
            </div>
        </div>
        <?php endif; ?> 
    </div> 
</div>

<?= $this->endSection() ?>
