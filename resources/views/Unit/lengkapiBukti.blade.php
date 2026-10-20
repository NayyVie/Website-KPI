<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lengkapi Bukti | PLN NPS</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #153d60;
            --blue: #0879b8;
            --cyan: #12b9ce;
            --muted: #758da1;
            --border: #d8e3ed;
            --bg: #f3f7fb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: var(--navy);
            background:
                radial-gradient(circle at bottom left,
                    rgba(13, 178, 210, .09), transparent 300px),
                var(--bg);
            font-size: 12px;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button,
        select,
        input[type="file"] {
            cursor: pointer;
        }

        .page {
            max-width: 1500px;
            margin: auto;
            padding: 28px 32px 50px;
        }

        /* ========================================
           TOPBAR
           ======================================== */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        .back {
            color: #075ba3;
            text-decoration: none;
            font-weight: 500;
        }

        .back:hover {
            color: var(--cyan);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-actions label {
            color: var(--muted);
        }

        .top-actions select {
            min-height: 39px;
            padding: 0 13px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: var(--navy);
        }

        .top-actions select:focus {
            outline: 2px solid rgba(0, 159, 193, .25);
            border-color: var(--blue);
        }

        /* ========================================
           LAYOUT
           ======================================== */
        .layout {
            display: grid;
            grid-template-columns: 240px minmax(0, 1fr);
            gap: 16px;
            align-items: start;
        }

        .subarea-panel,
        .detail-panel {
            background: rgba(255, 255, 255, .96);
            border: 1px solid var(--border);
            border-radius: 11px;
            box-shadow: 0 4px 15px rgba(26, 69, 103, .035);
        }

        .subarea-panel {
            padding: 17px 10px;
            position: sticky;
            top: 15px;
            max-height: calc(100vh - 30px);
            overflow-y: auto;
        }

        .panel-caption {
            color: var(--muted);
            font-size: 10px;
            padding: 0 6px;
        }

        .unit-title {
            padding: 0 6px;
            margin: 2px 0 13px;
            font-size: 14px;
            font-weight: 600;
        }

        .subarea-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 7px;
            width: 100%;
            padding: 10px 8px;
            margin-bottom: 5px;
            text-align: left;
            color: var(--navy);
            background: transparent;
            border: 1px solid transparent;
            border-radius: 7px;
        }

        .subarea-link:hover {
            background: #f2f9fc;
            border-color: #d8edf4;
        }

        .subarea-link.active {
            background: #f7fafc;
            border-color: #183e69;
            box-shadow: inset 3px 0 #183e69;
            font-weight: 600;
        }

        .subarea-name {
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .score-pill {
            flex-shrink: 0;
            padding: 5px 8px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .score-good {
            background: #e0f4e9;
            color: #087c52;
        }

        .score-medium {
            background: #fff0dc;
            color: #a96300;
        }

        .score-low {
            background: #fde5e5;
            color: #c53535;
        }

        /* ========================================
           DETAIL PANEL
           ======================================== */
        .detail-panel {
            padding: 20px;
            min-width: 0;
        }

        .detail-header {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 183px;
            gap: 18px;
            align-items: stretch;
            margin-bottom: 20px;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 5px;
        }

        .detail-title {
            font-size: 21px;
            margin: 0;
            color: #153d60;
            overflow-wrap: anywhere;
        }

        .detail-description {
            margin: 7px 0 0;
            color: var(--muted);
            line-height: 1.8;
        }

        .score-card {
            background: #f5f8fa;
            border-left: 3px solid var(--cyan);
            border-radius: 0 7px 7px 0;
            padding: 12px;
        }

        .score-card strong {
            display: block;
            font-size: 25px;
            margin: 3px 0;
            color: #153d60;
        }

        .score-card p {
            font-size: 10px;
            color: var(--muted);
            line-height: 1.6;
            margin: 5px 0 0;
        }

        /* ========================================
           PROGRESS BAR
           ======================================== */
        .progress-section {
            margin-bottom: 24px;
            padding: 14px;
            background: #f5f8fa;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            font-size: 11px;
        }

        .progress-header strong {
            color: var(--navy);
        }

        .progress-bar {
            height: 8px;
            background: #e2eef5;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #008fb5, #13bfd0);
            border-radius: 20px;
            transition: width 0.3s ease;
        }

        /* ========================================
           KRITERIA HEADING
           ======================================== */
        .criteria-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 11px;
        }

        .criteria-heading h3 {
            font-size: 14px;
            margin: 0;
        }

        .criteria-heading p {
            color: var(--muted);
            margin: 4px 0 0;
            font-size: 10px;
        }

        .level-badge {
            padding: 8px;
            border: 1px solid var(--border);
            border-radius: 7px;
            white-space: nowrap;
            font-size: 10px;
            background: white;
        }

        .level-badge strong {
            color: var(--blue);
        }

        /* ========================================
           KRITERIA CARD
           ======================================== */
        .criterion {
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            margin-bottom: 12px;
            background: white;
            transition: border-color 0.2s ease;
        }

        .criterion:hover {
            border-color: #b8d4e4;
        }

        .criterion.filled {
            border-color: #a7dfc4;
            background: #fafffc;
        }

        .criterion-top {
            display: grid;
            grid-template-columns: 25px minmax(130px, 1fr) auto;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .number {
            width: 24px;
            height: 24px;
            display: grid;
            place-items: center;
            background: #e5eef5;
            color: #49677e;
            border-radius: 50%;
            font-weight: 600;
            font-size: 11px;
        }

        .criterion.filled .number {
            background: #dff3e8;
            color: #087c52;
        }

        .criterion-name {
            font-size: 11px;
            font-weight: 500;
            line-height: 1.7;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-belum {
            background: #fde5e5;
            color: #c53535;
        }

        .status-sudah {
            background: #e0f4e9;
            color: #087c52;
        }

        /* ========================================
           FORM ELEMENTS
           ======================================== */
        .field-label {
            display: block;
            margin: 12px 0 6px;
            color: #49677e;
            font-size: 10px;
            font-weight: 500;
        }

        .note-input {
            width: 100%;
            min-height: 42px;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 7px;
            outline: none;
            color: var(--navy);
            background: white;
            resize: vertical;
        }

        .note-input:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(18, 185, 206, .09);
        }

        /* ========================================
           UPLOAD BOX
           ======================================== */
        .upload-box {
            margin-top: 10px;
            padding: 11px;
            border: 1px dashed #cbd9e5;
            border-radius: 7px;
            background: #f8fafc;
        }

        .upload-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .upload-box strong {
            font-size: 10px;
        }

        .upload-box p {
            font-size: 9px;
            color: var(--muted);
            margin: 4px 0 0;
        }

        .file-button {
            border: 1px solid var(--border);
            background: white;
            color: var(--navy);
            padding: 8px 14px;
            border-radius: 6px;
            white-space: nowrap;
            font-size: 10px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .file-button:hover {
            background: #f0fbfd;
            border-color: #9edce7;
        }

        .upload-input {
            display: none;
        }

        /* ========================================
           FILE LIST
           ======================================== */
        .file-list {
            display: grid;
            gap: 7px;
            margin-top: 10px;
        }

        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 9px;
            background: white;
            border: 1px solid #edf1f5;
            border-radius: 6px;
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0;
        }

        .file-icon {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 27px;
            height: 27px;
            border: 1px solid #a6d9e3;
            border-radius: 5px;
            background: #eefbfc;
            color: #0879b8;
            font-size: 8px;
            font-weight: 700;
        }

        .file-name {
            display: block;
            overflow-wrap: anywhere;
            color: #153d60;
            font-size: 10px;
        }

        .file-size {
            display: block;
            margin-top: 3px;
            color: #758da1;
            font-size: 9px;
        }

        .delete-file {
            flex-shrink: 0;
            border: none;
            background: transparent;
            color: #c53535;
            font-size: 10px;
            cursor: pointer;
        }

        .delete-file:hover {
            text-decoration: underline;
        }

        /* ========================================
           SAVE ROW
           ======================================== */
        .save-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 18px;
            gap: 9px;
        }

        .btn-reset {
            border: 1px solid var(--border);
            background: white;
            color: var(--navy);
            border-radius: 7px;
            padding: 11px 17px;
            font-weight: 500;
        }

        .btn-reset:hover {
            background: #f8fafc;
        }

        .save-button {
            border: 0;
            border-radius: 7px;
            padding: 11px 17px;
            color: white;
            background: linear-gradient(105deg, #008fb5, #13bfd0);
            font-weight: 600;
            transition: filter 0.2s;
        }

        .save-button:hover {
            filter: brightness(1.05);
        }

        /* ========================================
           EMPTY
           ======================================== */
        .empty-criteria {
            padding: 25px 15px;
            background: #f8fbfd;
            border: 1px dashed var(--border);
            border-radius: 8px;
            line-height: 1.8;
            color: var(--muted);
        }

        /* ========================================
           RESPONSIVE
           ======================================== */
        @media (max-width: 900px) {
            .page {
                padding: 20px 16px 35px;
            }

            .layout {
                grid-template-columns: 205px minmax(0, 1fr);
                gap: 10px;
            }

            .detail-panel {
                padding: 14px;
            }

            .detail-header {
                grid-template-columns: 1fr;
            }

            .criterion-top {
                grid-template-columns: 25px minmax(0, 1fr);
            }

            .status-badge {
                grid-column: 2;
                justify-self: start;
            }
        }

        @media (max-width: 600px) {
            .page {
                padding: 14px 10px 25px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .top-actions {
                width: 100%;
                flex-wrap: wrap;
            }

            .top-actions select {
                flex: 1;
                min-width: 0;
            }

            .layout {
                grid-template-columns: 1fr;
            }

            .subarea-panel {
                position: static;
                max-height: none;
            }

            .subarea-list {
                display: flex;
                overflow-x: auto;
                gap: 7px;
                padding-bottom: 5px;
            }

            .subarea-link {
                flex: 0 0 185px;
                align-items: flex-start;
                min-height: 58px;
                border: 1px solid var(--border);
                margin: 0;
            }

            .detail-title {
                font-size: 19px;
            }

            .criterion {
                padding: 10px;
            }

            .upload-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .save-row {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        <header class="topbar">
            <a class="back" href="{{ url('/unit/dashboard') }}">
                ← Kembali ke portal unit
            </a>

            <div class="top-actions">
                <label for="unitSelect">Unit pengguna</label>

                <select id="unitSelect" aria-label="Pilih unit">
                    <option value="banjarsari" selected>Banjarsari</option>
                </select>
            </div>
        </header>

        <div class="layout">

            <!-- SIDEBAR SUB AREA -->
            <aside class="subarea-panel">
                <div class="panel-caption">Sub area</div>
                <h2 class="unit-title">{{ $namaUnit ?? 'Banjarsari' }}</h2>

                <nav class="subarea-list" id="subareaList">
                    @foreach ($subAreas as $index => $sub)
                        <button type="button" class="subarea-link {{ $index === 0 ? 'active' : '' }}"
                            data-index="{{ $index }}">
                            <span class="subarea-name">{{ $sub['nama'] }}</span>
                            <span class="score-pill {{ $sub['score'] >= 3.6 ? 'score-good' : ($sub['score'] >= 2 ? 'score-medium' : 'score-low') }}">
                                {{ number_format($sub['score'], 1) }}
                            </span>
                        </button>
                    @endforeach
                </nav>
            </aside>

            <!-- PANEL DETAIL -->
            <main class="detail-panel">

                <div class="detail-header">
                    <div>
                        <div class="breadcrumb" id="breadcrumb">
                            {{ $subAreas[0]['area'] ?? 'Inventory' }} · 4.2.3.1
                        </div>

                        <h1 class="detail-title" id="detailTitle">
                            {{ $subAreas[0]['nama'] ?? 'Detail Sub Area' }}
                        </h1>

                        <p class="detail-description">
                            Lengkapi dokumen bukti dan catatan pelaksanaan untuk
                            sub area ini. Setelah selesai, kirim ke admin untuk diverifikasi.
                        </p>
                    </div>

                    <div class="score-card">
                        <span class="panel-caption">Score ML saat ini</span>
                        <strong id="mainScore">
                            {{ number_format($subAreas[0]['score'] ?? 0, 1) }}
                        </strong>
                        <p id="scoreDescription">
                            Lengkapi semua bukti untuk meningkatkan nilai.
                        </p>
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
                    <div>
                        <h3 id="criteriaTitle">Kriteria Sub Area</h3>
                        <p id="criteriaSubtitle">Kriteria verifikasi</p>
                    </div>

                    <div class="level-badge">
                        Status <strong id="statusLabel">Belum lengkap</strong>
                    </div>
                </div>

                <form action="#" method="POST" id="lengkapiForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="unit" value="{{ $namaUnit ?? 'Banjarsari' }}">
                    <input type="hidden" name="sub_area" id="subAreaInput" value="{{ $subAreas[0]['nama'] ?? '' }}">

                    <div id="criteriaContainer"></div>

                    <div class="save-row">
                        <button type="button" class="btn-reset" id="resetButton">Reset</button>
                        <button type="submit" class="save-button">
                            Kirim ke Admin →
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        // ==========================================
        // DATA DARI LARAVEL
        // ==========================================
        const subAreas = @json($subAreas);

        const subareaList = document.getElementById('subareaList');
        const criteriaContainer = document.getElementById('criteriaContainer');

        let selectedIndex = 0;

        // Menyimpan pilihan user selama halaman terbuka
        const savedStates = {};

        function getState(index) {
            if (!savedStates[index]) {
                savedStates[index] = {
                    note: '',
                    files: []
                };
            }
            return savedStates[index];
        }

        // ==========================================
        // FORMAT UKURAN FILE
        // ==========================================
        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        // ==========================================
        // UPDATE PROGRESS BAR
        // ==========================================
        function updateProgress() {
            const sub = subAreas[selectedIndex];
            const criteria = sub?.kriteria || [];

            let filledCount = 0;

            criteria.forEach((item, index) => {
                const state = getState(index);
                if (state.files.length > 0) {
                    filledCount++;
                }
            });

            const total = criteria.length;
            const percent = total > 0 ? (filledCount / total) * 100 : 0;

            document.getElementById('progressFill').style.width = percent + '%';
            document.getElementById('progressText').textContent =
                filledCount + ' / ' + total + ' kriteria';

            // Update status label
            const statusLabel = document.getElementById('statusLabel');

            if (filledCount === 0) {
                statusLabel.textContent = 'Belum lengkap';
                statusLabel.style.color = '#c53535';
            } else if (filledCount < total) {
                statusLabel.textContent = 'Sebagian';
                statusLabel.style.color = '#a96300';
            } else {
                statusLabel.textContent = 'Siap dikirim';
                statusLabel.style.color = '#087c52';
            }

            // Update card filled state
            criteriaContainer.querySelectorAll('.criterion').forEach((card, index) => {
                const state = getState(index);
                card.classList.toggle('filled', state.files.length > 0);
            });
        }

        // ==========================================
        // RENDER KRITERIA
        // ==========================================
        function renderCriteria() {
            const sub = subAreas[selectedIndex];

            if (!sub) {
                criteriaContainer.innerHTML = `
                    <div class="empty-criteria">Data sub area belum tersedia.</div>
                `;
                return;
            }

            const criteria = sub.kriteria || [];

            document.getElementById('detailTitle').textContent = sub.nama;
            document.getElementById('breadcrumb').textContent =
                (sub.area || 'Inventory') + ' · 4.2.3.1';
            document.getElementById('mainScore').textContent =
                Number(sub.score || 0).toFixed(1);
            document.getElementById('subAreaInput').value = sub.nama;
            document.getElementById('criteriaSubtitle').textContent =
                criteria.length + ' kriteria';

            // Set active sub area
            document.querySelectorAll('.subarea-link').forEach((button, i) => {
                button.classList.toggle('active', i === selectedIndex);
            });

            if (!criteria.length) {
                criteriaContainer.innerHTML = `
                    <div class="empty-criteria">
                        <strong>Data kriteria belum tersedia</strong><br>
                        Tambahkan data kriteria pada data sub area di Laravel
                        agar formulir dapat ditampilkan.
                    </div>
                `;
                updateProgress();
                return;
            }

            criteriaContainer.innerHTML = criteria.map((item, i) => {
                const state = getState(i);

                const fileListHtml = state.files.length > 0
                    ? `<div class="file-list">
                        ${state.files.map((file, fi) => `
                            <div class="file-item">
                                <div class="file-info">
                                    <div class="file-icon">DOC</div>
                                    <div>
                                        <span class="file-name">${escapeHtml(file.name)}</span>
                                        <span class="file-size">${formatFileSize(file.size)}</span>
                                    </div>
                                </div>
                                <button type="button" class="delete-file" data-criterion="${i}" data-file="${fi}">
                                    Hapus
                                </button>
                            </div>
                        `).join('')}
                    </div>`
                    : '';

                return `
                    <section class="criterion">
                        <div class="criterion-top">
                            <span class="number">${i + 1}</span>
                            <div class="criterion-name">${escapeHtml(item.nama)}</div>
                            <span class="status-badge ${state.files.length > 0 ? 'status-sudah' : 'status-belum'}">
                                ${state.files.length > 0 ? 'Ada bukti' : 'Belum ada bukti'}
                            </span>
                        </div>

                        <label class="field-label" for="note-${i}">
                            Catatan
                        </label>

                        <textarea
                            class="note-input"
                            id="note-${i}"
                            name="criteria[${i}][catatan]"
                            rows="2"
                            placeholder="Tambahkan catatan atau keterangan untuk kriteria ini">${escapeHtml(state.note)}</textarea>

                        <div class="upload-box">
                            <div class="upload-top">
                                <div>
                                    <strong>Lampiran bukti</strong>
                                    <p>PDF, JPG, PNG, DOC, XLS. Maks 10 MB per file.</p>
                                </div>
                                <button type="button" class="file-button" data-criterion="${i}">
                                    + Pilih file
                                </button>
                            </div>
                            <input
                                type="file"
                                class="upload-input"
                                data-criterion="${i}"
                                name="criteria[${i}][lampiran][]"
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx"
                                multiple>
                            ${fileListHtml}
                        </div>
                    </section>
                `;
            }).join('');

            // ======================================
            // SIMPAN CATATAN
            // ======================================
            criteriaContainer.querySelectorAll('textarea').forEach((textarea, i) => {
                textarea.addEventListener('input', () => {
                    getState(i).note = textarea.value;
                });
            });

            // ======================================
            // TOMBOL PILIH FILE
            // ======================================
            criteriaContainer.querySelectorAll('.file-button').forEach(button => {
                button.addEventListener('click', () => {
                    const index = Number(button.dataset.criterion);
                    const input = criteriaContainer.querySelector(
                        `.upload-input[data-criterion="${index}"]`
                    );
                    if (input) input.click();
                });
            });

            // ======================================
            // UPLOAD FILE
            // ======================================
            criteriaContainer.querySelectorAll('.upload-input').forEach(input => {
                input.addEventListener('change', () => {
                    const index = Number(input.dataset.criterion);
                    const state = getState(index);

                    // Gabungkan file yang baru dipilih dengan yang sudah ada
                    const newFiles = Array.from(input.files || []);
                    state.files = [...state.files, ...newFiles];

                    // Reset input supaya bisa pilih file yang sama lagi
                    input.value = '';

                    renderCriteria();
                });
            });

            // ======================================
            // HAPUS FILE
            // ======================================
            criteriaContainer.querySelectorAll('.delete-file').forEach(button => {
                button.addEventListener('click', () => {
                    const criterionIndex = Number(button.dataset.criterion);
                    const fileIndex = Number(button.dataset.file);

                    const state = getState(criterionIndex);
                    state.files.splice(fileIndex, 1);

                    renderCriteria();
                });
            });

            updateProgress();
        }

        // ==========================================
        // ESCAPE HTML
        // ==========================================
        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
        }

        // ==========================================
        // PILIH SUB AREA
        // ==========================================
        subareaList.querySelectorAll('.subarea-link').forEach(button => {
            button.addEventListener('click', () => {
                selectedIndex = Number(button.dataset.index);
                renderCriteria();
            });
        });

        // ==========================================
        // RESET
        // ==========================================
        document.getElementById('resetButton').addEventListener('click', () => {
            if (!confirm('Reset semua isian pada sub area ini?')) return;

            delete savedStates[selectedIndex];
            renderCriteria();
        });

        // ==========================================
        // SUBMIT FORM
        // ==========================================
        document.getElementById('lengkapiForm').addEventListener('submit', event => {
            event.preventDefault();

            const sub = subAreas[selectedIndex];
            const criteria = sub?.kriteria || [];

            const missingFiles = criteria.findIndex((item, index) => {
                const state = getState(index);
                return state.files.length === 0;
            });

            if (missingFiles !== -1) {
                alert(
                    'Kriteria nomor ' + (missingFiles + 1) +
                    ' belum memiliki lampiran bukti. ' +
                    'Lengkapi semua kriteria sebelum mengirim ke admin.'
                );
                return;
            }

            alert(
                'Simulasi: Bukti untuk sub area "' + sub.nama + '" akan dikirim ke admin.\n\n' +
                '(Backend belum dikonfigurasi — ini masih demo tampilan.)'
            );
        });

        // Tampilkan halaman pertama
        renderCriteria();
    </script>

</body>

</html>