<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verifikasi Unit | PLN NPS</title>

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

        .level-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 6px;
            margin-bottom: 24px;
        }

        .level-option {
            min-height: 52px;
            padding: 8px 4px;
            text-align: center;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: white;
            color: var(--navy);
        }

        .level-option strong,
        .level-option span {
            display: block;
        }

        .level-option strong {
            font-size: 10px;
        }

        .level-option span {
            margin-top: 3px;
            font-size: 9px;
        }

        .level-option.active {
            background: #163c64;
            border-color: #163c64;
            color: white;
        }

        .level-option.locked {
            background: #f7f9fb;
            border-style: dashed;
            color: #8295a6;
        }

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
        }

        .criterion {
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            margin-bottom: 12px;
            background: white;
        }

        .criterion-top {
            display: grid;
            grid-template-columns: 25px minmax(130px, 1fr) auto;
            align-items: center;
            gap: 10px;
        }

        .number {
            width: 24px;
            height: 24px;
            display: grid;
            place-items: center;
            background: #fde7e5;
            color: #c54b4b;
            border-radius: 50%;
            font-weight: 600;
        }

        .criterion-name {
            font-size: 11px;
            font-weight: 500;
            line-height: 1.7;
        }

        .index-badge {
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 8px;
            white-space: nowrap;
            font-size: 10px;
        }

        .index-badge strong {
            color: #c33;
            margin-left: 5px;
        }

        .verification {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .choice {
            display: flex;
            border: 1px solid var(--border);
            border-radius: 7px;
            overflow: hidden;
        }

        .choice label {
            position: relative;
            padding: 10px 13px;
            cursor: pointer;
            font-size: 10px;
        }

        .choice label+label {
            border-left: 1px solid var(--border);
        }

        .choice input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .choice label:has(input:checked) {
            background: #dff3e8;
            color: #087c52;
            font-weight: 600;
        }

        .choice label:has(input[value="tidak"]:checked) {
            background: #fde7e5;
            color: #b93838;
        }

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
        }

        .note-input:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(18, 185, 206, .09);
        }

        .upload-box {
            margin-top: 10px;
            padding: 11px;
            border: 1px dashed #cbd9e5;
            border-radius: 7px;
            background: #f8fafc;
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
            padding: 8px 10px;
            border-radius: 6px;
            white-space: nowrap;
        }

        .file-input {
            width: 100%;
            font-size: 10px;
            margin-top: 8px;
        }

        .save-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 18px;
            gap: 9px;
        }

        .save-button {
            border: 0;
            border-radius: 7px;
            padding: 11px 17px;
            color: white;
            background: linear-gradient(105deg, #008fb5, #13bfd0);
            font-weight: 600;
        }

        .save-button:hover {
            filter: brightness(1.05);
        }

        .empty-criteria {
            padding: 25px 15px;
            background: #f8fbfd;
            border: 1px dashed var(--border);
            border-radius: 8px;
            line-height: 1.8;
            color: var(--muted);
        }

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

            .score-card {
                max-width: none;
            }

            .criterion-top {
                grid-template-columns: 25px minmax(0, 1fr);
            }

            .index-badge {
                grid-column: 2;
                justify-self: start;
            }

            .level-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
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

            .level-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .criteria-heading {
                align-items: flex-start;
            }

            .criterion {
                padding: 10px;
            }

            .verification {
                justify-content: flex-start;
            }

            .choice label {
                padding: 10px;
            }

            .upload-box {
                align-items: flex-start;
            }

            .form-footer {
                flex-wrap: wrap;
            }
        }

        /* Kriteria yang belum bisa diverifikasi */
        .criterion-locked {
            background: #f8fafc;
        }

        .criterion-locked .criterion-name {
            color: #758da1;
        }

        .criterion-locked .upload-box {
            background: #f8fafc;
        }

        .criterion-locked input:disabled,
        .criterion-locked textarea:disabled {
            cursor: not-allowed;
            opacity: 0.65;
        }

        /* Kriteria yang belum bisa dinilai */
        .criterion.is-locked {
            background: #f7f9fb;
            color: #8295a6;
        }

        .criterion.is-locked .criterion-name {
            color: #718397;
        }

        .criterion.is-locked .verification,
        .criterion.is-locked .note-input,
        .criterion.is-locked .file-button {
            opacity: 0.55;
        }

        .criterion.is-locked .note-input,
        .criterion.is-locked input[type="file"],
        .criterion.is-locked .choice label {
            pointer-events: none;
        }

        .locked-message {
            margin: 12px 0 0 35px;
            padding: 10px;
            border-left: 2px solid #d83939;
            background: #fde8e7;
            color: #b52b2b;
            font-size: 9px;
            line-height: 1.8;
        }

        .index-badge strong {
            display: inline-block;
            min-width: 19px;
            padding: 3px 5px;
            margin-left: 5px;
            text-align: center;
            border-radius: 20px;
            background: #fde5e5;
            color: #c53535;
        }

        .index-badge strong.index-positive {
            background: #e0f4e9;
            color: #087c52;
        }

        /* Daftar file yang sudah dipilih */
        .upload-box {
            align-items: flex-start;
        }

        .upload-content {
            min-width: 0;
            flex: 1;
        }

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

        .upload-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .upload-top .file-button {
            flex-shrink: 0;
        }

        .upload-input {
            display: none;
        }

        @media (max-width: 600px) {
            .locked-message {
                margin-left: 0;
            }

            .file-item {
                align-items: flex-start;
            }
        }

        /* ==========================================
           MATURITY LEVEL (tambahan)
           ========================================== */
        .level-option {
            cursor: pointer;
            transition: background .15s, border-color .15s;
        }

        .level-option:hover:not(.active):not(.locked) {
            background: #f2f9fc;
            border-color: #9edce7;
        }

        .level-option .lv-score {
            color: var(--blue);
            font-weight: 600;
        }

        .level-option.active .lv-score {
            color: #fff;
        }

        .level-option .lv-lock {
            margin-top: 2px;
            font-size: 8px;
            color: #8295a6;
        }

        .level-option.locked {
            cursor: not-allowed;
        }

        .level-caption {
            color: var(--muted);
            font-size: 10px;
        }

        .criteria-heading h3 {
            font-size: 17px;
            margin: 2px 0 0;
        }

        .criteria-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 10px;
        }

        .upload-box {
            display: block;
        }

        .locked-message {
            margin: 12px 0 0;
        }

        .file-warning {
            margin: 9px 0 0;
            color: #c53535;
            font-size: 10px;
            line-height: 1.6;
        }

        .file-warning[hidden],
        .locked-message[hidden] {
            display: none;
        }

        .file-button:disabled {
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="page">

        <header class="topbar">
            <a class="back" href="{{ url('/dashboardAdmin') }}">
                ← Kembali ke dashboard admin
            </a>

            <div class="top-actions">
                <label for="unitSelect">Unit</label>

                <select id="unitSelect" aria-label="Pilih unit">
                    @foreach ($daftarUnit as $slug => $nama)
                        <option value="{{ $slug }}" {{ request()->route('unit') === $slug ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </header>

        <div class="layout">

            <aside class="subarea-panel">
                <div class="panel-caption">Sub area</div>
                <h2 class="unit-title">{{ $namaUnit }}</h2>

                <nav class="subarea-list" id="subareaList">
                    @foreach ($subAreas as $index => $sub)
                        <button type="button" class="subarea-link {{ $index === 0 ? 'active' : '' }}"
                            data-index="{{ $index }}">
                            <span class="subarea-name">{{ $sub['nama'] }}</span>

                            <span
                                class="score-pill
                            {{ $sub['score'] >= 3.6 ? 'score-good' : ($sub['score'] >= 2 ? 'score-medium' : 'score-low') }}">
                                {{ number_format($sub['score'], 1) }}
                            </span>
                        </button>
                    @endforeach
                </nav>
            </aside>

            <main class="detail-panel">
                <div class="detail-header">
                    <div>
                        <div class="breadcrumb" id="breadcrumb">
                            {{ $subAreas[0]['area'] ?? 'Inventory' }}
                            · 4.2.3.1
                        </div>

                        <h1 class="detail-title" id="detailTitle">
                            {{ $subAreas[0]['nama'] ?? 'Detail Sub Area' }}
                        </h1>

                        <p class="detail-description">
                            Memastikan proses, dokumen, dan bukti pelaksanaan
                            sub area memenuhi pedoman maturity level SCM.
                        </p>
                    </div>

                    <div class="score-card">
                        <span class="panel-caption">Score ML sub area</span>
                        <strong id="mainScore">
                            {{ number_format($subAreas[0]['score'] ?? 0, 1) }}
                        </strong>
                        <p id="scoreDescription">
                            Level berikutnya terbuka hanya jika semua kriteria
                            level sebelumnya sesuai.
                        </p>
                    </div>
                </div>

                <div class="level-grid" id="levelGrid"></div>

                <div class="criteria-heading">
                    <div>
                        <div class="level-caption" id="levelCaption">Level 1</div>
                        <h3 id="criteriaTitle">Fire Fighting</h3>
                    </div>

                    <div class="criteria-meta">
                        <span id="criteriaSubtitle">0 kriteria</span>
                        <div class="level-badge">
                            Nilai level <strong id="levelScore">0.0</strong>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.unit.verifikasi.simpan', ['unit' => request()->route('unit')]) }}"
                    method="POST" id="verificationForm" enctype="multipart/form-data">
                    @csrf

                    <div id="criteriaContainer"></div>

                    <div class="save-row">
                        <button type="button" class="theme-btn" id="resetButton">Reset pilihan</button>
                        <button type="submit" class="save-button" id="saveButton">
                            Simpan verifikasi →
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
        const levels = @json($levels);       // [{nama, range}, ...] -> index 0 = Level 1
        const subAreas = @json($subAreas);   // tiap sub area: kriteria[level-1][], tersimpan[level-1][]
        const MAX_SCORE = levels.length;

        const unitSelect = document.getElementById('unitSelect');
        const subareaList = document.getElementById('subareaList');
        const levelGrid = document.getElementById('levelGrid');
        const criteriaContainer = document.getElementById('criteriaContainer');
        const verificationForm = document.getElementById('verificationForm');

        let selectedIndex = 0; // sub area aktif
        let selectedLevel = 1; // level aktif (1..5)

        // Menyimpan pilihan verifikator selama halaman masih terbuka.
        const savedChoices = {};

        // ==========================================
        // STATE PER KRITERIA
        // ==========================================
        function stateKey(si, level, i) {
            return si + '-' + level + '-' + i;
        }

        function getState(si, level, i) {
            const key = stateKey(si, level, i);

            if (!savedChoices[key]) {
                // Isi awal dari data tersimpan (nanti berasal dari database).
                const stored = Boolean(subAreas[si]?.tersimpan?.[level - 1]?.[i]);

                savedChoices[key] = {
                    choice: stored ? 'sesuai' : '',
                    note: '',
                    files: stored ? [{ name: 'Bukti tersimpan', size: null, stored: true }] : []
                };
            }

            return savedChoices[key];
        }

        function criteriaOf(si, level) {
            return subAreas[si]?.kriteria?.[level - 1] || [];
        }

        // Kriteria lolos jika Sesuai DAN ada lampiran.
        function isPassed(si, level, i) {
            const state = getState(si, level, i);
            return state.choice === 'sesuai' && state.files.length > 0;
        }

        // ==========================================
        // HITUNG LEVEL (ATURAN UTAMA MATURITY LEVEL)
        // ==========================================
        // - Kriteria n terbuka jika level terbuka & kriteria 1..n-1 lolos.
        // - Nilai level = kriteria lolos / total kriteria level.
        // - Level berikutnya terbuka jika SEMUA kriteria level ini lolos.
        function computeLevels(si) {
            const result = [];
            let levelOpen = true;

            levels.forEach((lv, idx) => {
                const level = idx + 1;
                const total = criteriaOf(si, level).length;
                const criteria = [];
                let chainOk = true;
                let count = 0;

                for (let i = 0; i < total; i++) {
                    const unlocked = levelOpen && chainOk;
                    const passed = unlocked && isPassed(si, level, i);

                    criteria.push({ unlocked, passed });

                    if (passed) {
                        count++;
                    } else {
                        chainOk = false;
                    }
                }

                const complete = total > 0 && count === total;

                result.push({
                    level,
                    total,
                    count,
                    criteria,
                    unlocked: levelOpen,
                    complete,
                    score: total > 0 ? count / total : 0
                });

                levelOpen = levelOpen && complete;
            });

            return result;
        }

        // Score ML sub area = jumlah nilai semua level (maks. 5).
        // Jika sub area belum punya data kriteria, pakai skor bawaan dari server.
        function subAreaScore(si) {
            const hasData = levels.some((lv, idx) => criteriaOf(si, idx + 1).length > 0);

            if (!hasData) return Number(subAreas[si]?.score || 0);

            const sum = computeLevels(si).reduce((total, item) => total + item.score, 0);
            return Math.min(MAX_SCORE, sum);
        }

        function scoreClass(score) {
            if (score >= 3.6) return 'score-good';
            if (score >= 2) return 'score-medium';
            return 'score-low';
        }

        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
        }

        function formatFileSize(bytes) {
            if (bytes === null || bytes === undefined) return 'Tersimpan';
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        // ==========================================
        // UPDATE TAMPILAN (tanpa render ulang kartu)
        // ==========================================
        function update() {
            const stats = computeLevels(selectedIndex);

            // Jika level aktif ternyata terkunci (mis. verifikator mengubah
            // kriteria level sebelumnya), pindah ke level terbuka tertinggi.
            if (!stats[selectedLevel - 1].unlocked) {
                const open = stats.filter(item => item.unlocked);
                selectedLevel = open[open.length - 1].level;
                renderCriteria();
                return;
            }

            const sub = subAreas[selectedIndex];
            const current = stats[selectedLevel - 1];
            const levelInfo = levels[selectedLevel - 1];

            // Sidebar: nama aktif + skor tiap sub area
            document.querySelectorAll('.subarea-link').forEach((button, i) => {
                button.classList.toggle('active', i === selectedIndex);

                const score = subAreaScore(i);
                const pill = button.querySelector('.score-pill');

                pill.textContent = score.toFixed(1);
                pill.className = 'score-pill ' + scoreClass(score);
            });

            // Header
            document.getElementById('detailTitle').textContent = sub.nama;
            document.getElementById('breadcrumb').textContent =
                sub.area + ' · ' + (selectedIndex + 1) + '.1.1';
            document.getElementById('mainScore').textContent =
                subAreaScore(selectedIndex).toFixed(1);

            // Tab level
            levelGrid.innerHTML = levels.map((lv, idx) => {
                const item = stats[idx];
                const classes = [
                    'level-option',
                    item.level === selectedLevel ? 'active' : '',
                    item.unlocked ? '' : 'locked'
                ].join(' ');

                return `
                    <button type="button" class="${classes}" data-level="${item.level}"
                        ${item.unlocked ? '' : 'aria-disabled="true"'}>
                        <strong>${escapeHtml(lv.range)}</strong>
                        <span class="lv-score">Nilai ${item.score.toFixed(1)}</span>
                        ${item.unlocked ? '' : '<span class="lv-lock">Terkunci</span>'}
                    </button>
                `;
            }).join('');

            // Judul level
            document.getElementById('levelCaption').textContent = 'Level ' + selectedLevel;
            document.getElementById('criteriaTitle').textContent = levelInfo.nama;
            document.getElementById('criteriaSubtitle').textContent = current.total + ' kriteria';
            document.getElementById('levelScore').textContent = current.score.toFixed(1);

            // Kartu kriteria
            criteriaContainer.querySelectorAll('.criterion').forEach(card => {
                const i = Number(card.dataset.index);
                const info = current.criteria[i];
                const state = getState(selectedIndex, selectedLevel, i);

                card.classList.toggle('criterion-locked', !info.unlocked);
                card.classList.toggle('is-locked', !info.unlocked);

                card.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.disabled = !info.unlocked;
                });
                card.querySelector('textarea').disabled = !info.unlocked;
                card.querySelector('.upload-input').disabled = !info.unlocked;
                card.querySelector('.file-button').disabled = !info.unlocked;

                const badge = card.querySelector('.index-badge strong');
                badge.textContent = info.passed ? 1 : 0;
                badge.classList.toggle('index-positive', info.passed);

                card.querySelector('.locked-message').hidden = info.unlocked;

                card.querySelector('.file-warning').hidden = !(
                    info.unlocked && state.choice === 'sesuai' && state.files.length === 0
                );
            });
        }

        // ==========================================
        // DAFTAR FILE PER KRITERIA
        // ==========================================
        function renderFileList(card) {
            const i = Number(card.dataset.index);
            const state = getState(selectedIndex, selectedLevel, i);
            const list = card.querySelector('.file-list');

            list.innerHTML = state.files.map((file, fi) => `
                <div class="file-item">
                    <div class="file-info">
                        <div class="file-icon">DOC</div>
                        <div>
                            <span class="file-name">${escapeHtml(file.name)}</span>
                            <span class="file-size">${formatFileSize(file.size)}</span>
                        </div>
                    </div>
                    <button type="button" class="delete-file" data-file="${fi}">Hapus</button>
                </div>
            `).join('');
        }

        // ==========================================
        // RENDER KRITERIA (sub area + level aktif)
        // ==========================================
        function renderCriteria() {
            const criteria = criteriaOf(selectedIndex, selectedLevel);

            if (!criteria.length) {
                criteriaContainer.innerHTML = `
                    <div class="empty-criteria">
                        <strong>Data kriteria belum tersedia</strong><br>
                        Tambahkan kriteria untuk sub area dan level ini pada
                        <code>config/maturity.php</code>.
                    </div>
                `;
                update();
                return;
            }

            criteriaContainer.innerHTML = criteria.map((item, i) => {
                const state = getState(selectedIndex, selectedLevel, i);

                return `
                    <section class="criterion" data-index="${i}">
                        <div class="criterion-top">
                            <span class="number">${i + 1}</span>
                            <div class="criterion-name">${escapeHtml(item.nama)}</div>
                            <span class="index-badge">
                                Indeks dokumen
                                <strong>0</strong>
                            </span>
                        </div>

                        <div class="locked-message" hidden>
                            Indeks otomatis 0 karena kriteria sebelumnya belum terpenuhi.
                            Selesaikan dan setujui kriteria sebelumnya untuk melanjutkan.
                        </div>

                        <div class="verification">
                            <div class="choice">
                                <label>
                                    <input type="radio" name="status-${i}" value="sesuai"
                                        ${state.choice === 'sesuai' ? 'checked' : ''}>
                                    Sesuai
                                </label>
                                <label>
                                    <input type="radio" name="status-${i}" value="tidak"
                                        ${state.choice === 'tidak' ? 'checked' : ''}>
                                    Tidak sesuai
                                </label>
                            </div>
                        </div>

                        <label class="field-label" for="note-${i}">Catatan verifikator</label>
                        <textarea class="note-input" id="note-${i}" rows="1"
                            placeholder="Tambahkan catatan hasil pemeriksaan">${escapeHtml(state.note)}</textarea>

                        <div class="upload-box">
                            <div class="upload-top">
                                <div class="upload-content">
                                    <strong>Lampiran bukti</strong>
                                    <p>Semua jenis file didukung. Anda dapat memilih beberapa file.</p>
                                </div>
                                <button type="button" class="file-button">Pilih file</button>
                            </div>
                            <input type="file" class="upload-input" multiple
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx">
                            <div class="file-list"></div>
                        </div>

                        <p class="file-warning" hidden>
                            Lampiran bukti wajib diunggah agar indeks menjadi 1.
                        </p>
                    </section>
                `;
            }).join('');

            criteriaContainer.querySelectorAll('.criterion').forEach(renderFileList);
            update();
        }

        // ==========================================
        // EVENT: kartu kriteria (delegasi, dipasang sekali)
        // ==========================================
        function cardOf(target) {
            return target.closest('.criterion');
        }

        criteriaContainer.addEventListener('input', event => {
            if (!event.target.matches('textarea')) return;

            const card = cardOf(event.target);
            getState(selectedIndex, selectedLevel, Number(card.dataset.index)).note = event.target.value;
        });

        criteriaContainer.addEventListener('change', event => {
            const card = cardOf(event.target);
            if (!card) return;

            const i = Number(card.dataset.index);
            const state = getState(selectedIndex, selectedLevel, i);

            if (event.target.matches('input[type="radio"]')) {
                state.choice = event.target.value;
                update();
                return;
            }

            if (event.target.matches('.upload-input')) {
                state.files = [...state.files, ...Array.from(event.target.files || [])];
                event.target.value = '';
                renderFileList(card);
                update();
            }
        });

        criteriaContainer.addEventListener('click', event => {
            const card = cardOf(event.target);
            if (!card) return;

            if (event.target.matches('.file-button')) {
                card.querySelector('.upload-input').click();
                return;
            }

            if (event.target.matches('.delete-file')) {
                const i = Number(card.dataset.index);
                const state = getState(selectedIndex, selectedLevel, i);

                state.files.splice(Number(event.target.dataset.file), 1);
                renderFileList(card);
                update();
            }
        });

        // ==========================================
        // PILIH LEVEL (level terkunci diabaikan)
        // ==========================================
        levelGrid.addEventListener('click', event => {
            const button = event.target.closest('.level-option');

            if (!button || button.classList.contains('locked')) return;

            selectedLevel = Number(button.dataset.level);
            renderCriteria();
        });

        // ==========================================
        // PILIH SUB AREA
        // ==========================================
        subareaList.querySelectorAll('.subarea-link').forEach(button => {
            button.addEventListener('click', () => {
                selectedIndex = Number(button.dataset.index);
                selectedLevel = 1;
                renderCriteria();
            });
        });

        // ==========================================
        // PINDAH UNIT
        // ==========================================
        unitSelect.addEventListener('change', () => {
            window.location.href =
                '/admin/unit/' + encodeURIComponent(unitSelect.value) + '/verifikasi';
        });

        // ==========================================
        // RESET (sub area + level aktif)
        // ==========================================
        document.getElementById('resetButton').addEventListener('click', () => {
            if (!confirm('Reset pilihan pada level ini?')) return;

            criteriaOf(selectedIndex, selectedLevel).forEach((item, i) => {
                savedChoices[stateKey(selectedIndex, selectedLevel, i)] = {
                    choice: '',
                    note: '',
                    files: []
                };
            });

            renderCriteria();
        });

        // ==========================================
        // SIMPAN (kirim semua level sub area aktif)
        // ==========================================
        verificationForm.addEventListener('submit', async event => {
            event.preventDefault();

            const sub = subAreas[selectedIndex];
            const saveButton = document.getElementById('saveButton');
            const token = document.querySelector('meta[name="csrf-token"]').content;
            const data = new FormData();

            data.append('sub_area', sub.nama);

            levels.forEach((lv, idx) => {
                const level = idx + 1;

                criteriaOf(selectedIndex, level).forEach((item, i) => {
                    const state = savedChoices[stateKey(selectedIndex, level, i)];
                    if (!state) return;

                    const prefix = 'hasil[' + level + '][' + i + ']';

                    if (state.choice) data.append(prefix + '[status]', state.choice);
                    if (state.note) data.append(prefix + '[catatan]', state.note);

                    // File yang sudah tersimpan di server tidak dikirim ulang.
                    state.files
                        .filter(file => file instanceof File)
                        .forEach(file => data.append(prefix + '[lampiran][]', file));
                });
            });

            saveButton.disabled = true;

            try {
                const response = await fetch(verificationForm.action, {
                    method: 'POST',
                    body: data,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                const result = await response.json().catch(() => ({}));

                alert(response.ok
                    ? (result.message || 'Verifikasi berhasil disimpan.')
                    : (result.message || 'Gagal menyimpan verifikasi.'));
            } catch (error) {
                alert('Tidak dapat terhubung ke server. Coba lagi.');
            } finally {
                saveButton.disabled = false;
            }
        });

        // Tampilkan halaman pertama
        renderCriteria();

    </script>

</body>

</html>