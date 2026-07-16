<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Piket - Asrama STTE</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SheetJS for Excel Export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Mulish', sans-serif;
        }
        
        a{
            text-decoration: none;
        }
        
        nav{
            position: fixed;
            padding: 10px;
            background:rgb(187, 39, 42);
            width: 17vw;
            height: 100vh;
            transition: .5s;
            left: 0px;
            z-index: 8;
        }
        nav ul{
            margin: 10px;
        }
        nav ul label{
            margin-left: -10px;
        }
        nav ul li{
            font-size: 15px;
            margin: 10px -10px;
            list-style: none;
            padding: 10px;
            border-radius: 3px;
            color: white;
            text-align: justify;
        }

        nav ul li:hover{
            background:rgb(179, 28, 31);
            color: white;
            width: 90%;
        }

        .active{
            background:rgb(179, 28, 31);
            color: white;
            width: 90%;
        }

        nav ul a{
            color: black;
            text-decoration: none;
        }
        .logo{
            display: flex;
            gap: 10px;
            background: #eaeaea;
            align-items: center;
            padding: 10px;
            margin:0;
            width:87%;
        }
        nav label{
            font-size: 15px;
        }
        
        .page{
            background: #f8f9fa;
            margin-left: 17vw;
            padding: 30px;
            min-height: 100vh;
        }
        .menu{
            font-size: 3em;
            display: none;
            margin: 10px;
        }
        
        .modal-bg{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 7;
        }

        .btn-primary-custom {
            background: rgb(187, 39, 42);
            border: none;
            color: white;
        }

        .btn-primary-custom:hover {
            background: rgb(150, 28, 31);
            color: white;
        }

        .table-custom {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .header-custom {
            background: linear-gradient(135deg, rgb(187, 39, 42), rgb(150, 28, 31));
            color: white;
        }

        .day-checklist {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .day-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .progress-container {
            background: #e9ecef;
            border-radius: 10px;
            height: 25px;
            overflow: hidden;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, rgb(187, 39, 42), rgb(220, 50, 53));
            transition: width 0.3s ease;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
        }

        @media screen and (max-width: 760px){
            nav{
                width: 70vw;
                left: -80em;
                top: 0;
            }

            .logo{
                width:100%;
            }
            .menu{
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 9;
                background: white;
                padding: 5px 15px;
                border-radius: 8px;
            }

            .page{
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div> <!-- ROOT ELEMEN -->
        <p class="menu">&#8801;</p>
        <div class="modal-bg"></div>

        <nav>
            <div class="scroll">
                <div class="logo">
                    <img src="http://asramasttekumene.test/logo_stte.png" height="30px" alt="STTE Logo" onerror="this.src='https://via.placeholder.com/100x30?text=STTE'">
                </div>
                <ul>
            <a href="/dorm/dashboard"><li class="@if(request()->is('dorm/dashboard')) active @endif"><i class="fa fa-home"></i> Dashboard</li></a>
            <a href="/dorm/polling" wire:navigate> <li class="@if(request()->is('dorm/polling')) active @endif"><i class="fa fa-chart-bar"></i> Polling</li></a>
            <a href="/dorm/jadwal_piket"> <li class="@if(request()->is('dorm/jadwal_piket')) active @endif"><i class="fas fa-broom"></i> Jadwal Piket</li></a>
            <a href="/dorm/publikasi_kegiatan" wire:navigate> <li class="@if(request()->is('dorm/publikasi_kegiatan')) active @endif"> <i class="fa fa-camera-retro"></i> Dormitory Impact</li></a>
            <a href="/dorm/daftar_pengguna" wire:navigate> <li class="@if(request()->is('dorm/daftar_pengguna')) active @endif"> <i class="fa fa-user"></i> Pengguna</li></a>
            <a href="/visitor" wire:navigate> <li> <i class="fa-solid fa-person"></i> Visitor</li></a>
            <a class="logsty" href="/dorm/logout"><li><i class="fas fa-sign-out"></i> Logout</li></a>
                </ul>
            </div>
        </nav>

        <div class="page">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <div>
                        <h2 class="fw-bold"><i class="fas fa-broom me-2"></i> Jadwal Piket</h2>
                        <p class="text-muted mb-0">Tugas tetap stabil, klik tombol Acak untuk mengacak!</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-success btn-lg" onclick="exportToExcel()">
                            <i class="fas fa-file-excel me-2"></i>Export Excel
                        </button>
                        <button class="btn btn-warning btn-lg text-white" onclick="acakTugas()">
                            <i class="fas fa-shuffle me-2"></i>Acak Tugas
                        </button>
                        <button class="btn btn-primary-custom btn-lg" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                            <i class="fas fa-tasks me-2"></i>Tambah Tugas
                        </button>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0"><i class="fas fa-tasks me-2"></i>Progress Piket Mingguan</h5>
                            <span class="fw-bold" id="progressText">0%</span>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar-custom" id="progressBar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Tugas Piket -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="fw-bold mb-0"><i class="fas fa-list-check me-2"></i>Daftar Tugas Piket</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2" id="taskListContainer">
                            <!-- Daftar tugas akan diisi oleh JS -->
                        </div>
                    </div>
                </div>

                <!-- Search Engine -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control form-control-lg" id="searchInput" placeholder="Cari nama anggota atau tugas piket...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom align-middle mb-0">
                        <thead class="header-custom">
                            <tr>
                                <th scope="col" width="50">No</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tugas Piket</th>
                                <th scope="col">
                                    <i class="fas fa-calendar-week me-1"></i>Hari Senin-Minggu
                                </th>
                                <th scope="col" width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="piketTableBody">
                            <!-- Data akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Tugas Piket -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4">
                    <div class="modal-header bg-light border-0">
                        <h5 class="modal-title fw-bold" id="addTaskModalLabel">
                            <i class="fas fa-tasks me-2" style="color: rgb(187, 39, 42);"></i>Tambah Tugas Piket
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="tambah_data" action="/tugas-piket/tambah" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="taskInput" class="form-label fw-semibold">Nama Tugas</label>
                                <input type="text" class="form-control" id="taskInput" name="nama_tugas" placeholder="Contoh: Membersihkan lantai tangga" required>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary-custom">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Anggota Piket -->
        <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4">
                    <div class="modal-header bg-light border-0">
                        <h5 class="modal-title fw-bold" id="editMemberModalLabel">
                            <i class="fas fa-user-edit me-2" style="color: rgb(187, 39, 42);"></i>Edit Anggota Piket
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="update_status" action="/edit-status-pengguna" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editMemberNameInput" class="form-label fw-semibold">Nama Anggota</label>
                                <input type="text" class="form-control" id="editMemberNameInput" name="nama_anggota" readonly required>
                                <input type="hidden" id="editMemberIndex" name="member_index">
                                <input type="hidden" id="editMemberId" name="pengguna_id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="posisi" id="statusAsrama" value="asrama">
                                        <label class="form-check-label" for="statusAsrama">Asrama (Dapat Tugas)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="posisi" id="statusLibur" value="libur">
                                        <label class="form-check-label" for="statusLibur">Libur (Tidak Ada Tugas)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary-custom">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Tugas Piket -->
        <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4">
                    <div class="modal-header bg-light border-0">
                        <h5 class="modal-title fw-bold" id="editTaskModalLabel">
                            <i class="fas fa-edit me-2" style="color: rgb(187, 39, 42);"></i>Edit Tugas Piket
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="edit_data" action="/tugas-piket/edit" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editTaskInput" class="form-label fw-semibold">Nama Tugas Baru</label>
                                <input type="text" class="form-control" id="editTaskInput" name="nama_tugas_baru" required>
                                <input type="hidden" id="editTaskIndex" name="tugas_id">
                                <input type="hidden" id="editTaskArrayIndex" name="array_index">
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary-custom">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- AKHIR ROOT ELEMEN -->

    <script>
        // --- DATA AWAL ---
        const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        
        const DATA_ANGGOTA_AWAL = [
            @if(isset($data2) && $data2->count() > 0)
                @foreach($data2 as $user)
                    { id: {{ $user->id }}, nama: "{{ addslashes($user->name ?? $user->nama) }}", status: "{{$user->posisi}}", checklist: {} },
                @endforeach
            @else
                { id: null, nama: "Andi Pratama", status: "asrama", checklist: {} },
                { id: null, nama: "Budi Santoso", status: "asrama", checklist: {} },
                { id: null, nama: "Citra Dewi", status: "asrama", checklist: {} },
                { id: null, nama: "Dewi Lestari", status: "asrama", checklist: {} },
                { id: null, nama: "Eko Prabowo", status: "libur", checklist: {} },
                { id: null, nama: "Fajar Nugroho", status: "asrama", checklist: {} }
            @endif
        ];

        // Hapus "Mengosongkan tong sampah"
        const DATA_TUGAS_AWAL = [
            @if(isset($data) && $data->count() > 0)
                @foreach($data as $d)
                    { id: {{ $d->id }}, nama: "{{ addslashes($d->nama_tugas) }}" },
                @endforeach
            @else
                { id: null, nama: "Membersihkan kamar tidur" },
                { id: null, nama: "Menyapu lantai koridor" },
                { id: null, nama: "Membersihkan dapur" },
                { id: null, nama: "Menyiram tanaman" },
                { id: null, nama: "Membersihkan kamar mandi" },
                { id: null, nama: "Membuang sampah" },
                { id: null, nama: "Merapikan ruang tamu" },
                { id: null, nama: "Membersihkan jendela" },
                { id: null, nama: "Mengelap meja makan" }
            @endif
        ];

        let daftarAnggota = [];
        let pembagianTugasTetap = {};
        let daftarTugas = [];
        let searchQuery = ''; // Variabel untuk menyimpan query pencarian

        // --- FUNGSI LOAD & SIMPAN DATA DENGAN FETCH ---
        const API_LOAD_URL = '/api/jadwal-piket';
        const API_SAVE_URL = '/api/jadwal-piket/simpan';

        async function loadData() {
            try {
                const response = await fetch(API_LOAD_URL);
                if (response.ok) {
                    const data = await response.json();
                    daftarAnggota = data.anggota || JSON.parse(JSON.stringify(DATA_ANGGOTA_AWAL));
                    daftarTugas = data.tugas || [...DATA_TUGAS_AWAL];
                    pembagianTugasTetap = data.pembagian || {};
                } else {
                    throw new Error('Gagal memuat data');
                }
            } catch (error) {
                console.error('Error loading data:', error);
                daftarAnggota = JSON.parse(JSON.stringify(DATA_ANGGOTA_AWAL));
                daftarTugas = [...DATA_TUGAS_AWAL];
                pembagianTugasTetap = {};
            }
        }

        async function saveData() {
            try {
                const formData = new FormData();
                formData.append('anggota', JSON.stringify(daftarAnggota));
                formData.append('tugas', JSON.stringify(daftarTugas));
                formData.append('pembagian', JSON.stringify(pembagianTugasTetap));
                
                const response = await fetch(API_SAVE_URL, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Gagal menyimpan data');
                }
            } catch (error) {
                console.error('Error saving data:', error);
            }
        }

        // --- FUNGSI UTAMA ---
        function shuffleArray(array) {
            const newArray = [...array];
            for (let i = newArray.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [newArray[i], newArray[j]] = [newArray[j], newArray[i]];
            }
            return newArray;
        }

        function generatePembagianTugas() {
            const shuffledTugas = shuffleArray(daftarTugas);
            const pembagian = {};
            let tugasIndex = 0;
            
            daftarAnggota.forEach((anggota) => {
                if (anggota.status === "asrama") {
                    pembagian[anggota.nama] = shuffledTugas[tugasIndex % shuffledTugas.length].nama;
                    tugasIndex++;
                } else {
                    pembagian[anggota.nama] = null;
                }
            });
            
            return pembagian;
        }

        function bagikanTugas() {
            if (Object.keys(pembagianTugasTetap).length === 0) {
                pembagianTugasTetap = generatePembagianTugas();
                saveData();
            }
            return pembagianTugasTetap;
        }

        // --- PROGRESS BAR ---
        function hitungProgress() {
            let totalChecklist = 0;
            let totalDiceklis = 0;
            
            daftarAnggota.forEach(anggota => {
                if (anggota.status === 'asrama') {
                    HARI.forEach(hari => {
                        totalChecklist++;
                        if (anggota.checklist && anggota.checklist[hari]) {
                            totalDiceklis++;
                        }
                    });
                }
            });
            
            const persentase = totalChecklist === 0 ? 0 : Math.round((totalDiceklis / totalChecklist) * 100);
            document.getElementById('progressBar').style.width = persentase + '%';
            document.getElementById('progressText').innerText = persentase + '%';
        }

        // --- TOGGLE CHECKLIST ---
        async function toggleChecklist(anggotaIndex, hari) {
            if (!daftarAnggota[anggotaIndex].checklist) {
                daftarAnggota[anggotaIndex].checklist = {};
            }
            daftarAnggota[anggotaIndex].checklist[hari] = !daftarAnggota[anggotaIndex].checklist[hari];
            await saveData();
            renderTable();
            hitungProgress();
        }

        // --- FUNGSI PENCARIAN ---
        function filterData() {
            const query = searchQuery.toLowerCase().trim();
            if (!query) {
                return daftarAnggota; // Kembalikan semua jika tidak ada query
            }

            const pembagian = bagikanTugas();
            return daftarAnggota.filter(anggota => {
                const namaMatch = anggota.nama.toLowerCase().includes(query);
                const tugas = pembagian[anggota.nama];
                const tugasMatch = tugas ? tugas.toLowerCase().includes(query) : false;
                return namaMatch || tugasMatch;
            });
        }

        // --- RENDER FUNCTIONS ---
        function renderTaskList() {
            const container = document.getElementById('taskListContainer');
            container.innerHTML = '';
            
            if (daftarTugas.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-3 text-muted">
                        Belum ada tugas piket. Silakan tambahkan!
                    </div>
                `;
                return;
            }
            
            daftarTugas.forEach((tugas, index) => {
                const div = document.createElement('div');
                div.className = 'col-12 col-md-6 col-lg-4';
                div.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-3">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="fw-medium">${tugas.nama}</span>
                        </div>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-outline-primary" onclick="editTugas(${index})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="hapusTugas(${index})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(div);
            });
        }

        function renderTable() {
            const tbody = document.getElementById('piketTableBody');
            const pembagianTugas = bagikanTugas();
            const filteredAnggota = filterData(); // Gunakan data yang difilter
            
            tbody.innerHTML = '';
            
            if (filteredAnggota.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-search fa-3x mb-3 d-block"></i>
                            Tidak ada data yang cocok dengan pencarian "${searchQuery}"
                        </td>
                    </tr>
                `;
                return;
            }
            
            filteredAnggota.forEach((anggota, index) => {
                // Dapatkan index asli untuk fungsi edit/hapus
                const originalIndex = daftarAnggota.findIndex(a => a.nama === anggota.nama);
                const tr = document.createElement('tr');
                const tugas = pembagianTugas[anggota.nama];
                let tugasHTML = '';
                let checklistHTML = '';
                
                if (tugas) {
                    tugasHTML = `
                        <span class="text-success fw-medium">
                            <i class="fas fa-check-circle me-1"></i>${tugas}
                        </span>
                    `;
                    
                    checklistHTML = '<div class="day-checklist">';
                    HARI.forEach(hari => {
                        const isChecked = anggota.checklist && anggota.checklist[hari];
                        checklistHTML += `
                            <div class="day-item">
                                <label class="form-check-label fw-semibold" style="width: 60px;">${hari}</label>
                                <input class="form-check-input" type="checkbox"
                                    ${isChecked ? 'checked' : ''}
                                    onchange="toggleChecklist(${originalIndex}, '${hari}')">
                            </div>
                        `;
                    });
                    checklistHTML += '</div>';
                } else {
                    tugasHTML = `
                        <span class="text-muted fw-medium">
                            <i class="fas fa-umbrella-beach me-1"></i>Libur
                        </span>
                    `;
                    checklistHTML = '<span class="text-muted">-</span>';
                }
                
                tr.innerHTML = `
                    <td class="fw-bold">${index + 1}</td>
                    <td class="fw-semibold">${anggota.nama}</td>
                    <td>${tugasHTML}</td>
                    <td>${checklistHTML}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1" onclick="editAnggota(${originalIndex})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="hapusAnggota(${originalIndex})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // --- EXPORT TO EXCEL ---
        function exportToExcel() {
            const today = new Date();
            const day = today.getDay(); // 0 (Sun) to 6 (Sat)
            
            // Hitung tanggal Senin (awal minggu)
            const diffToMonday = today.getDate() - (day === 0 ? 6 : day - 1);
            const monday = new Date(today.setDate(diffToMonday));
            
            // Hitung tanggal Minggu (akhir minggu)
            const sunday = new Date(monday);
            sunday.setDate(monday.getDate() + 6);

            const bulanIndo = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            const formatTgl = (d) => {
                return d.getDate() + ' ' + bulanIndo[d.getMonth()] + ' ' + d.getFullYear();
            };

            const periodeText = `Piket Mingguan: Tanggal ${monday.getDate()} ${bulanIndo[monday.getMonth()]} - ${formatTgl(sunday)}`;
            
            // Prepare data
            const data = [];
            
            // Header
            data.push(['JADWAL PIKET ASRAMA STTE']);
            data.push([periodeText]);
            data.push(['']);
            
            // Table Header
            const header = ['No', 'Nama Anggota', 'Tugas Piket', ...HARI];
            data.push(header);
            
            // Table Body
            const pembagianTugas = bagikanTugas();
            daftarAnggota.forEach((anggota, index) => {
                const tugas = pembagianTugas[anggota.nama];
                const row = [
                    index + 1,
                    anggota.nama,
                    tugas || 'Libur'
                ];
                
                HARI.forEach(hari => {
                    const isChecked = anggota.checklist && anggota.checklist[hari];
                    row.push(isChecked ? 'v' : '');
                });
                
                data.push(row);
            });
            
            // Create workbook
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.aoa_to_sheet(data);
            
            // Style header (optional, using basic styling)
            ws['!cols'] = [
                { wch: 5 },
                { wch: 20 },
                { wch: 25 },
                { wch: 10 },
                { wch: 10 },
                { wch: 10 },
                { wch: 10 },
                { wch: 10 },
                { wch: 10 },
                { wch: 10 }
            ];
            
            XLSX.utils.book_append_sheet(wb, ws, 'Jadwal Piket');
            
            // Download
            const fileName = `Jadwal_Piket_${monday.getDate()}_sampai_${sunday.getDate()}_${bulanIndo[sunday.getMonth()]}.xlsx`;
            XLSX.writeFile(wb, fileName);
        }

        // --- INTERAKSI ---
        document.addEventListener('DOMContentLoaded', function() {
            // Handle form tambah tugas
            const formTambahTugas = document.querySelector('.tambah_data');
            if (formTambahTugas) {
                formTambahTugas.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const tugas = document.getElementById('taskInput').value.trim();
                    if (tugas === '') { 
                        alert('Nama tugas tidak boleh kosong!'); 
                        return; 
                    }
                    
                    try {
                        const formData = new FormData(this);
                        
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        
                        if (response.ok) {
                            // Ambil ID dari response backend
                            let newId = null;
                            try {
                                const result = await response.json();
                                newId = result.id || null;
                            } catch (e) {
                                // Jika response bukan JSON, tetap lanjutkan
                            }
                            
                            // Tambahkan ke daftar tugas lokal dengan ID
                            daftarTugas.push({
                                id: newId,
                                nama: tugas
                            });
                            pembagianTugasTetap = {};
                            
                            // Render ulang tampilan
                            renderTaskList();
                            renderTable();
                            
                            // Tutup modal dan reset form
                            const modal = bootstrap.Modal.getInstance(document.getElementById('addTaskModal'));
                            modal.hide();
                            this.reset();
                        } else {
                            alert('Gagal menambah tugas!');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan!');
                    }
                });
            }
            
            // Handle form edit tugas
            const formEditTugas = document.querySelector('.edit_data');
            if (formEditTugas) {
                formEditTugas.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const arrayIndex = parseInt(document.getElementById('editTaskArrayIndex').value);
                    const tugasBaru = document.getElementById('editTaskInput').value.trim();
                    
                    if (tugasBaru === '') { 
                        alert('Nama tugas tidak boleh kosong!'); 
                        return; 
                    }
                    
                    try {
                        const formData = new FormData(this);
                        
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        
                        if (response.ok) {
                            // Update daftar tugas lokal - tetap simpan ID!
                            daftarTugas[arrayIndex] = {
                                id: daftarTugas[arrayIndex].id,
                                nama: tugasBaru
                            };
                            pembagianTugasTetap = {};
                            
                            // Render ulang tampilan
                            renderTaskList();
                            renderTable();
                            
                            // Tutup modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editTaskModal'));
                            modal.hide();
                        } else {
                            console.error('Gagal mengedit tugas! Status:', response.status);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                    }
                    
                    return false;
                });
            }

            // Handle form edit status anggota
            const formEditAnggota = document.querySelector('.update_status');
            if (formEditAnggota) {
                formEditAnggota.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const arrayIndex = parseInt(document.getElementById('editMemberIndex').value);
                    const statusBaru = document.querySelector('input[name="posisi"]:checked').value;
                    
                    try {
                        const formData = new FormData(this);
                        
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        
                        if (response.ok) {
                            // Update daftar anggota lokal
                            daftarAnggota[arrayIndex].status = statusBaru;
                            pembagianTugasTetap = {}; // Reset pembagian tugas karena ada perubahan status
                            
                            // Render ulang tampilan
                            renderTable();
                            hitungProgress();
                            
                            // Tutup modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editMemberModal'));
                            modal.hide();
                        } else {
                            alert('Gagal mengedit status anggota!');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan!');
                    }
                    
                    return false;
                });
            }
        });
        
        function tambahTugas() {
            document.querySelector('.tambah_data').dispatchEvent(new Event('submit'));
        }
        
        function editTugas(index) {
            document.getElementById('editTaskInput').value = daftarTugas[index].nama;
            document.getElementById('editTaskArrayIndex').value = index;
            
            // Isi ID tugas dari database dan update action URL
            if (daftarTugas[index].id) {
                document.getElementById('editTaskIndex').value = daftarTugas[index].id;
                const formEdit = document.querySelector('.edit_data');
                formEdit.action = `/tugas-piket/edit/${daftarTugas[index].id}`;
            }
            
            const modal = new bootstrap.Modal(document.getElementById('editTaskModal'));
            modal.show();
        }
        
        function simpanEditTugas() {
            document.querySelector('.edit_data').dispatchEvent(new Event('submit'));
        }

        function hapusTugas(index) {
            if (confirm(`Yakin ingin menghapus tugas "${daftarTugas[index].nama}"?`)) {
                daftarTugas.splice(index, 1);
                pembagianTugasTetap = {};
                saveData();
                renderTaskList();
                renderTable();
            }
        }

        function editAnggota(index) {
            document.getElementById('editMemberNameInput').value = daftarAnggota[index].nama;
            document.getElementById('editMemberIndex').value = index;
            
            // Isi ID pengguna dan update action URL
            if (daftarAnggota[index].id) {
                document.getElementById('editMemberId').value = daftarAnggota[index].id;
                const formEditAnggota = document.querySelector('.update_status');
                formEditAnggota.action = `/edit-status-pengguna/${daftarAnggota[index].id}`;
            }
            
            if (daftarAnggota[index].status === "asrama") {
                document.getElementById('statusAsrama').checked = true;
            } else {
                document.getElementById('statusLibur').checked = true;
            }
            
            const modal = new bootstrap.Modal(document.getElementById('editMemberModal'));
            modal.show();
        }

        function simpanEditAnggota() {
            const index = parseInt(document.getElementById('editMemberIndex').value);
            const namaBaru = document.getElementById('editMemberNameInput').value.trim();
            const statusBaru = document.querySelector('input[name="posisi"]:checked').value;
            
            if (namaBaru === '') { alert('Nama anggota tidak boleh kosong!'); return; }
            
            // Update nama dan status
            daftarAnggota[index].nama = namaBaru;
            daftarAnggota[index].status = statusBaru;
            pembagianTugasTetap = {};
            saveData();
            renderTable();
            hitungProgress();
            
            const modal = bootstrap.Modal.getInstance(document.getElementById('editMemberModal'));
            modal.hide();
        }

        function hapusAnggota(index) {
            if (confirm(`Yakin ingin menghapus ${daftarAnggota[index].nama}?`)) {
                daftarAnggota.splice(index, 1);
                pembagianTugasTetap = {};
                saveData();
                renderTable();
                hitungProgress();
            }
        }

        // --- Sidebar ---
        const menuBtn = document.querySelector('.menu');
        const nav = document.querySelector('nav');
        const modalSidebar = document.querySelector('.modal-bg');

        menuBtn.onclick = () => {
            nav.style.left = '0em';
            modalSidebar.style.display = 'block';
        };
        modalSidebar.onclick = () => {
            nav.style.left = '-80em';
            modalSidebar.style.display = 'none';
        };

        // --- Acak Tugas ---
        async function acakTugas() {
            const tbody = document.getElementById('piketTableBody');
            tbody.style.opacity = '0.5';
            tbody.style.transform = 'scale(0.98)';
            tbody.style.transition = 'all 0.2s ease';
            
            setTimeout(async () => {
                // Reset semua checklist
                daftarAnggota.forEach(anggota => {
                    anggota.checklist = {};
                });
                
                pembagianTugasTetap = generatePembagianTugas();
                await saveData(); // Simpan ke backend
                renderTable();
                hitungProgress();
                tbody.style.opacity = '1';
                tbody.style.transform = 'scale(1)';
            }, 200);
        }

        // --- INISIALISASI ---
        document.addEventListener('DOMContentLoaded', async () => {
            await loadData();
            renderTaskList();
            renderTable();
            hitungProgress();

            // Event Listener untuk Search Input
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value;
                renderTable();
            });
        });
    </script>
</body>
</html>