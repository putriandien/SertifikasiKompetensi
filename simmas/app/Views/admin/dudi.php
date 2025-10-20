<?= $this->extend('admin/templates/layout') ?>

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
        .stat-icon.dudi-aktif { background: #10b981; }
        .stat-icon.dudi-tidak-aktif { background: #ef4444; }
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
        
        /* Status badge style */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            margin-top: 4px;
        }
        
        .status-aktif {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-nonaktif {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
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
                <div class="user-info">Admin Sistem</div>
                <span class="user-role">Administrator</span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total-dudi">🏢</div>
                <div class="stat-number" id="totalDudi"><?= $totalDudi ?></div>
                <div class="stat-label">Total DUDI</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon dudi-aktif">✅</div>
                <div class="stat-number" id="dudiAktif"><?= $totalAktifDudi ?></div>
                <div class="stat-label">DUDI Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon dudi-tidak-aktif">❌</div>
                <div class="stat-number" id="dudiTidakAktif"><?= $totalNonaktifDudi ?></div>
                <div class="stat-label">DUDI Tidak Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon siswa-magang">👥</div>
                <div class="stat-number" id="totalSiswaMagang"><?= $totalMagang ?></div>
                <div class="stat-label">Total Siswa Magang</div>
            </div>
        </div>

        <!-- Daftar DUDI Panel -->
        <div class="panel">
            <div class="panel-header">
                <div class="panel-header-left">
                    <span class="panel-icon">📋</span>
                    <span class="panel-title">Daftar DUDI</span>
                </div>
                <button class="btn-primary" onclick="tambahDudi()">
                    + Tambah DUDI
                </button>
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
                                <th>Status</th>
                                <th>Siswa Magang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="dudiTableBody">

                        <?php foreach($allDudi as $dudi): ?>
                            <tr data-deleted="<?= $dudi['deleted_at'] !== null ? 'true' : 'false' ?>" data-id="<?= $dudi['id'] ?>">
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
                                    <span class="status-badge <?= $dudi['status'] === 'aktif' ? 'status-aktif' : 'status-nonaktif' ?>"><?= ucfirst($dudi['status']) ?></span>
                                </td>
                                <td>
                                    <button class="siswa-count" onclick="lihatSiswaMagang(<?= $dudi['id'] ?>)"><?= $dudi['jumlah_siswa'] ?? 0 ?></button>
                                </td>
                                <td>
                                    <div class="actions">
                                        <?php if ($dudi['deleted_at'] === null): ?>
                                            <!-- Belum dihapus -->
                                            <button class="btn-icon btn-view" onclick="detailDudi(<?= $dudi['id'] ?>)">👁️</button>
                                            <button class="btn-icon btn-edit" onclick="editDudi(<?= $dudi['id'] ?>)">✏️</button>
                                            <button class="btn-icon btn-delete" onclick="deleteDudi(<?= $dudi['id'] ?>)">🗑️</button>


                                        <?php else: ?>
                                            <!-- Sudah dihapus -->
                                            <button class="btn-icon btn-view" onclick="restoreDudi(<?= $dudi['id'] ?>)">🔄</button>
                                        <?php endif; ?>                                    
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
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    window.guruList = <?= json_encode($guruList) ?>;
    // Action functions
    function tambahDudi() {
        Swal.fire({
            title: '+ Tambah DUDI',
            html: `
                <div class="custom-swal-form">
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">🏢</span>
                            <span>Nama Perusahaan</span>
                        </label>
                        <input id="nama_perusahaan" class="swal2-input" value="" placeholder="Masukkan nama perusahaan">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">📍</span>
                            <span>Alamat</span>
                        </label>
                        <textarea id="alamat" class="swal2-textarea" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">📞</span>
                            <span>Telepon</span>
                        </label>
                        <input id="telepon" class="swal2-input" value="" placeholder="Contoh: 021-12345678">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">✉️</span>
                            <span>Email</span>
                        </label>
                        <input id="email" type="email" class="swal2-input" value="" placeholder="email@perusahaan.com">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">👨‍💼</span>
                            <span>Penanggung Jawab</span>
                        </label>
                        <input id="penanggung_jawab" class="swal2-input" value="" placeholder="Nama penanggung jawab">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">🎓</span>
                            <span>Guru Pembimbing</span>
                        </label>
                        <select id="guru_id" class="swal2-select">
                            ${window.guruList.map(g => `<option value="${g.id}">${g.nama}</option>`).join('')}
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">👥</span>
                            <span>Kuota</span>
                        </label>
                        <input id="kuota" type="number" min="1" class="swal2-input" placeholder="Masukkan jumlah kuota siswa">
                    </div>

                    <div class="form-group">
                        <label class="form-label">📝 Deskripsi (opsional)</label>
                        <textarea id="deskripsi" class="swal2-textarea" placeholder="Masukkan deskripsi singkat"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <span class="icon">🔄</span>
                            <span>Status</span>
                        </label>
                        <select id="status" class="swal2-select">
                            <option value="aktif">✅ Aktif</option>
                            <option value="nonaktif">❌ Nonaktif</option>
                            <option value="pending">⏳ Pending</option>
                        </select>
                    </div>
                </div>
            `,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            preConfirm: () => {
                const nama = document.getElementById('nama_perusahaan').value.trim();
                const alamat = document.getElementById('alamat').value.trim();
                const telepon = document.getElementById('telepon').value.trim();
                const email = document.getElementById('email').value.trim();
                const pj = document.getElementById('penanggung_jawab').value.trim();
                const guru_id = document.getElementById('guru_id').value;
                const kuota = document.getElementById('kuota').value;

                // ✅ Validasi input wajib
                if (!nama || !alamat || !telepon || !email || !pj || !guru_id || !kuota) {
                    Swal.showValidationMessage('Semua field wajib diisi!');
                    return false;
                }

                // ✅ Validasi format email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    Swal.showValidationMessage('Format email tidak valid!');
                    return false;
                }

                // ✅ Validasi kuota minimal 1
                if (parseInt(kuota) < 1) {
                    Swal.showValidationMessage('Kuota minimal 1!');
                    return false;
                }

                return {
                    nama_perusahaan: nama,
                    alamat,
                    telepon,
                    email,
                    penanggung_jawab: pj,
                    guru_id,
                    kuota,
                    deskripsi: document.getElementById('deskripsi').value || null,
                    status: document.getElementById('status').value
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/add-dudi`, {
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

    
    // clear
    function detailDudi(dudiId) {
        fetch(`/admin/get-dudi/${dudiId}`)
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    title: data.nama_perusahaan,
                    html: `
                        <table class="table table-bordered text-start">
                            <tr><th>Perusahaan:</th><td>${data.nama_perusahaan}</td></tr>
                            <tr><th>Alamat:</th><td>${data.alamat}</td></tr>
                            <tr><th>No. Telp:</th><td>${data.telepon}</td></tr>
                            <tr><th>Email:</th><td>${data.email}</td></tr>
                            <tr><th>Penanggung Jawab:</th><td>${data.penanggung_jawab}</td></tr>
                            <tr><th>Status:</th><td>${data.status}</td></tr>
                        </table>
                    `,
                    icon: 'info'
                });
            });
    }

    // clear
    function editDudi(dudiId) {
        fetch(`/admin/get-dudi/${dudiId}`)
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    title: '✏️ Edit Data Perusahaan',
                    html: `
                        <div class="custom-swal-form">
                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">🏢</span>
                                    <span>Nama Perusahaan</span>
                                </label>
                                <input id="nama_perusahaan" class="swal2-input" value="${data.nama_perusahaan}" placeholder="Masukkan nama perusahaan">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">📍</span>
                                    <span>Alamat</span>
                                </label>
                                <textarea id="alamat" class="swal2-textarea" placeholder="Masukkan alamat lengkap">${data.alamat}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">📞</span>
                                    <span>Telepon</span>
                                </label>
                                <input id="telepon" class="swal2-input" value="${data.telepon}" placeholder="Contoh: 021-12345678">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">✉️</span>
                                    <span>Email</span>
                                </label>
                                <input id="email" type="email" class="swal2-input" value="${data.email}" placeholder="email@perusahaan.com">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">👨‍💼</span>
                                    <span>Penanggung Jawab</span>
                                </label>
                                <input id="penanggung_jawab" class="swal2-input" value="${data.penanggung_jawab}" placeholder="Nama penanggung jawab">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">🎓</span>
                                    <span>Guru Pembimbing</span>
                                </label>
                                <select id="guru_id" class="swal2-select">
                                    ${window.guruList.map(g => `
                                        <option value="${g.id}" ${data.guru_id == g.id ? 'selected' : ''}>
                                            ${g.nama}
                                        </option>`).join('')}
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="icon">👥</span>
                                    <span>Kuota</span>
                                </label>
                                <input id="kuota" type="number" min="1" class="swal2-input" value="${data.kuota || ''}" placeholder="Masukkan jumlah kuota siswa">
                            </div>

                            <div class="form-group">
                                <label class="form-label">📝 Deskripsi (opsional)</label>
                                <textarea id="deskripsi" class="swal2-textarea" placeholder="Masukkan deskripsi singkat">${data.deskripsi || ''}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <span class="icon">🔄</span>
                                    <span>Status</span>
                                </label>
                                <select id="status" class="swal2-select">
                                    <option value="aktif" ${data.status === 'aktif' ? 'selected' : ''}>✅ Aktif</option>
                                    <option value="nonaktif" ${data.status === 'nonaktif' ? 'selected' : ''}>❌ Nonaktif</option>
                                    <option value="pending" ${data.status === 'pending' ? 'selected' : ''}>⏳ Pending</option>
                                </select>
                            </div>
                        </div>
                    `,
                    width: '600px',
                    showCancelButton: true,
                    confirmButtonText: '💾 Simpan',
                    cancelButtonText: '✖️ Batal',
                    focusConfirm: false,
                    preConfirm: () => {
                        const nama = document.getElementById('nama_perusahaan').value.trim();
                        const alamat = document.getElementById('alamat').value.trim();
                        const telepon = document.getElementById('telepon').value.trim();
                        const email = document.getElementById('email').value.trim();
                        const pj = document.getElementById('penanggung_jawab').value.trim();
                        const guru_id = document.getElementById('guru_id').value;
                        const kuota = document.getElementById('kuota').value;

                        // ✅ Validasi input wajib
                        if (!nama || !alamat || !telepon || !email || !pj || !guru_id || !kuota) {
                            Swal.showValidationMessage('Semua field wajib diisi!');
                            return false;
                        }

                        // ✅ Validasi email format
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(email)) {
                            Swal.showValidationMessage('Format email tidak valid!');
                            return false;
                        }

                        // ✅ Validasi kuota harus > 0
                        if (parseInt(kuota) < 1) {
                            Swal.showValidationMessage('Kuota minimal 1!');
                            return false;
                        }

                        return {
                            nama_perusahaan: nama,
                            alamat,
                            telepon,
                            email,
                            penanggung_jawab: pj,
                            guru_id,
                            kuota,
                            deskripsi: document.getElementById('deskripsi').value || null,
                            status: document.getElementById('status').value
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/admin/update-dudi/${dudiId}`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(result.value)
                        })
                        .then(res => res.json())
                        .then(resp => {
                            if (resp.success) {
                                Swal.fire('Sukses', resp.success, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', resp.error, 'error');
                            }
                        });
                    }
                });
            });
    }



    // clear
    function lihatSiswaMagang(dudiId) {
        fetch(`/admin/get-siswa/${dudiId}`)
            .then(res => res.json())
            .then(data => {
                let list = '<ul style="text-align:left;list-style:disc;margin-left:20px">';
                if (data.length > 0) {
                    data.forEach(s => {
                        list += `<li>${s.nama} (${s.jurusan})</li>`;
                    });
                } else {
                    list = '<p>Tidak ada siswa magang di DUDI ini</p>';
                }
                list += '</ul>';

                Swal.fire({
                    title: 'Daftar Siswa Magang',
                    html: list,
                    icon: 'info'
                });
            })
            .catch(err => {
                Swal.fire('Error', 'Gagal mengambil data siswa', 'error');
            });
    }

    function deleteDudi(dudiId) {
        Swal.fire({
            title: 'Yakin?',
            text: "Data akan dihapus (soft delete).",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/delete-dudi/${dudiId}`, { method: 'POST' })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            Swal.fire('Terhapus!', resp.success, 'success');

                            const row = document.querySelector(`tr[data-id='${dudiId}']`);

                            // Update status badge
                            const badge = row.querySelector('.status-badge');
                            badge.textContent = 'Nonaktif';
                            badge.className = 'status-badge status-nonaktif';

                            // Update row dataset
                            row.dataset.deleted = 'true';

                            // Update tombol action menjadi restore
                            const actionsDiv = row.querySelector('.actions');
                            actionsDiv.innerHTML = `<button class="btn-action btn-restore" onclick="restoreDudi(${dudiId})">🔄</button>`;

                            updateStats();
                        } else {
                            Swal.fire('Error', resp.error, 'error');
                        }
                    });
            }
        });
    }

    function restoreDudi(dudiId) {
        Swal.fire({
            title: 'Pulihkan Data?',
            text: "Data akan dikembalikan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, pulihkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/restore-dudi/${dudiId}`, { method: 'POST' })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            Swal.fire('Dipulihkan!', resp.success, 'success');

                            const row = document.querySelector(`tr[data-id='${dudiId}']`);

                            // Update status badge
                            const badge = row.querySelector('.status-badge');
                            badge.textContent = 'Aktif';
                            badge.className = 'status-badge status-aktif';

                            // Update row dataset
                            row.dataset.deleted = 'false';

                            // Kembalikan tombol action default (detail/edit/delete)
                            const actionsDiv = row.querySelector('.actions');
                            actionsDiv.innerHTML = `
                                <button class="btn-action btn-detail" onclick="detailDudi(${dudiId})">👁️</button>
                                <button class="btn-action btn-edit" onclick="editDudi(${dudiId})">✏️</button>
                                <button class="btn-action btn-delete" onclick="deleteDudi(${dudiId})">🗑️</button>
                            `;
                        } else {
                            Swal.fire('Error', resp.error, 'error');
                        }
                    });
            }
        });
    }
    // Update statistics
    function updateStats() {
        const allRows = Array.from(document.querySelectorAll('#dudiTable tbody tr'));
        const activeRows = allRows.filter(row => row.dataset.deleted !== 'true');
        const totalDudi = activeRows.length;
        const dudiAktif = activeRows.filter(row => row.querySelector('.status-aktif')).length;
        const dudiTidakAktif = totalDudi - dudiAktif;
        const totalSiswaMagang = activeRows.reduce((sum, row) => {
            const siswaCount = parseInt(row.querySelector('.siswa-count').textContent);
            return sum + siswaCount;
        }, 0);

        // Update UI stats
        document.getElementById('totalDudi').textContent = totalDudi;
        document.getElementById('totalAktifDudi').textContent = dudiAktif;
        document.getElementById('totalNonaktifDudi').textContent = dudiTidakAktif;
        document.getElementById('totalSiswaMagang').textContent = totalSiswaMagang;
        document.getElementById('dudiAktif').textContent = dudiAktif;
        document.getElementById('dudiTidakAktif').textContent = dudiTidakAktif;

    }

</script>
<?= $this->endSection() ?>