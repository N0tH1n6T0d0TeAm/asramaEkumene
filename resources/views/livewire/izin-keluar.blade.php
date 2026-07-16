<div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Management - Asrama STTE</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary-color: #bb272a;
            --primary-dark: #96191c;
            --bg-color: #f8f9fa;
            --sidebar-bg: #bb272a;
            --sidebar-hover: #96191c;
            --card-bg: #ffffff;
            --text-main: #2d3436;
            --text-muted: #636e72;
            --border-color: #dfe6e9;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Mulish', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        nav {
            position: fixed;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: white;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            padding: 20px;
            left: 0;
        }

        .logo-container {
            background: white;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            height: 40px;
        }

        nav ul {
            list-style: none;
        }

        nav ul a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            display: block;
            margin-bottom: 5px;
        }

        nav ul li {
            padding: 12px 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s;
            font-weight: 600;
        }

        nav ul a:hover li, 
        nav ul a.active li {
            background: var(--sidebar-hover);
            color: white;
            transform: translateX(5px);
        }

        /* Main Content Area */
        .page {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 40px;
            transition: margin 0.4s ease;
            width: 100%;
        }

        .menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 10px;
            display: none;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            cursor: pointer;
            z-index: 900;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            display: none;
            z-index: 950;
            backdrop-filter: blur(3px);
        }

        /* Form Content Styles */
        .content-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.02);
        }

        .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 16px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fafafa;
        }

        .upload-area:hover {
            border-color: var(--primary-color);
            background: rgba(187, 39, 42, 0.02);
        }

        #image-preview {
            margin-top: 20px;
            width: 100%;
            border-radius: 16px;
            display: none;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        #image-preview img {
            width: 100%;
            display: block;
        }

        textarea {
            width: 100%;
            height: 120px;
            padding: 18px;
            margin-top: 25px;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            resize: none;
            outline: none;
            background: #fafafa;
        }

        .submit-btn {
            width: 100%;
            margin-top: 20px;
            padding: 16px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
        }

        .history-section {
            margin-top: 40px;
            text-align: center;
        }

        .history-card img {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            nav {
                transform: translateX(-100%);
            }
            
            nav.active {
                transform: translateX(0);
            }

            .page {
                margin-left: 0;
                padding: 80px 20px 40px;
            }

            .menu-toggle {
                display: flex;
            }

            .overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body>

    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <div class="overlay"></div>

    <nav id="sidebar">
        <div class="logo-container">
            <img src="http://asramasttekumene.test/logo_stte.png" alt="STTE Logo" onerror="this.src='https://via.placeholder.com/150x40?text=STTE'">
        </div>
       <ul>
            <a href="/dorm/dashboard"><li class="@if(request()->is('dorm/dashboard')) active @endif"><i class="fa fa-home"></i> Dashboard</li></a>
            <a href="/dorm/polling" wire:navigate> <li class="@if(request()->is('dorm/polling')) active @endif"><i class="fa fa-chart-bar"></i> Polling</li></a>
            <a href="/dorm/jadwal_piket" wire:navigate> <li class="@if(request()->is('dorm/jadwal_piket')) active @endif"><i class="fas fa-broom"></i> Jadwal Piket</li></a>
            <a href="/dorm/izin_keluar" wire:navigate> <li class="@if(request()->is('dorm/izin_keluar')) active @endif"> <i class="fa fa-user"></i> Izin Keluar</li></a>
            <a href="/dorm/publikasi_kegiatan" wire:navigate> <li class="@if(request()->is('dorm/publikasi_kegiatan')) active @endif"> <i class="fa fa-camera-retro"></i> Dormitory Impact</li></a>
            <a href="/dorm/daftar_pengguna" wire:navigate> <li class="@if(request()->is('dorm/daftar_pengguna')) active @endif"> <i class="fa fa-user"></i> Pengguna</li></a>
            <a href="/visitor" wire:navigate> <li> <i class="fa-solid fa-person"></i> Visitor</li></a>
            <a class="logsty" href="/dorm/logout"><li><i class="fas fa-sign-out"></i> Logout</li></a>
        </ul>
    </nav>

    <div class="page">
        <div class="content-container">
            <header style="text-align: center; margin-bottom: 40px;">
                <h1 style="font-weight: 800; color: var(--text-main); font-size: 1.8rem;">Izin Keluar</h1>
                <p style="color: var(--text-muted);">Silakan isi form di bawah untuk permohonan izin</p>
            </header>

            <main class="card">
                <form id="permissionForm">
                    <div class="upload-area" id="dropZone">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 15px; display: block;"></i>
                        <p style="font-weight: 700; color: var(--text-main);">Klik untuk Upload Foto</p>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 5px;">Format: JPG, PNG, JPEG</p>
                        <input type="file" id="fileInput" accept="image/*" style="display: none;">
                    </div>

                    <div id="image-preview">
                        <img id="previewImg" src="" alt="Preview">
                    </div>

                    <textarea id="description" placeholder="Mau pergi ke mana dan untuk keperluan apa?" required></textarea>

                    <button type="submit" class="submit-btn">
                        <span>Kirim Permohonan</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </main>

            <section class="history-section">
                <h2 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--text-muted); margin-bottom: 20px;">Izin Terakhir Anda</h2>
                <div class="history-card">
                    <img src="http://asramasttekumene.test/storage/izin_keluar/a4adzQO3CtvfcqmVs6k4y7S6XiiO7SHxT6Nqq8Tz.png" alt="Recent Permit" onerror="this.src='https://via.placeholder.com/400x250?text=Belum+Ada+Riwayat+Izin'">
                </div>
            </section>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.querySelector('.menu-toggle');
        const overlay = document.querySelector('.overlay');
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('image-preview');
        const previewImg = document.getElementById('previewImg');
        const form = document.getElementById('permissionForm');

        // Sidebar Toggle
        menuToggle.onclick = () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        };

        overlay.onclick = () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        };

        // File Selection
        dropZone.onclick = () => fileInput.click();

        fileInput.onchange = (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    previewImg.src = event.target.result;
                    preview.style.display = 'block';
                    dropZone.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        };

        // Form Submission
        form.onsubmit = (e) => {
            e.preventDefault();
            
            if (!fileInput.files[0]) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Foto Belum Ada',
                    text: 'Silakan upload foto terlebih dahulu.',
                    confirmButtonColor: '#bb272a'
                });
                return;
            }

            Swal.fire({
                title: 'Kirim Permohonan?',
                text: "Pastikan data sudah benar sebelum dikirim.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#bb272a',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Permohonan izin Anda telah dikirim.',
                        confirmButtonColor: '#bb272a'
                    }).then(() => {
                        form.reset();
                        preview.style.display = 'none';
                        dropZone.style.display = 'block';
                    });
                }
            });
        };
    </script>
</body>
</html>
    </div>