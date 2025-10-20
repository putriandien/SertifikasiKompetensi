<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'SIMMAS' ?></title>
    <?= $this->renderSection('styles') ?>
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


        .btn-tambah {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 14px;
        }

        .btn-tambah:hover {
            background: #2563eb;
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

        /* Pagination */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .pagination-info {
            font-size: 14px;
            color: #64748b;
        }

        .pagination-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pagination-btn {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        }

        .pagination-btn:hover:not(:disabled) {
            background: #f8fafc;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-btn.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .pagination-nav {
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* search */
        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 8px 8px 8px 36px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            width: 320px;
            font-size: 14px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #3b82f6;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?= view('siswa/templates/sidebar') ?>


    <!-- <div class="content" style="margin-left: 280px; padding: 20px;"> -->
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->renderSection('scripts') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Global variables
        let currentPage = 1;
        let entriesPerPage = 5;
        let allRows = [];
        let filteredRows = [];
        
        // Variabel filter
        let activeFilters = {
            status: '',
            bulan: '',
            tahun: ''
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateDate();
            isiDropdownTahun();
            initializeTable();
            animateNumbers();
            
            // Update date every minute
            setInterval(updateDate, 60000);
        });

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
            const dateElement = document.getElementById('currentDate');
            if (dateElement) {
                dateElement.textContent = dateString;
            }
        }

        // Isi dropdown tahun
        function isiDropdownTahun() {
            const select = document.getElementById('filterTahun');
            if (!select) {
                console.warn('Element filterTahun tidak ditemukan');
                return;
            }
            
            const currentYear = new Date().getFullYear();
            
            // Hapus option yang sudah ada kecuali option pertama (Semua Tahun)
            while (select.options.length > 1) {
                select.remove(1);
            }
            
            for (let year = currentYear; year >= currentYear - 5; year--) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                select.appendChild(option);
            }
        }

        // Initialize table
        function initializeTable() {
            const tbody = document.getElementById('jurnalTableBody');
            if (!tbody) return;

            allRows = Array.from(tbody.querySelectorAll('tr'));
            applyFilters();
        }

        // Terapkan filter
        function terapkanFilter() {
            const filterStatus = document.getElementById('filterStatus');
            const filterBulan = document.getElementById('filterBulan');
            const filterTahun = document.getElementById('filterTahun');
            
            if (!filterStatus || !filterBulan || !filterTahun) {
                console.warn('Salah satu elemen filter tidak ditemukan');
                return;
            }
            
            activeFilters.status = filterStatus.value;
            activeFilters.bulan = filterBulan.value;
            activeFilters.tahun = filterTahun.value;

            tampilkanFilterAktif();
            applyFilters();
        }

        // Tampilkan badge filter aktif
        function tampilkanFilterAktif() {
            const container = document.getElementById('activeFilters');
            if (!container) return;
            
            const badges = [];

            const namaBulan = {
                '01': 'Januari', '02': 'Februari', '03': 'Maret', '04': 'April',
                '05': 'Mei', '06': 'Juni', '07': 'Juli', '08': 'Agustus',
                '09': 'September', '10': 'Oktober', '11': 'November', '12': 'Desember'
            };

            if (activeFilters.status) {
                const statusLabel = activeFilters.status === 'disetujui' ? 'Disetujui' : 
                                activeFilters.status === 'pending' ? 'Menunggu' : 'Ditolak';
                badges.push(`
                    <div class="filter-badge">
                        Status: ${statusLabel}
                        <span class="filter-badge-remove" onclick="hapusFilter('status')">✕</span>
                    </div>
                `);
            }

            if (activeFilters.bulan) {
                badges.push(`
                    <div class="filter-badge">
                        Bulan: ${namaBulan[activeFilters.bulan]}
                        <span class="filter-badge-remove" onclick="hapusFilter('bulan')">✕</span>
                    </div>
                `);
            }

            if (activeFilters.tahun) {
                badges.push(`
                    <div class="filter-badge">
                        Tahun: ${activeFilters.tahun}
                        <span class="filter-badge-remove" onclick="hapusFilter('tahun')">✕</span>
                    </div>
                `);
            }

            if (badges.length > 0) {
                container.innerHTML = badges.join('');
                container.style.display = 'flex';
            } else {
                container.style.display = 'none';
            }
        }

        // Hapus filter tertentu
        function hapusFilter(jenis) {
            activeFilters[jenis] = '';
            const filterElement = document.getElementById('filter' + jenis.charAt(0).toUpperCase() + jenis.slice(1));
            if (filterElement) {
                filterElement.value = '';
            }
            tampilkanFilterAktif();
            applyFilters();
        }

        // Reset semua filter
        function resetFilter() {
            activeFilters = { status: '', bulan: '', tahun: '' };
            
            const filterStatus = document.getElementById('filterStatus');
            const filterBulan = document.getElementById('filterBulan');
            const filterTahun = document.getElementById('filterTahun');
            const searchInput = document.getElementById('searchInput');
            
            if (filterStatus) filterStatus.value = '';
            if (filterBulan) filterBulan.value = '';
            if (filterTahun) filterTahun.value = '';
            if (searchInput) searchInput.value = '';
            
            tampilkanFilterAktif();
            applyFilters();
        }

        // Apply all filters
        function applyFilters() {
            const searchInput = document.getElementById('searchInput');
            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            
            filteredRows = allRows.filter(row => {
                if (row.dataset.deleted === 'true') return false;
                
                let show = true;

                // Filter status
                if (activeFilters.status) {
                    const rowStatus = row.getAttribute('data-status');
                    if (!rowStatus || rowStatus !== activeFilters.status) {
                        show = false;
                    }
                }

                // Filter bulan dan tahun
                if (activeFilters.bulan || activeFilters.tahun) {
                    const tanggal = row.getAttribute('data-tanggal');
                    if (tanggal) {
                        const [tahun, bulan] = tanggal.split('-');

                        if (activeFilters.bulan && bulan !== activeFilters.bulan) {
                            show = false;
                        }

                        if (activeFilters.tahun && tahun !== activeFilters.tahun) {
                            show = false;
                        }
                    } else {
                        // Jika tidak ada data tanggal, hide saat filter bulan/tahun aktif
                        show = false;
                    }
                }

                // Filter search
                if (searchTerm && show) {
                    const text = row.textContent.toLowerCase();
                    if (!text.includes(searchTerm)) {
                        show = false;
                    }
                }

                return show;
            });
            
            currentPage = 1;
            updateTable();
        }

        // Search function
        function searchTable() {
            applyFilters();
        }

        // Change entries per page
        function changeEntriesPerPage() {
            const entriesSelect = document.getElementById('entriesPerPage');
            if (!entriesSelect) {
                console.warn('Element entriesPerPage tidak ditemukan');
                return;
            }
            entriesPerPage = parseInt(entriesSelect.value);
            currentPage = 1;
            updateTable();
        }

        // Update table display
        function updateTable() {
            const startIndex = (currentPage - 1) * entriesPerPage;
            const endIndex = startIndex + entriesPerPage;
            
            // Hide all rows
            allRows.forEach(row => {
                row.style.display = 'none';
            });
            
            // Show filtered rows for current page
            const currentRows = filteredRows.slice(startIndex, endIndex);
            currentRows.forEach(row => {
                row.style.display = '';
            });
            
            updatePagination();
        }

        // Update pagination
        function updatePagination() {
            const totalEntries = filteredRows.length;
            const totalPages = Math.ceil(totalEntries / entriesPerPage);
            const startIndex = (currentPage - 1) * entriesPerPage;
            const endIndex = Math.min(startIndex + entriesPerPage, totalEntries);
            
            // Update pagination info
            const paginationInfo = document.getElementById('paginationInfo');
            if (paginationInfo) {
                paginationInfo.textContent = 
                    `Menampilkan ${totalEntries === 0 ? 0 : startIndex + 1} sampai ${endIndex} dari ${totalEntries} entri`;
            }
            
            // Update pagination controls
            const controls = document.getElementById('paginationControls');
            if (!controls) return;
            
            controls.innerHTML = '';
            
            // Previous button
            const prevBtn = document.createElement('button');
            prevBtn.className = 'pagination-btn pagination-nav';
            prevBtn.onclick = previousPage;
            prevBtn.disabled = currentPage === 1;
            prevBtn.textContent = '◀';
            controls.appendChild(prevBtn);
            
            // Page buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
                pageBtn.textContent = i;
                pageBtn.onclick = () => goToPage(i);
                controls.appendChild(pageBtn);
            }
            
            // Next button
            const nextBtn = document.createElement('button');
            nextBtn.className = 'pagination-btn pagination-nav';
            nextBtn.onclick = nextPage;
            nextBtn.disabled = currentPage === totalPages || totalPages === 0;
            nextBtn.textContent = '▶';
            controls.appendChild(nextBtn);
        }

        // Pagination functions
        function goToPage(page) {
            currentPage = page;
            updateTable();
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                updateTable();
            }
        }

        function nextPage() {
            const totalPages = Math.ceil(filteredRows.length / entriesPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                updateTable();
            }
        }

        // Animate numbers on page load
        function animateNumbers() {
            const numbers = document.querySelectorAll('.stat-number');
            if (!numbers.length) {
                console.warn('Tidak ada elemen .stat-number ditemukan');
                return;
            }
            
            numbers.forEach(number => {
                const finalValue = parseInt(number.textContent) || 0;
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
    </script>
</body>
</html>
