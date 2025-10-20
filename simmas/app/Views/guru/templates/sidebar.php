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

    /* Hamburger Menu */
    .mobile-header {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 16px 20px;
        z-index: 2000;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        align-items: center;
        gap: 16px;
    }

    .hamburger {
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
        transition: background 0.3s ease;
        flex-shrink: 0;
    }

    .hamburger:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .hamburger span {
        display: block;
        width: 25px;
        height: 3px;
        background: white;
        margin: 5px 0;
        transition: 0.3s;
        border-radius: 2px;
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }

    .mobile-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
    }

    .mobile-logo-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
        color: #667eea;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 16px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .mobile-logo-text {
        font-size: 20px;
        font-weight: 800;
        color: white;
        letter-spacing: -0.5px;
    }

    .mobile-school-name {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }

    /* Sidebar Overlay */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .sidebar-overlay.active {
        opacity: 1;
    }

    /* Sidebar */
    .sidebar {
        width: 300px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 8px 0 30px rgba(102, 126, 234, 0.15);
        backdrop-filter: blur(20px);
        z-index: 1000;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sidebar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        z-index: -1;
        pointer-events: none;
    }

    .sidebar-header {
        padding: 32px 24px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .logo-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
        color: #667eea;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .logo-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }
        50% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
        100% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }
    }

    .logo-text {
        font-size: 24px;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.5px;
    }

    .school-name {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 4px;
        font-weight: 500;
    }

    .nav-menu {
        padding: 24px 0 120px;
    }

    .nav-section {
        margin-bottom: 24px;
    }

    .nav-section-title {
        padding: 0 24px 8px;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.5);
        letter-spacing: 1px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 16px 24px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-left: 3px solid transparent;
        position: relative;
        margin: 4px 12px;
        border-radius: 12px;
        font-weight: 500;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .nav-link:hover::before {
        opacity: 1;
    }

    .nav-link:hover {
        color: white;
        transform: translateX(8px);
    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border-left-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
    }

    .nav-link.active::before {
        opacity: 1;
    }

    .nav-icon {
        width: 24px;
        height: 24px;
        margin-right: 16px;
        text-align: center;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .nav-link:hover .nav-icon {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    .nav-link.active .nav-icon {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }

    .nav-text {
        font-size: 15px;
        font-weight: 500;
    }

    /* School Profile Section */
    .school-profile {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 300px;
        padding: 24px;
        background: rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(20px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .school-info {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .school-info:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    .school-avatar {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
        color: #667eea;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        flex-shrink: 0;
    }

    .school-avatar img {
        width: 36px;
        height: 36px;
        object-fit: contain;
        border-radius: 8px;
    }

    .school-details {
        flex: 1;
        min-width: 0;
    }

    .school-details .school-name {
        font-size: 14px;
        font-weight: 600;
        color: white;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .school-role {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
    }

    /* Main Content */
    .main-content {
        margin-left: 300px;
        padding: 40px;
        min-height: 100vh;
        transition: margin-left 0.3s ease;
    }

    /* Tablet (768px - 1024px) */
    @media (max-width: 1024px) {
        .sidebar {
            width: 260px;
        }

        .school-profile {
            width: 260px;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
    }

    /* Mobile (max 768px) */
    @media (max-width: 768px) {
        .mobile-header {
            display: flex;
        }

        .sidebar {
            transform: translateX(-100%);
            width: 280px;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar-overlay.active {
            display: block;
        }

        .school-profile {
            width: 280px;
        }

        .main-content {
            margin-left: 0;
            padding: 80px 20px 20px;
        }

        .sidebar-header {
            padding: 24px;
        }
    }

    /* Small Mobile (max 480px) */
    @media (max-width: 480px) {
        .sidebar {
            width: 85%;
            max-width: 300px;
        }

        .school-profile {
            width: 85%;
            max-width: 300px;
            padding: 16px;
        }

        .nav-menu {
            padding: 16px 0 100px;
        }

        .nav-link {
            padding: 14px 16px;
            margin: 4px 8px;
        }

        .nav-section-title {
            padding: 0 16px 8px;
            font-size: 10px;
        }

        .sidebar-header {
            padding: 80px 16px 16px;
        }

        .main-content {
            padding: 70px 16px 16px;
        }
    }

    /* Demo Content */
    .demo-content {
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .demo-content h1 {
        font-size: 32px;
        color: #667eea;
        margin-bottom: 16px;
    }

    .demo-content p {
        color: #64748b;
        line-height: 1.6;
    }
</style>
<!-- Mobile Header -->
<div class="mobile-header" id="mobileHeader">
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="mobile-logo">
        <div class="mobile-logo-icon">S</div>
        <div>
            <div class="mobile-logo-text">SIMMAS</div>
            <div class="mobile-school-name">Panel Guru</div>
        </div>
    </div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">S</div>
            <div>
                <div class="logo-text">SIMMAS</div>
                <div class="school-name">Panel Guru</div>
            </div>
        </div>
    </div>
    
    <nav class="nav-menu">
        <?php 
            $uri = service('uri'); 
            $segment1 = $uri->getSegment(1); // ambil 'guru'
            $segment2 = $uri->getSegment(2); // ambil 'dashboard' / 'dudi' / dll
        ?>
        <div class="nav-section">
            <div class="nav-section-title">Main Menu</div>
            <?php if (session()->get('role') === 'guru'): ?>
            <a href="/guru/dashboard" class="nav-link <?= ($segment1 == 'guru' && $segment2 == 'dashboard') ? 'active' : '' ?>">
                <div class="nav-icon">📊</div>
                <span class="nav-text">Dashboard</span>
            </a>
            <a href="/guru/dudi" class="nav-link <?= ($segment1 == 'guru' && $segment2 == 'dudi') ? 'active' : '' ?>">
                <div class="nav-icon">🏢</div>
                <span class="nav-text">DUDI</span>
            </a>
        </div>
        
        <div class="nav-section">
            <div class="nav-section-title">Management</div>
            <a href="/guru/magang" class="nav-link <?= ($segment1 == 'guru' && $segment2 == 'magang') ? 'active' : '' ?>">
                <div class="nav-icon">🎯</div>
                <span class="nav-text">Magang</span>
            </a>
            <a href="/guru/jurnal-harian" class="nav-link <?= ($segment1 == 'guru' && $segment2 == 'jurnal-harian') ? 'active' : '' ?>">
                <div class="nav-icon">📋</div>
                <span class="nav-text">Jurnal Harian</span>
            </a>
        </div>

    <div class="nav-section">
            <div class="nav-section-title">System</div>
            <a href="/logout" class="nav-link" onclick="handleLogout(event)">
                <div class="nav-icon">🚪</div>
                <span class="nav-text">Keluar</span>
            </a>
        </div>
        <?php endif; ?>
    </nav>
    
    <?php
    $school = model('SchoolModel')->first();
    ?>

    <div class="school-profile">
        <div class="school-info">
            <div class="school-avatar">
                <?php if (!empty($school['logo_url'])): ?>
                    <img src="<?= base_url('uploads/' . $school['logo_url']) ?>"
                        alt="Logo Sekolah"
                        style="width:36px;height:36px;object-fit:contain;border-radius:8px;">
                <?php else: ?>
                    🏫
                <?php endif; ?>
            </div>
            <div class="school-details">
                <div class="school-name">
                    <?= !empty($school['nama_sekolah']) ? esc($school['nama_sekolah']) : 'Nama Sekolah'; ?>
                </div>
                <div class="school-role">Sistem Pelaporan v1.0</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle Logout
    function handleLogout(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Konfirmasi Keluar',
            text: 'Apakah Anda yakin ingin keluar dari sistem?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Keluar...',
                    text: 'Mohon tunggu',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Proses logout
                fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Keluar',
                            text: 'Anda akan diarahkan ke halaman login',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = '/login';
                        });
                    } else {
                        Swal.fire('Gagal', 'Terjadi kesalahan saat logout', 'error');
                    }
                })
                .catch(err => {
                    console.error('Logout error:', err);
                    // Fallback: redirect langsung
                    window.location.href = '/logout';
                });
            }
        });
    }
    // Toggle Sidebar (Mobile)
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', () => {
        hamburger.classList.remove('active');
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>