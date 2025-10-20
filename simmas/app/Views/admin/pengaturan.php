<?= $this->extend('admin/templates/layout') ?>

<?= $this->section('styles') ?>
<style>
    /* Content Grid */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 24px;
    }
    /* Panel */
    .panel {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .panel-header {
        padding: 20px 24px;
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
    .panel-icon {
        font-size: 18px;
    }
    .panel-title {
        font-weight: 600;
        font-size: 16px;
    }
    .panel-content {
        padding: 24px;
    }
    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 8px;
        color: #475569;
    }
    .form-label-icon {
        font-size: 16px;
    }
    .form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.2s;
        background: #f8fafc;
    }
    .form-input:focus {
        outline: none;
        border-color: #0ea5e9;
        background: white;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
    }
    .form-input:disabled {
        background: #f1f5f9;
        cursor: not-allowed;
        color: #94a3b8;
    }
    textarea.form-input {
        min-height: 80px;
        resize: vertical;
    }
    /* Logo Upload */
    .logo-upload-area {
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        background: #f8fafc;
        transition: all 0.2s;
    }
    .logo-upload-area:hover {
        border-color: #0ea5e9;
        background: #f0f9ff;
    }
    .logo-preview {
        width: 80px;
        height: 80px;
        background: #0ea5e9;
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin: 0 auto 12px;
    }
    .upload-text {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
    }
    .upload-hint {
        font-size: 11px;
        color: #94a3b8;
    }
    .btn-upload {
        display: inline-block;
        padding: 8px 16px;
        background: #0ea5e9;
        color: white;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 8px;
        border: none;
    }
    .btn-upload:hover {
        background: #0284c7;
    }
    /* Buttons */
    .btn-group {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #e2e8f0;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .btn-primary {
        background: #0ea5e9;
        color: white;
    }
    .btn-primary:hover {
        background: #0284c7;
    }
    .btn-success {
        background: #10b981;
        color: white;
    }
    .btn-success:hover {
        background: #059669;
    }
    .btn-apa {
        background: blue;
        color: white;
    }
    .btn-apa:hover {
        background: #059669;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #475569;
    }
    .btn-secondary:hover {
        background: #e2e8f0;
    }
    .btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    /* Preview Section */
    .preview-section {
        margin-bottom: 20px;
    }
    .preview-label {
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 12px;
        display: block;
    }
    .preview-box {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
        background: #f8fafc;
    }
    /* Dashboard Header Preview */
    .dashboard-preview {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .dashboard-logo {
        width: 48px;
        height: 48px;
        background: #0ea5e9;
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }
    .dashboard-info h3 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 4px;
        color: #1e293b;
    }
    .dashboard-info p {
        font-size: 12px;
        color: #64748b;
    }
    /* Header Rapor Preview */
    .header-rapor-preview {
        text-align: center;
    }
    .rapor-logo {
        width: 64px;
        height: 64px;
        background: #0ea5e9;
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin: 0 auto 12px;
    }
    .rapor-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 4px;
        color: #1e293b;
    }
    .rapor-subtitle {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 2px;
    }
    .rapor-divider {
        height: 2px;
        background: linear-gradient(to right, #e2e8f0, #cbd5e1, #e2e8f0);
        margin: 16px 0;
    }
    .rapor-doc-title {
        font-size: 14px;
        font-weight: 600;
        color: #475569;
    }
    /* Info Alert */
    .info-alert {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 10px;
        padding: 16px;
        font-size: 13px;
        color: #0c4a6e;
        line-height: 1.6;
    }
    .info-alert strong {
        font-weight: 600;
    }
    /* Sidebar Preview */
    .sidebar-preview {
        background: #1e293b;
        border-radius: 10px;
        padding: 16px;
        color: white;
    }
    .sidebar-logo-area {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
    }
    .sidebar-icon {
        width: 36px;
        height: 36px;
        background: #0ea5e9;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    .sidebar-text {
        flex: 1;
    }
    .sidebar-name {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    .sidebar-subtitle {
        font-size: 10px;
        opacity: 0.7;
    }
    @media (max-width: 1200px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 768px) {
        .main-content {
            margin-left: 60px;
            padding: 16px;
        }
        .header-right {
            text-align: left;
        }
    }
</style>           
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="pengaturan">
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>Pengaturan Sekolah</h1>
                <p class="header-subtitle">Kelola informasi dan konfigurasi sekolah Anda</p>
            </div>
            <div class="header-right">
                <div class="current-date" id="currentDate"></div>
                <div class="user-info">Admin Sistem</div>
                <span class="user-role">Administrator</span>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Left Column - Form -->
            <div>
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <span class="panel-icon">ℹ️</span>
                            <span class="panel-title">Informasi Sekolah</span>
                        </div>
                        <button class="btn btn-primary" id="btnEdit" onclick="toggleEdit()">
                            <span>✏️</span> Edit
                        </button>
                    </div>
                    <div class="panel-content">
                        <form id="schoolForm" novalidate>
                            <!-- Logo Sekolah -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">🖼️</span>
                                    Logo Sekolah
                                </label>
                                <div class="logo-upload-area">
                                    <div class="logo-preview" id="logoPreview">
                                        <?php if (!empty($school['logo_url'])): ?>
                                            <img src="<?= base_url('uploads/' . $school['logo_url']) ?>" alt="Logo Sekolah" style="max-height:100px; object-fit:contain;">
                                        <?php else: ?>
                                            🏫
                                        <?php endif; ?>
                                    </div>
                                    <div class="upload-text">Upload logo sekolah</div>
                                    <div class="upload-hint">Format: PNG, JPG, max 2MB</div>
                                    <button type="button" class="btn-upload" disabled id="btnUpload">Pilih File</button>
                                </div>
                            </div>

                            <!-- Nama Sekolah -->
                            <div class="form-group">
                                <label class="form-label required">
                                    <span class="form-label-icon">🏫</span>
                                    Nama Sekolah/Instansi
                                </label>
                                <input type="text" class="form-input" id="namaSekolah" value="<?= $sekolah['nama_sekolah'] ?? '' ?>" disabled>
                            </div>

                            <!-- NPSN -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">🔢</span>
                                    NPSN (Nomor Pokok Sekolah Nasional)
                                </label>
                                <input type="text" class="form-input" id="npsn" value="<?= $sekolah['npsn'] ?? '' ?>" disabled>
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">📍</span>
                                    Alamat Lengkap
                                </label>
                                <textarea class="form-input" id="alamat" disabled><?= $sekolah['alamat'] ?? '' ?></textarea>
                            </div>

                            <!-- Telepon -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">📞</span>
                                    Telepon
                                </label>
                                <input type="tel" class="form-input" id="telepon" value="<?= $sekolah['telepon'] ?? '' ?>" disabled>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">✉️</span>
                                    Email
                                </label>
                                <input type="email" class="form-input" id="email" value="<?= $sekolah['email'] ?? '' ?>" disabled>
                            </div>

                            <!-- Website -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">🌐</span>
                                    Website
                                </label>
                                <input type="url" class="form-input" id="website" value="<?= $sekolah['website'] ?? '' ?>" disabled>
                            </div>

                            <!-- Kepala Sekolah -->
                            <div class="form-group">
                                <label class="form-label">
                                    <span class="form-label-icon">👨‍💼</span>
                                    Kepala Sekolah
                                </label>
                                <input type="text" class="form-input" id="kepalaSekolah" value="<?= $sekolah['kepala_sekolah'] ?? '' ?>"disabled>
                            </div>

                            <!-- Buttons -->
                            <div class="btn-group" id="btnGroup" style="display: none;">
                                <button type="button" class="btn btn-secondary" onclick="cancelEdit()">
                                    <span>✖️</span> Batal
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <span>💾</span> Simpan Perubahan
                                </button>
                                <button type="submit" class="btn btn-apa">
                                    <span></span> apa aja
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Preview -->
            <div>
                <!-- Info Alert -->
                <div class="info-alert" style="margin-bottom: 24px;">
                    <strong>ℹ️ Informasi:</strong><br>
                    Setiap perubahan yang Anda lakukan pada <strong>Nama Sekolah</strong>, <strong>Logo</strong>, dan informasi lainnya akan secara otomatis terlihat pada preview di bawah ini dan akan diterapkan di seluruh sistem.
                </div>

                <!-- Preview Tampilan -->
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <span class="panel-icon">👁️</span>
                            <span class="panel-title">Preview Tampilan</span>
                        </div>
                    </div>
                    <div class="panel-content">
                        <!-- Dashboard Header Preview -->
                        <div class="preview-section">
                            <span class="preview-label">🏠 Dashboard Header</span>
                            <div class="preview-box">
                                <div class="dashboard-preview">
                                    <div class="dashboard-logo" id="previewDashboardLogo">🏫</div>
                                    <div class="dashboard-info">
                                        <h3 id="previewDashboardName">SMK Negeri 1 Surabaya</h3>
                                        <p>Sistem Informasi Magang</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Rapor/Sertifikat Preview -->
                        <div class="preview-section">
                            <span class="preview-label">📄 Header Rapor/Sertifikat</span>
                            <div class="preview-box">
                                <div class="header-rapor-preview">
                                    <div class="rapor-logo" id="previewRaporLogo">🏫</div>
                                    <div class="rapor-title" id="previewRaporName">SMK Negeri 1 Surabaya</div>
                                    <div class="rapor-subtitle" id="previewRaporAddress">Jl. SMEA No.4, Gayungan, Kec. Gayungan, Kota Surabaya, Jawa Timur 60235</div>
                                    <div class="rapor-subtitle" id="previewRaporContact">
                                        Telp: 031-5678888 | Email: info@smkn1surabaya.sch.id
                                    </div>
                                    <div class="rapor-subtitle" id="previewRaporWeb">Web: www.smkn1surabaya.sch.id</div>
                                    <div class="rapor-divider"></div>
                                    <div class="rapor-doc-title">SERTIFIKAT MAGANG</div>
                                </div>
                            </div>
                        </div>

                        <!-- Dokumen Cetak Preview -->
                        <div class="preview-section">
                            <span class="preview-label">🖨️ Dokumen Cetak</span>
                            <div class="preview-box">
                                <div style="display: flex; align-items: flex-start; gap: 16px; font-size: 12px; line-height: 1.8;">
                                    <div class="dashboard-logo" id="previewDocLogo" style="width: 56px; height: 56px; font-size: 28px;">🏫</div>
                                    <div style="flex: 1;">
                                        <div style="font-weight: 700; font-size: 14px; margin-bottom: 2px; color: #1e293b;" id="previewDocName">SMK Negeri 1 Surabaya</div>
                                        <div style="color: #64748b; margin-bottom: 1px;" id="previewDocNPSN">NPSN: 20537836</div>
                                        <div style="color: #64748b; margin-bottom: 1px;" id="previewDocAddress">📍 Jl. SMEA No.4, Gayungan, Kec. Gayungan, Kota Surabaya, Jawa Timur 60235</div>
                                        <div style="color: #64748b; margin-bottom: 1px;" id="previewDocPhone">📞 031-5678888</div>
                                        <div style="color: #64748b; margin-bottom: 1px;" id="previewDocEmail">📧 info@smkn1surabaya.sch.id</div>
                                        <div style="color: #64748b;" id="previewDocPrincipal">🌐 Kepala Sekolah: Drs. H. Suharto, M.Pd</div>
                                    </div>
                                </div>
                            </div>
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
    // State untuk menyimpan file yang dipilih
    let selectedLogoFile = null;

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

    // Load data sekolah
    document.addEventListener('DOMContentLoaded', function() {
        updateDate();
        setInterval(updateDate, 60000);
        loadSchoolData();
    });

    function loadSchoolData() {
        fetch('/admin/get-school/')
            .then(res => res.json())
            .then(data => {
                document.getElementById('namaSekolah').value = data.nama_sekolah || '';
                document.getElementById('npsn').value = data.npsn || '';
                document.getElementById('alamat').value = data.alamat || '';
                document.getElementById('telepon').value = data.telepon || '';
                document.getElementById('email').value = data.email || '';
                document.getElementById('website').value = data.website || '';
                document.getElementById('kepalaSekolah').value = data.kepala_sekolah || '';
                
                if (data.logo_url) {
                    const logoUrl = `<?= base_url('uploads/') ?>${data.logo_url}`;
                    document.getElementById('logoPreview').innerHTML = 
                        `<img src="${logoUrl}" style="max-height:100px; object-fit:contain;">`;
                }
                
                updatePreviews();
            })
            .catch(err => {
                console.error('Error loading school data:', err);
            });
    }
    // Toggle Edit
    function toggleEdit() {
        document.querySelectorAll("#schoolForm .form-input, #schoolForm textarea")
            .forEach(el => el.disabled = false);
        document.getElementById("btnUpload").disabled = false;
        document.getElementById("btnGroup").style.display = "flex";
        document.getElementById("btnEdit").style.display = "none";

        updatePreviews();
    }

    // Cancel Edit
    function cancelEdit() {
        selectedLogoFile = null;
        loadSchoolData(); // Reload data original
        document.querySelectorAll("#schoolForm .form-input, #schoolForm textarea")
            .forEach(el => el.disabled = true);
        document.getElementById("btnUpload").disabled = true;
        document.getElementById("btnGroup").style.display = "none";
        document.getElementById("btnEdit").style.display = "block";
    }

    // Handle logo upload button
    document.getElementById('btnUpload').addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/png, image/jpeg, image/jpg';
        
        input.onchange = function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            // Validasi format
            const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                Swal.fire('Error', 'Format file harus PNG atau JPG', 'error');
                return;
            }
            
            // Validasi ukuran (2MB)
            if (file.size > 2048000) {
                Swal.fire('Error', 'Ukuran file maksimal 2MB', 'error');
                return;
            }
            
            // Simpan file ke variable
            selectedLogoFile = file;
            
            // Preview logo
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreview').innerHTML = 
                    `<img src="${e.target.result}" style="max-height:100px; object-fit:contain;">`;
                updatePreviews();
            };
            reader.readAsDataURL(file);
        };
        
        input.click();
    });

    // Submit form
    document.getElementById("schoolForm").addEventListener("submit", function(e) {
        e.preventDefault();
        
        const formData = new FormData();
        formData.append('nama_sekolah', document.getElementById("namaSekolah").value);
        formData.append('npsn', document.getElementById("npsn").value);
        formData.append('alamat', document.getElementById("alamat").value);
        formData.append('telepon', document.getElementById("telepon").value);
        formData.append('email', document.getElementById("email").value);
        formData.append('website', document.getElementById("website").value);
        formData.append('kepala_sekolah', document.getElementById("kepalaSekolah").value);
        
        // Tambahkan file logo jika ada
        if (selectedLogoFile) {
            formData.append('logo', selectedLogoFile);
        }
        
        // Show loading
        Swal.fire({
            title: 'Menyimpan...',
            text: 'Mohon tunggu',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        fetch("/admin/update-school", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: 'Data sekolah berhasil diperbarui',
                    timer: 2000
                }).then(() => {
                    selectedLogoFile = null;
                    // Disable form kembali
                    document.querySelectorAll("#schoolForm .form-input, #schoolForm textarea")
                        .forEach(el => el.disabled = true);
                    document.getElementById("btnUpload").disabled = true;
                    document.getElementById("btnGroup").style.display = "none";
                    document.getElementById("btnEdit").style.display = "block";
                    // Reload data
                    loadSchoolData();
                });
            } else {
                Swal.fire('Gagal!', data.message || 'Terjadi kesalahan saat update', 'error');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghubungi server', 'error');
        });
    });

    // Update previews
    function updatePreviews() {
        const namaSekolah = document.getElementById('namaSekolah').value || 'Nama Sekolah';
        const npsn = document.getElementById('npsn').value || '-';
        const alamat = document.getElementById('alamat').value || 'Alamat sekolah';
        const telepon = document.getElementById('telepon').value || '-';
        const email = document.getElementById('email').value || '-';
        const website = document.getElementById('website').value || '-';
        const kepalaSekolah = document.getElementById('kepalaSekolah').value || '-';
        const logoImg = document.querySelector('#logoPreview img');
        
        // Dashboard Header
        document.getElementById('previewDashboardName').textContent = namaSekolah;
        
        // Rapor / Sertifikat
        document.getElementById('previewRaporName').textContent = namaSekolah.toUpperCase();
        document.getElementById('previewRaporAddress').textContent = alamat;
        document.getElementById('previewRaporContact').textContent = `📞 ${telepon} | ✉️ ${email}`;
        document.getElementById('previewRaporWeb').textContent = `🌐 ${website}`;
        
        // Dokumen Cetak
        document.getElementById('previewDocName').textContent = namaSekolah;
        document.getElementById('previewDocNPSN').textContent = `NPSN: ${npsn}`;
        document.getElementById('previewDocAddress').textContent = `📍 ${alamat}`;
        document.getElementById('previewDocPhone').textContent = `📞 ${telepon}`;
        document.getElementById('previewDocEmail').textContent = `📧 ${email}`;
        document.getElementById('previewDocPrincipal').textContent = `👨‍💼 Kepala Sekolah: ${kepalaSekolah}`;
        
        // Update logo jika ada
        const dashboardLogo = document.getElementById('previewDashboardLogo');
        const raporLogo = document.getElementById('previewRaporLogo');
        const docLogo = document.getElementById('previewDocLogo');
        
        if (logoImg && logoImg.src) {
            const logoSrc = logoImg.src;
            dashboardLogo.innerHTML = `<img src="${logoSrc}" style="width:48px;height:48px;object-fit:contain;border-radius:8px;">`;
            raporLogo.innerHTML = `<img src="${logoSrc}" style="width:64px;height:64px;object-fit:contain;border-radius:8px;">`;
            docLogo.innerHTML = `<img src="${logoSrc}" style="width:56px;height:56px;object-fit:contain;border-radius:8px;">`;
        } else {
            dashboardLogo.textContent = '🏫';
            raporLogo.textContent = '🏫';
            docLogo.textContent = '🏫';
        }
    }

    // Real-time preview updates
    ['namaSekolah', 'npsn', 'alamat', 'telepon', 'email', 'website', 'kepalaSekolah'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', updatePreviews);
    });


</script>
<?= $this->endSection() ?>