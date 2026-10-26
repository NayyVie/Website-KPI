<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lengkapi Bukti | PLN NPS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --navy: #153d60; --blue: #0879b8; --cyan: #12b9ce; --muted: #758da1; --border: #d8e3ed; --bg: #f3f7fb; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Poppins', sans-serif; color: var(--navy); background: var(--bg); font-size: 12px; }
        .page { max-width: 1500px; margin: auto; padding: 28px 32px 50px; }
        
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
        .back { color: #075ba3; text-decoration: none; font-weight: 500; }
        
        .layout { display: grid; grid-template-columns: 260px minmax(0, 1fr); gap: 16px; align-items: start; }
        .subarea-panel, .detail-panel { background: white; border: 1px solid var(--border); border-radius: 11px; box-shadow: 0 4px 15px rgba(26, 69, 103, .035); }
        
        /* SIDEBAR */
        .subarea-panel { padding: 17px 10px; position: sticky; top: 15px; }
        .subarea-link { display: flex; align-items: center; justify-content: space-between; gap: 7px; width: 100%; padding: 10px 8px; margin-bottom: 5px; text-align: left; color: var(--navy); background: transparent; border: 1px solid transparent; border-radius: 7px; cursor: pointer; }
        .subarea-link.active { background: #f7fafc; border-color: #183e69; box-shadow: inset 3px 0 #183e69; font-weight: 600; }
        .score-pill { flex-shrink: 0; padding: 5px 8px; border-radius: 20px; font-size: 10px; font-weight: 600; background: #fff0dc; color: #a96300; }

        /* KONTEN */
        .detail-panel { padding: 20px; min-width: 0; }
        .detail-header { display: grid; grid-template-columns: minmax(0, 1fr) 183px; gap: 18px; margin-bottom: 20px; }
        .detail-title { font-size: 21px; margin: 0; color: #153d60; }
        .score-card { background: #f5f8fa; border-left: 3px solid var(--cyan); padding: 12px; border-radius: 0 7px 7px 0; }
        .score-card strong { display: block; font-size: 25px; margin: 3px 0; color: #153d60; }

        /* TAB LEVEL (BARU) */
        .level-tabs { display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; margin-bottom: 20px; }
        .level-tab { padding: 12px 10px; text-align: center; border: 1px solid var(--border); border-radius: 8px; background: white; cursor: pointer; transition: all 0.2s; }
        .level-tab.active { background: #153d60; color: white; border-color: #153d60; box-shadow: 0 4px 10px rgba(21, 61, 96, 0.2); }
        .level-tab.active .level-range { color: #a3c6e8; }
        .level-tab-title { font-weight: 700; font-size: 13px; margin-bottom: 2px; }
        .level-range { font-size: 10px; color: var(--muted); }

        /* PROGRESS & KRITERIA */
        .progress-section { margin-bottom: 24px; padding: 14px; background: #f5f8fa; border-radius: 8px; border: 1px solid var(--border); }
        .progress-bar { height: 8px; background: #e2eef5; border-radius: 20px; overflow: hidden; }
        .progress-fill { height: 100%; background: linear-gradient(90deg, #008fb5, #13bfd0); border-radius: 20px; transition: width 0.3s ease; }
        
        .criteria-heading { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .criterion { padding: 16px; border: 1px solid var(--border); border-radius: 8px; margin-bottom: 12px; background: white; }
        .criterion-top { display: grid; grid-template-columns: 25px 1fr auto; align-items: center; gap: 10px; margin-bottom: 12px; }
        .number { width: 24px; height: 24px; display: grid; place-items: center; background: #e5eef5; border-radius: 50%; font-weight: 600; font-size: 11px; }
        
        .status-badge { padding: 5px 10px; border-radius: 20px; font-size: 10px; font-weight: 600; }
        .status-belum { background: #fde5e5; color: #c53535; }
        .status-sudah { background: #e0f4e9; color: #087c52; }

        .note-input { width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 7px; margin-bottom: 10px; font-family: inherit;}
        .upload-box { padding: 12px; border: 1px dashed #cbd9e5; border-radius: 7px; background: #f8fafc; }
        .upload-top { display: flex; justify-content: space-between; align-items: center; }
        .file-button { border: 1px solid var(--border); padding: 8px 14px; border-radius: 6px; background: white; cursor: pointer; font-weight: 500;}
        .upload-input { display: none; }
        
        .save-row { display: flex; justify-content: flex-end; margin-top: 20px; }
        .save-button { border: 0; border-radius: 7px; padding: 12px 20px; color: white; background: linear-gradient(105deg, #008fb5, #13bfd0); font-weight: 600; cursor: pointer; font-size: 13px;}
    </style>
</head>
<body>
    <div class="page">
        <header class="topbar">
            <a class="back" href="{{ url('/dashboardUnit') }}">← Kembali ke portal unit</a>
        </header>

        <div class="layout">
            <!-- SIDEBAR -->
            <aside class="subarea-panel">
                <h2 class="unit-title">{{ $namaUnit }}</h2>
                <nav id="subareaList">
                    @foreach ($subAreas as $index => $sub)
                        <button type="button" class="subarea-link {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                            <span>{{ $sub['nama'] }}</span>
                            <span class="score-pill">{{ number_format($sub['score'], 1) }}</span>
                        </button>
                    @endforeach
                </nav>
            </aside>

            <!-- KONTEN UTAMA -->
            <main class="detail-panel">
                <div class="detail-header">
                    <div>
                        <div class="breadcrumb" id="breadcrumb">{{ $subAreas[0]['area'] }}</div>
                        <h1 class="detail-title" id="detailTitle">{{ $subAreas[0]['nama'] }}</h1>
                        <p class="detail-description">Lengkapi dokumen bukti dan catatan pelaksanaan untuk sub area ini.</p>
                    </div>
                    <div class="score-card">
                        <span class="panel-caption">Score ML saat ini</span>
                        <strong id="mainScore">{{ number_format($subAreas[0]['score'], 1) }}</strong>
                    </div>
                </div>

                <!-- INI DIA TAB LEVELNYA -->
                <div class="level-tabs" id="levelTabs">
                    <div class="level-tab active" data-level="0">
                        <div class="level-tab-title">Level 1</div>
                        <div class="level-range">Fire Fighting</div>
                    </div>
                    <div class="level-tab" data-level="1">
                        <div class="level-tab-title">Level 2</div>
                        <div class="level-range">Stabilizing</div>
                    </div>
                    <!-- Level 3-5 sengaja dikunci untuk demo -->
                    <div class="level-tab" style="opacity:0.5; pointer-events:none;">
                        <div class="level-tab-title">Level 3</div>
                        <div class="level-range">Terkunci</div>
                    </div>
                    <div class="level-tab" style="opacity:0.5; pointer-events:none;">
                        <div class="level-tab-title">Level 4</div>
                        <div class="level-range">Terkunci</div>
                    </div>
                    <div class="level-tab" style="opacity:0.5; pointer-events:none;">
                        <div class="level-tab-title">Level 5</div>
                        <div class="level-range">Terkunci</div>
                    </div>
                </div>

                <!-- PROGRESS BAR -->
                <div class="progress-section">
                    <div class="progress-header">
                        <span>Progress pengisian bukti</span>
                        <strong id="progressText">0 / 0 kriteria</strong>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill" style="width: 0%"></div>
                    </div>
                </div>

                <div class="criteria-heading">
                    <h3 id="criteriaTitle">Kriteria Sub Area</h3>
                    <div class="level-badge">Status <strong id="statusLabel">Belum lengkap</strong></div>
                </div>

                <form action="#" method="POST" id="lengkapiForm">
                    <div id="criteriaContainer"></div>
                    <div class="save-row">
                        <button type="submit" class="save-button">Kirim ke Admin →</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        // Menerima data dari Laravel
        const subAreas = @json($subAreas);
        const criteriaContainer = document.getElementById('criteriaContainer');
        
        let selectedIndex = 0; 
        let selectedLevelIndex = 0; 
        const savedStates = {};

        // Menyimpan state input per level & sub area
        function getState(critIndex) {
            const key = `${selectedIndex}_${selectedLevelIndex}_${critIndex}`;
            if (!savedStates[key]) savedStates[key] = { note: '', files: [] };
            return savedStates[key];
        }

        // Fungsi utama render tampilan
        function renderCriteria() {
            const sub = subAreas[selectedIndex];
            const levelData = sub.levels[selectedLevelIndex];
            const criteria = levelData ? levelData.kriteria : [];

            // Update Header
            document.getElementById('detailTitle').textContent = sub.nama;
            document.getElementById('mainScore').textContent = Number(sub.score).toFixed(1);

            // Update active state pada tab level
            document.querySelectorAll('.level-tab').forEach((tab, i) => {
                if(i === selectedLevelIndex) tab.classList.add('active');
                else tab.classList.remove('active');
            });

            if (!criteria || criteria.length === 0) {
                criteriaContainer.innerHTML = `<div style="padding:20px; text-align:center; color:gray;">Data kriteria untuk level ini belum tersedia.</div>`;
                document.getElementById('progressText').textContent = `0 / 0 kriteria`;
                return;
            }

            // Render kartu kriteria
            criteriaContainer.innerHTML = criteria.map((item, i) => {
                const state = getState(i);
                return `
                    <section class="criterion">
                        <div class="criterion-top">
                            <span class="number">${i + 1}</span>
                            <div>${item.nama}</div>
                            <span class="status-badge ${state.files.length > 0 ? 'status-sudah' : 'status-belum'}">
                                ${state.files.length > 0 ? 'Ada bukti' : 'Belum ada bukti'}
                            </span>
                        </div>
                        <textarea class="note-input" placeholder="Tambahkan catatan..." oninput="updateNote(${i}, this.value)">${state.note}</textarea>
                        <div class="upload-box">
                            <div class="upload-top">
                                <div><strong>Lampiran bukti</strong></div>
                                <button type="button" class="file-button" onclick="document.getElementById('file-input-${i}').click()">+ Pilih file</button>
                            </div>
                            <input type="file" id="file-input-${i}" class="upload-input" onchange="handleFile(${i}, this)">
                        </div>
                    </section>
                `;
            }).join('');

            updateProgress(criteria.length);
        }

        function updateNote(index, val) { getState(index).note = val; }
        
        function handleFile(index, input) {
            if (input.files && input.files[0]) {
                getState(index).files.push(input.files[0]);
                renderCriteria(); // Re-render agar badge status berubah
            }
        }

        function updateProgress(total) {
            let filled = 0;
            for(let i=0; i<total; i++) { if(getState(i).files.length > 0) filled++; }
            const percent = total > 0 ? (filled / total) * 100 : 0;
            document.getElementById('progressFill').style.width = percent + '%';
            document.getElementById('progressText').textContent = filled + ' / ' + total + ' kriteria';
        }

        // EVENT LISTENER KLIK SIDEBAR
        document.querySelectorAll('.subarea-link').forEach(btn => {
            btn.onclick = () => {
                selectedIndex = Number(btn.dataset.index);
                selectedLevelIndex = 0; // Balik ke level 1 tiap ganti sub area
                document.querySelectorAll('.subarea-link').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                renderCriteria();
            };
        });

        // EVENT LISTENER KLIK TAB LEVEL
        document.querySelectorAll('.level-tab').forEach(tab => {
            tab.onclick = () => {
                if(tab.style.pointerEvents === 'none') return; // Jangan bisa diklik jika terkunci
                selectedLevelIndex = Number(tab.dataset.level);
                renderCriteria();
            };
        });

        // Jalankan saat pertama kali dimuat
        renderCriteria();
    </script>
</body>
</html>