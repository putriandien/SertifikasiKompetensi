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

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 24px 24px 24px 40px;;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-card {
        background: white;
        padding: 60px 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 600px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .welcome-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        font-size: 36px;
        color: white;
        animation: bounce 2s infinite;
    }

    .welcome-message {
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 16px;
        line-height: 1.4;
    }

    .student-name {
        color: #3b82f6;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .welcome-subtitle {
        font-size: 16px;
        color: #64748b;
        margin-bottom: 30px;
    }

    .date-info {
        display: inline-block;
        background: #f1f5f9;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        color: #475569;
        margin-bottom: 20px;
    }

    .decoration {
        position: absolute;
        opacity: 0.1;
        pointer-events: none;
    }

    .decoration-1 {
        top: 20px;
        right: 20px;
        font-size: 40px;
        transform: rotate(15deg);
    }

    .decoration-2 {
        bottom: 20px;
        left: 20px;
        font-size: 30px;
        transform: rotate(-15deg);
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .welcome-card {
        animation: fadeInUp 0.8s ease-out;
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 60px;
            padding: 16px;
        }

        .nav-item span {
            display: none;
        }

        .welcome-card {
            padding: 40px 24px;
        }

        .welcome-message {
            font-size: 24px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container" id="dashboard">     
    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-card">
            <div class="decoration decoration-1">🎓</div>
            <div class="decoration decoration-2">📚</div>
            
            <div class="welcome-icon">
                👋
            </div>
            
            <h1 class="welcome-message">
                Selamat datang, <span class="student-name" id="studentName"><?= esc($siswa['nama']) ?></span>
            </h1>
            
            <p class="welcome-subtitle">
                Semoga hari ini menjadi hari yang produktif untuk kegiatan magang Anda
            </p>
            
            <div class="date-info" id="currentDate">
                Loading...
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
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

    // Greeting animation
    function animateGreeting() {
        const studentName = document.getElementById('studentName');
        const originalName = studentName.textContent;
        
        // Simple typing effect
        studentName.textContent = '';
        let i = 0;
        const typeInterval = setInterval(() => {
            if (i < originalName.length) {
                studentName.textContent += originalName.charAt(i);
                i++;
            } else {
                clearInterval(typeInterval);
            }
        }, 100);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateDate();
        setTimeout(animateGreeting, 500);
        
        // Update date every minute
        setInterval(updateDate, 60000);
    });

    // Add some interactivity to the welcome icon
    document.querySelector('.welcome-icon').addEventListener('click', function() {
        this.style.animation = 'bounce 0.6s ease';
        setTimeout(() => {
            this.style.animation = 'bounce 2s infinite';
        }, 600);
    });
</script>
<?= $this->endSection() ?>