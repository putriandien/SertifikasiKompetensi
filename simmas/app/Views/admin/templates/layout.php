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
            padding: 24px 24px 24px 40px;;
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

        .actions  {
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

        .pagination-btn.admin {
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

        @media (max-width: 768px) {
            .main-content {
                margin-left: 60px;
                padding: 16px;
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
</head>
<body>
    <?= view('admin/templates/sidebar') ?>

    <!-- <div class="content" style="margin-left: 280px; padding: 20px;"> -->
    <!-- </div> -->
    <div class="content-wrapper">
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

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateDate();
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
            document.getElementById('currentDate').textContent = dateString;
        }

        // Initialize table
        function initializeTable() {
            // Cek tbody mana yang ada
            const tbodyIds = ['dudiTableBody', 'penggunaTableBody'];
            let tbody = null;

            for (let id of tbodyIds) {
                const el = document.getElementById(id);
                if (el) {
                    tbody = el;
                    break;
                }
            }

            if (!tbody) return; // tidak ada tabel di halaman

            allRows = Array.from(tbody.querySelectorAll('tr'));
            filteredRows = [...allRows];
            updateTable();
        }

        // Search function
        function searchTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            filteredRows = allRows.filter(row => {
                if (row.dataset.deleted === 'true') return false;
                
                const text = row.textContent.toLowerCase();
                return text.includes(searchTerm);
            });
            
            currentPage = 1;
            updateTable();
        }

        // Change entries per page
        function changeEntriesPerPage() {
            entriesPerPage = parseInt(document.getElementById('entriesPerPage').value);
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
            document.getElementById('paginationInfo').textContent = 
                `Menampilkan ${totalEntries === 0 ? 0 : startIndex + 1} sampai ${endIndex} dari ${totalEntries} entri`;
            
            // Update pagination controls
            const controls = document.getElementById('paginationControls');
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
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.textContent = '▶';
            controls.appendChild(nextBtn);
            
            // Hide pagination if only one page
            // document.getElementById('pagination').style.display = totalPages <= 1 ? 'none' : 'flex';
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

    </script>
</body>
</html>
