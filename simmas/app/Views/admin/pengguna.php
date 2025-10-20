<?= $this->extend('admin/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
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

    .contact-email2 {
        font-size: 10px;
        color: #64748b;
        margin-top: 4px
    }

    .badge-bg-success {
        background-color: #dcfce7; /* hijau muda */
        color: #166534;            /* hijau tua */
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 12px;
    }

    .badge-bg-danger {
        background-color: #fee2e2; /* merah muda */
        color: #991b1b;            /* merah tua */
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 12px;
    }
    
    /* Status Badge */
    .status-badge {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-admin { background: #ede9fe; color: #5b21b6; } 
    /* .status-dudi  { background: #fef3c7; color: #92400e; } */
    .status-siswa { background: #e0e7ff; color: #3730a3; } 
    .status-guru  { background: #e0f2fe; color: #0369a1; }


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
    .swal2-select:focus {
        outline: none !important;
        border-color: #0ea5e9 !important;
        background: white !important;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1) !important;
    }
    
    .swal2-select {
        cursor: pointer !important;
    }
    
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
<div class="container" id="pengguna">
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>Manajemen User</h1>
                <p class="header-subtitle">Kelola semua akun pengguna sistem</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info">Admin Sistem</div>
                <span class="user-role">Administrator</span>
            </div>
        </div>

        <!-- Daftar user Panel -->
        <div class="panel">
            <div class="panel-header">
                <div class="panel-header-left">
                    <span class="panel-icon">📋</span>
                    <span class="panel-title">Daftar user</span>
                </div>
                <button class="btn-primary" onclick="tambahuser()">
                    + Tambah user
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
                        <input type="text" id="searchInput" placeholder="Cari user, email, role..." onkeyup="searchTable()">
                    </div>
                    
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table id="userTable">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email & Verifikasi</th>
                                <th>Role</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="penggunaTableBody">
                        <?php foreach($allUser as $user): ?>
                        <tr data-id="<?= $user['id'] ?>">
                            <!-- User -->
                            <td>
                                <div class="company-cell">
                                    <div class="company-avatar"><?= strtoupper(substr($user['name'], 0, 2)) ?></div>
                                    <div class="company-info">
                                        <h4><?= $user['name'] ?></h4>
                                        <div class="company-address">ID: <?= $user['id'] ?></div>
                                    </div>
                                </div>
                            </td>

                            <!-- Email & Verifikasi -->
                            <td>
                                <div class="contact-email"><?= $user['email'] ?? '-' ?></div>
                                <div class="contact-email2">
                                    <?php if ($user['email_verified_at']): ?>
                                        <span class="badge-bg-success">Verified</span>
                                    <?php else: ?>
                                        <span class="badge-bg-danger">Unverified</span>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <!-- Role -->
                            <td>
                                <?php 
                                    $role = $user['role'] ?? 'siswa';
                                    $roleClass = match($role) {
                                        'admin' => 'status-admin',
                                        // 'dudi'  => 'status-dudi',
                                        'siswa' => 'status-siswa',
                                        'guru'  => 'status-guru',
                                        default => 'status-siswa'
                                    };
                                ?>
                                <span class="status-badge <?= $roleClass ?>"><?= ucfirst($role) ?></span>
                            </td>

                            <!-- Terdaftar / Status -->
                            <td>
                                <?= isset($user['created_at']) ? date('d M Y', strtotime($user['created_at'])) : '-' ?>
                            </td>
                            <!-- Aksi -->
                            <td>
                                <div class="actions">
                                    <button class="btn-action btn-view" onclick="detailUser(<?= $user['id'] ?>)">👁️</button>
                                    <button class="btn-action btn-edit" onclick="edituser(<?= $user['id'] ?>)">✏️</button>
                                    <button class="btn-action btn-delete" onclick="deleteuser(<?= $user['id'] ?>)">🗑️</button>
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
                        <button class="pagination-btn admin" onclick="goToPage(1)">1</button>
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
    // Action functions
    function tambahuser() {
        Swal.fire({
            title: '+ Tambah User',
            html: `
                <div class="custom-swal-form">
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">👤</span>
                            <span>Nama Lengkap</span>
                        </label>
                        <input id="name" class="swal2-input" placeholder="Masukkan nama lengkap">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">✉️</span>
                            <span>Email</span>
                        </label>
                        <input id="email" type="email" class="swal2-input" placeholder="email@example.com" name="fake-email" autocomplete="new-email">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">🔒</span>
                            <span>Password</span>
                        </label>
                        <input id="password" type="password" class="swal2-input" placeholder="Minimal 6 karakter" name="fake-password" autocomplete="new-password">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">
                            <span class="icon">🎭</span>
                            <span>Role</span>
                        </label>
                        <select id="role" class="swal2-select" onchange="toggleRoleFields()">
                            <option value="">Pilih Role</option>
                            <option value="admin">👨‍💼 Admin</option>
                            <option value="guru">👨‍🏫 Guru</option>
                            <option value="siswa">👨‍🎓 Siswa</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <span class="icon">✅</span>
                            <span>Status Verifikasi Email</span>
                        </label>
                        <select id="verified" class="swal2-select">
                            <option value="0">❌ Belum Verifikasi</option>
                            <option value="1">✅ Terverifikasi</option>
                        </select>
                    </div>

                    <!-- ✅ Field tambahan untuk SISWA -->
                    <div id="siswa-fields" style="display:none; margin-top: 15px; padding-top: 15px; border-top: 2px solid #e0e0e0;">
                        <h4 style="margin: 0 0 10px 0; color: #2196F3;">📚 Data Siswa</h4>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🎫</span>
                                <span>NIS</span>
                            </label>
                            <input id="nis" class="swal2-input" placeholder="Nomor Induk Siswa">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏫</span>
                                <span>Kelas</span>
                            </label>
                            <input id="kelas" class="swal2-input" placeholder="Contoh: XII RPL 1">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📖</span>
                                <span>Jurusan</span>
                            </label>
                            <input id="jurusan" class="swal2-input" placeholder="Contoh: RPL, TKJ, MM">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏠</span>
                                <span>Alamat</span>
                            </label>
                            <input id="alamat-siswa" class="swal2-input" placeholder="Alamat lengkap">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📱</span>
                                <span>Telepon</span>
                            </label>
                            <input id="telepon-siswa" class="swal2-input" placeholder="Nomor telepon/HP">
                        </div>
                    </div>

                    <!-- ✅ Field tambahan untuk GURU -->
                    <div id="guru-fields" style="display:none; margin-top: 15px; padding-top: 15px; border-top: 2px solid #e0e0e0;">
                        <h4 style="margin: 0 0 10px 0; color: #4CAF50;">👨‍🏫 Data Guru</h4>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🎫</span>
                                <span>NIP</span>
                            </label>
                            <input id="nip" class="swal2-input" placeholder="Nomor Induk Pegawai">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏠</span>
                                <span>Alamat</span>
                            </label>
                            <input id="alamat-guru" class="swal2-input" placeholder="Alamat lengkap">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📱</span>
                                <span>Telepon</span>
                            </label>
                            <input id="telepon-guru" class="swal2-input" placeholder="Nomor telepon/HP">
                        </div>
                    </div>
                </div>
            `,
            width: '600px',
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            didOpen: () => {
                // Tambahkan fungsi toggle di dalam Swal
                window.toggleRoleFields = function() {
                    const role = document.getElementById('role').value;
                    const siswaFields = document.getElementById('siswa-fields');
                    const guruFields = document.getElementById('guru-fields');
                    
                    // Sembunyikan semua field dulu
                    siswaFields.style.display = 'none';
                    guruFields.style.display = 'none';
                    
                    // Tampilkan sesuai role
                    if (role === 'siswa') {
                        siswaFields.style.display = 'block';
                    } else if (role === 'guru') {
                        guruFields.style.display = 'block';
                    }
                };
            },
            preConfirm: () => {
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const role = document.getElementById('role').value;
                
                // Validasi
                if (!name || !email || !password || !role) {
                    Swal.showValidationMessage('Harap isi semua field yang wajib!');
                    return false;
                }
                
                if (password.length < 6) {
                    Swal.showValidationMessage('Password minimal 6 karakter!');
                    return false;
                }

                // Data dasar
                const data = {
                    name: name,
                    email: email,
                    password: password,
                    role: role,
                    verified: document.getElementById('verified').value
                };

                // ✅ Tambahkan data role-specific jika ada
                if (role === 'siswa') {
                    data.nis = document.getElementById('nis').value;
                    data.kelas = document.getElementById('kelas').value;
                    data.jurusan = document.getElementById('jurusan').value;
                    data.alamat = document.getElementById('alamat-siswa').value;
                    data.telepon = document.getElementById('telepon-siswa').value;
                } else if (role === 'guru') {
                    data.nip = document.getElementById('nip').value;
                    data.alamat = document.getElementById('alamat-guru').value;
                    data.telepon = document.getElementById('telepon-guru').value;
                }

                return data;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading
                Swal.fire({
                    title: 'Menyimpan...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(`/admin/add-user`, {
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
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: resp.error || 'Terjadi kesalahan'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal menghubungi server: ' + error.message
                    });
                });
            }
        });
    }
 
    // clear
    function detailUser(id) {
        fetch(`/admin/get-user/${id}`)
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    let u = result.data;
                    Swal.fire({
                        title: 'Detail User',
                        html: `
                            <table class="table table-bordered text-start">
                                <tr><th>ID</th><td>${u.id}</td></tr>
                                <tr><th>Nama</th><td>${u.name}</td></tr>
                                <tr><th>Email</th><td>${u.email}</td></tr>
                                <tr><th>Role</th><td>${u.role}</td></tr>
                                <tr><th>Email Verified</th><td>${u.email_verified ? 'Ya' : 'Tidak'}</td></tr>
                                <tr><th>Dibuat</th><td>${u.created_at}</td></tr>
                                <tr><th>Update</th><td>${u.updated_at}</td></tr>
                            </table>
                        `,
                        confirmButtonText: 'Tutup',
                        width: '600px'
                    });
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            });
    }

    // clear
    function edituser(id) {
        fetch(`/admin/get-user/${id}`)
        .then(res => res.json())
        .then(resp => {
            const user = resp.data;

            Swal.fire({
                title: '✏️ Edit User',
                html: `
                    <div class="custom-swal-form">
                        <div class="form-group">
                            <label class="form-label required">
                                <span class="icon">👤</span>
                                <span>Nama Lengkap</span>
                            </label>
                            <input id="name" class="swal2-input" placeholder="Masukkan nama lengkap" value="${user.name ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                <span class="icon">✉️</span>
                                <span>Email</span>
                            </label>
                            <input id="email" type="email" class="swal2-input" placeholder="email@example.com" value="${user.email ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required">
                                <span class="icon">🎭</span>
                                <span>Role</span>
                            </label>
                            <select id="role" class="swal2-select" onchange="toggleEditRoleFields()">
                                <option value="admin" ${user.role === 'admin' ? 'selected' : ''}>👨‍💼 Admin</option>
                                <option value="guru" ${user.role === 'guru' ? 'selected' : ''}>👨‍🏫 Guru</option>
                                <option value="siswa" ${user.role === 'siswa' ? 'selected' : ''}>👨‍🎓 Siswa</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">✅</span>
                                <span>Status Verifikasi Email</span>
                            </label>
                            <select id="verified" class="swal2-select">
                                <option value="1" ${user.email_verified_at ? 'selected' : ''}>✅ Terverifikasi</option>
                                <option value="0" ${!user.email_verified_at ? 'selected' : ''}>❌ Belum Verifikasi</option>
                            </select>
                        </div>

                        <!-- ✅ Field tambahan untuk SISWA -->
                    <div id="siswa-edit-fields" style="display:none; margin-top: 15px; padding-top: 15px; border-top: 2px solid #e0e0e0;">
                        <h4 style="margin: 0 0 10px 0; color: #2196F3;">📚 Data Siswa</h4>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🎫</span>
                                <span>NIS</span>
                            </label>
                            <input id="nis" class="swal2-input" placeholder="Nomor Induk Siswa" value="${user.siswa?.nis ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏫</span>
                                <span>Kelas</span>
                            </label>
                            <input id="kelas" class="swal2-input" placeholder="Contoh: XII RPL 1" value="${user.siswa?.kelas ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📖</span>
                                <span>Jurusan</span>
                            </label>
                            <input id="jurusan" class="swal2-input" placeholder="Contoh: RPL, TKJ, MM" value="${user.siswa?.jurusan ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏠</span>
                                <span>Alamat</span>
                            </label>
                            <input id="alamat-siswa" class="swal2-input" placeholder="Alamat lengkap" value="${user.siswa?.alamat ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📱</span>
                                <span>Telepon</span>
                            </label>
                            <input id="telepon-siswa" class="swal2-input" placeholder="Nomor telepon/HP" value="${user.siswa?.telepon ?? ''}">
                        </div>
                    </div>

                    <!-- ✅ Field tambahan untuk GURU -->
                    <div id="guru-edit-fields" style="display:none; margin-top: 15px; padding-top: 15px; border-top: 2px solid #e0e0e0;">
                        <h4 style="margin: 0 0 10px 0; color: #4CAF50;">👨‍🏫 Data Guru</h4>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🎫</span>
                                <span>NIP</span>
                            </label>
                            <input id="nip" class="swal2-input" placeholder="Nomor Induk Pegawai" value="${user.guru?.nip ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">🏠</span>
                                <span>Alamat</span>
                            </label>
                            <input id="alamat-guru" class="swal2-input" placeholder="Alamat lengkap" value="${user.guru?.alamat ?? ''}">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span class="icon">📱</span>
                                <span>Telepon</span>
                            </label>
                            <input id="telepon-guru" class="swal2-input" placeholder="Nomor telepon/HP" value="${user.guru?.telepon ?? ''}">
                        </div>
                    </div>

                        <div class="info-box">
                            <span class="info-icon">⚠️</span>
                            <div class="info-text">
                                <strong>Catatan:</strong> Password tidak dapat diubah di sini.<br>
                                Gunakan fitur <strong>Reset Password</strong> untuk mengganti password.
                            </div>
                        </div>
                    </div>
                `,
                width: '600px',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Batal',
                didOpen: () => {
                    // Toggle fields berdasarkan role saat ini
                    window.toggleEditRoleFields = function() {
                        const role = document.getElementById('role').value;
                        const siswaFields = document.getElementById('siswa-edit-fields');
                        const guruFields = document.getElementById('guru-edit-fields');
                        
                        siswaFields.style.display = 'none';
                        guruFields.style.display = 'none';
                        
                        if (role === 'siswa') {
                            siswaFields.style.display = 'block';
                        } else if (role === 'guru') {
                            guruFields.style.display = 'block';
                        }
                    };
                    
                    // Panggil sekali untuk set awal
                    toggleEditRoleFields();
                },
                preConfirm: () => {
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const role = document.getElementById('role').value;
                    
                    if (!name || !email) {
                        Swal.showValidationMessage('Nama dan email harus diisi!');
                        return false;
                    }

                    const data = {
                        name: name,
                        email: email,
                        role: role,
                        verified: document.getElementById('verified').value
                    };

                    // Tambahkan data role-specific
                    if (role === 'siswa') {
                        data.nis = document.getElementById('nis').value;
                        data.kelas = document.getElementById('kelas').value;
                        data.jurusan = document.getElementById('jurusan').value;
                        data.alamat = document.getElementById('alamat-siswa').value;
                        data.telepon = document.getElementById('telepon-siswa').value;
                    } else if (role === 'guru') {
                        data.nip = document.getElementById('nip').value;
                        data.alamat = document.getElementById('alamat-guru').value;
                        data.telepon = document.getElementById('telepon-guru').value;
                    }

                    return data;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Memperbarui...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch(`/admin/update-user/${id}`, {
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
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: resp.error || 'Terjadi kesalahan'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Gagal menghubungi server: ' + error.message
                        });
                    });
                }
            });
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Gagal mengambil data user: ' + error.message
            });
        });
    }

    // clear
    function deleteuser(userId) {
        Swal.fire({
            title: 'Yakin?',
            text: "Data user akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/delete-user/${userId}`, { method: 'POST' })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            Swal.fire('Terhapus!', resp.success, 'success')
                                .then(() => {
                                    // hapus row dari tabel
                                    const row = document.querySelector(`tr[data-id='${userId}']`);
                                    if (row) row.remove();
                                });
                        } else {
                            Swal.fire('Error', resp.error, 'error');
                        }
                    });
            }
        });
    }


</script>
<?= $this->endSection() ?>