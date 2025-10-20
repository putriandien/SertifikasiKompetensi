<?= $this->extend('siswa/templates/layout') ?>

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

    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 24px 24px 24px 40px;
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
            color: #3b82f6;
            background: #eff6ff;
            padding: 2px 8px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 4px;
        }

    .search-filter-section {
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .search-bar {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
    }

    .search-input {
        flex: 1;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s;
        background: #f8fafc;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .registration-status {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        padding: 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }

    .status-info h3 {
        font-size: 16px;
        font-weight: 600;
        color: #d97706;
        margin-bottom: 4px;
    }

    .status-info p {
        font-size: 14px;
        color: #92400e;
    }

    .status-counters {
        display: flex;
        gap: 12px;
    }

    .counter-item {
        background: white;
        padding: 12px 16px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        min-width: 80px;
    }

    .counter-number {
        font-size: 20px;
        font-weight: bold;
        color: #d97706;
    }

    .counter-label {
        font-size: 11px;
        color: #666;
        margin-top: 2px;
    }

    .dudi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 24px;
    }

    .dudi-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s;
        border: 1px solid #f1f5f9;
    }

    .dudi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        border-color: #667eea;
    }

    .dudi-header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        padding: 20px;
        color: white;
        text-align: center;
    }

    .company-logo {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
        color: #667eea;
    }

    .company-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .company-category {
        font-size: 12px;
        opacity: 0.9;
    }

    .dudi-body {
        padding: 20px;
    }

    .company-info {
        margin-bottom: 16px;
    }

    .info-row {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        font-size: 13px;
        color: #64748b;
    }

    .info-icon {
        width: 16px;
        margin-right: 8px;
        color: #667eea;
    }

    .quota-section {
        background: #f8fafc;
        padding: 16px;
        border-radius: 10px;
        margin: 16px 0;
        text-align: center;
        border: 1px solid #e2e8f0;
    }

    .quota-number {
        font-size: 24px;
        font-weight: bold;
        color: #059669;
    }

    .quota-label {
        font-size: 12px;
        color: #64748b;
        margin-top: 4px;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-top: 8px;
    }

    .status-available {
        background: #dcfce7;
        color: #166534;
    }

    .status-limited {
        background: #fef3c7;
        color: #d97706;
    }

    .status-full {
        background: #fee2e2;
        color: #dc2626;
    }

    .company-description {
        font-size: 13px;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .card-actions {
        display: flex;
        gap: 8px;
    }

    .detail-btn {
        flex: 1;
        padding: 10px 12px;
        background: #f1f5f9;
        color: #475569;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .detail-btn:hover {
        background: #e2e8f0;
        border-color: #cbd5e1;
    }

    .register-btn {
        flex: 2;
        padding: 10px 12px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .register-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.3);
    }

    .register-btn:disabled {
        background: #94a3b8;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        color: #1e293b;
        padding: 16px 20px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-left: 4px solid #10b981;
        transform: translateX(400px);
        transition: all 0.3s;
        z-index: 1000;
        max-width: 300px;
    }

    .notification.show {
        transform: translateX(0);
    }

    .notification-title {
        font-weight: 600;
        margin-bottom: 6px;
        color: #10b981;
    }

    .notification-message {
        font-size: 13px;
        color: #64748b;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dudi-card {
        animation: fadeInUp 0.5s ease-out;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 60px;
            padding: 16px;
        }
        
        .dudi-grid {
            grid-template-columns: 1fr;
        }
        
        .search-bar {
            flex-direction: column;
        }
        
        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .status-counters {
            flex-wrap: wrap;
        }
    }

    .detail-dudi-container {
        text-align: left;
        padding: 10px;
    }
    
    .detail-dudi-section {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 8px;
        background: white;
        border: 1px solid #e2e8f0;
    }
    
    .section-title-dudi {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 12px;
    }
    
    .section-title-dudi .icon {
        font-size: 16px;
    }
    
    .info-row-detail {
        display: flex;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .info-label-detail {
        font-weight: 600;
        min-width: 140px;
        color: #1e293b;
    }
    
    .info-value-detail {
        color: #475569;
        flex: 1;
    }
    
    .quota-display {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
        border: 1px solid #bbf7d0;
    }
    
    .quota-number-display {
        font-size: 36px;
        font-weight: bold;
        color: #166534;
        margin-bottom: 8px;
    }
    
    .quota-label-display {
        font-size: 13px;
        color: #166534;
        margin-bottom: 8px;
    }
    
    .description-section {
        background: #f8fafc;
        padding: 16px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        margin-bottom: 20px;
    }
    
    .description-text {
        color: #475569;
        line-height: 1.6;
        font-size: 14px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="dudi">
    <div class="main-content">
        <!-- Header Section -->

        <div class="header">
            <div class="header-left">
                <h1>Cari Tempat Magang</h1>
                <p class="header-subtitle">Temukan perusahaan terbaik untuk pengalaman magang yang berharga</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info"><?= esc($siswa['nama']) ?></div>
                <span class="user-role">Siswa</span>
            </div>
        </div>

        <!-- Search & Filter Section -->
        <div class="search-filter-section">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Cari berdasarkan nama perusahaan, lokasi, atau bidang industri...">
            </div>
            
            <div class="registration-status">
                <div class="status-info">
                    <h3>Status Pendaftaran Magang</h3>
                    <p>Anda dapat mendaftar maksimal 3 DUDI untuk program magang</p>
                </div>
                <div class="status-counters">
                    <div class="counter-item">
                        <div class="counter-number" id="counter-sudah-daftar"><?= $sudahDaftar ?></div>
                        <div class="counter-label">Sudah Daftar</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-number" id="counter-sisa-kuota"><?= $sisaKuota ?></div>
                        <div class="counter-label">Sisa Kuota</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-number"><?= $totalMaksimal ?></div>
                        <div class="counter-label">Total Maksimal</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DUDI Cards Grid -->
        <div class="dudi-grid">
        <?php foreach ($dudiList as $dudi): ?>
            <div class="dudi-card">
                <div class="dudi-header">
                    <div class="company-logo"><?= substr($dudi['nama_perusahaan'], 0, 1) ?></div>
                    <div class="company-name"><?= $dudi['nama_perusahaan'] ?></div>
                </div>
                <div class="dudi-body">
                    <div class="company-info">
                        <div class="info-row">
                            <span class="info-icon">📍</span>
                            <span><?= $dudi['alamat'] ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-icon">📞</span>
                            <span><?= $dudi['telepon'] ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-icon">👤</span>
                            <span>PIC: <?= $dudi['penanggung_jawab'] ?></span>
                        </div>
                    </div>
                    
                    <div class="quota-section">
                        <div class="quota-number"><?= $dudi['sisa_kuota'] ?></div>
                        <div class="quota-label">Kuota Tersedia</div>
                        <?php if ($dudi['sisa_kuota'] > 0): ?>
                        <span class="status-badge status-available">Kuota Tersedia</span>
                        <?php else: ?>
                            <span class="status-badge status-full">Kuota Penuh</span>
                        <?php endif; ?>
                    </div>
                    
                    <p class="company-description"><?= $dudi['deskripsi'] ?></p>
                    
                    <div class="card-actions">
                        <button class="detail-btn" onclick='showDetail(<?= json_encode($dudi) ?>)'>Detail</button>

                        <?php if ($dudi['sudah_daftar']): ?>
                            <?php if ($dudi['status'] === 'berlangsung'): ?>
                                <button class="register-btn" style="background: linear-gradient(135deg, #10b981, #059669);" disabled>✓ Sedang Berlangsung</button>
                            <?php elseif ($dudi['status'] === 'pending'): ?>
                                <button class="register-btn" style="background: #f59e0b;" disabled>Menunggu Verifikasi</button>
                            <?php elseif ($dudi['status'] === 'ditolak'): ?>
                                <button class="register-btn" style="background: #ef4444;" disabled>Ditolak</button>
                            <?php elseif ($dudi['status'] === 'dibatalkan'): ?>
                                <button class="register-btn" style="background: #94a3b8;" disabled>Dibatalkan</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if ($sudahDiterimaAktif): ?>
                                <button class="register-btn" style="background: #94a3b8;" disabled>Tidak Dapat Mendaftar</button>
                            <?php else: ?>
                                <button class="register-btn" id="register-btn-<?= $dudi['id'] ?>" 
                                    onclick="registerMagang(<?= $dudi['id'] ?>)" 
                                    <?= $dudi['sisa_kuota'] <= 0 ? 'disabled' : '' ?>>
                                    Daftar Sekarang
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>

<!-- Notification -->
<div class="notification" id="notification">
    <div class="notification-title">Pendaftaran Berhasil!</div>
    <div class="notification-message">Pendaftaran magang berhasil diajukan, menunggu verifikasi dari pihak guru.</div>
</div>
<?= $this->endSection() ?>
    
<?= $this->section('scripts') ?>
<script>
    let registrationCount = 1; // Sudah mendaftar 1 DUDI

    function showDetail(dudi) {
        // Status badge
        let statusBadge = '';
        if (dudi.sisa_kuota > 5) {
            statusBadge = '<span style="background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block;">Kuota Tersedia</span>';
        } else if (dudi.sisa_kuota > 0) {
            statusBadge = '<span style="background: #fef3c7; color: #92400e; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block;">Kuota Terbatas</span>';
        } else {
            statusBadge = '<span style="background: #fee2e2; color: #991b1b; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block;">Kuota Penuh</span>';
        }

        Swal.fire({
            title: `<div style="display:flex;align-items:center;gap:12px;justify-content:center;"><div style="width:50px;height:50px;background:linear-gradient(135deg, #667eea, #764ba2);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:20px;font-weight:bold;">${dudi.nama_perusahaan.charAt(0)}</div><span>${dudi.nama_perusahaan}</span></div>`,
            html: `
                <div class="detail-dudi-container">
                    <!-- Kuota Display -->
                    <div class="quota-display">
                        <div class="quota-number-display">${dudi.sisa_kuota}</div>
                        <div class="quota-label-display">Kuota Tersedia</div>
                        ${statusBadge}
                    </div>

                    <!-- Informasi Kontak -->
                    <div class="detail-dudi-section">
                        <div class="section-title-dudi">
                            <span class="icon">📞</span>
                            <span>Informasi Kontak</span>
                        </div>
                        <div class="info-row-detail">
                            <span class="info-label-detail">Alamat:</span>
                            <span class="info-value-detail">${dudi.alamat}</span>
                        </div>
                        <div class="info-row-detail">
                            <span class="info-label-detail">Telepon:</span>
                            <span class="info-value-detail">${dudi.telepon}</span>
                        </div>
                        <div class="info-row-detail">
                            <span class="info-label-detail">Penanggung Jawab:</span>
                            <span class="info-value-detail">${dudi.penanggung_jawab}</span>
                        </div>
                    </div>

                    <!-- Deskripsi Perusahaan -->
                    <div class="description-section">
                        <div class="section-title-dudi">
                            <span class="icon">📋</span>
                            <span>Tentang Perusahaan</span>
                        </div>
                        <div class="description-text">${dudi.deskripsi || 'Tidak ada deskripsi tersedia.'}</div>
                    </div>
                </div>
            `,
            width: 600,
            showCancelButton: false,
            confirmButtonText: 'Tutup',
            customClass: {
                popup: 'swal2-popup',
                title: 'swal2-title',
                htmlContainer: 'swal2-html-container',
                confirmButton: 'swal2-confirm',
                actions: 'swal2-actions'
            }
        });
    }
    

    function registerMagang(dudiId) {
        fetch(`/siswa/daftar-magang/${dudiId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({}) // body tetap dikirim walaupun kosong
        })
        .then(res => res.json())
        .then(resp => {
            if (resp.success) {
                Swal.fire('Sukses', resp.success, 'success').then(() => {
                    const btn = document.querySelector(`#register-btn-${dudiId}`);
                    if (btn) {
                        btn.innerText = "Menunggu Verifikasi";
                        btn.disabled = true;
                    }
                    let counter = document.querySelector("#counter-sudah-daftar");
                    if (counter) counter.innerText = parseInt(counter.innerText) + 1;
                    let sisa = document.querySelector("#counter-sisa-kuota");
                    if (sisa) sisa.innerText = parseInt(sisa.innerText) - 1;
                });
            } else {
                Swal.fire('Error', resp.error, 'error');
            }
        });
    }


    

    function updateCounter() {
        const counters = document.querySelectorAll('.counter-number');
        counters[0].textContent = registrationCount;
        counters[1].textContent = 3 - registrationCount;
    }

    function showNotification() {
        const notification = document.getElementById('notification');
        notification.classList.add('show');
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);
    }

    // Animate cards on load
    window.addEventListener('load', () => {
        const cards = document.querySelectorAll('.dudi-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.dudi-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.company-name').textContent.toLowerCase();
                const location = card.querySelector('.info-row span:last-child').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || location.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
</script>
<?= $this->endSection() ?>