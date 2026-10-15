<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .top-actions select,
        .theme-btn {
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

        .theme-btn:hover {
            background: #edfaff;
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

        body.dark {
            --navy: #e3effa;
            --muted: #a5b7c9;
            --border: #344b62;
            --bg: #102337;
            background: var(--bg);
        }

        body.dark .subarea-panel,
        body.dark .detail-panel,
        body.dark .criterion,
        body.dark .note-input,
        body.dark .top-actions select,
        body.dark .theme-btn,
        body.dark .file-button,
        body.dark .level-option {
            background: #192f45;
            color: var(--navy);
        }

        body.dark .score-card,
        body.dark .upload-box,
        body.dark .empty-criteria,
        body.dark .subarea-link.active {
            background: #203950;
        }

        body.dark .subarea-link {
            color: var(--navy);
        }

        body.dark .level-option.active {
            background: #0879b8;
        }

        body.dark .detail-title,
        body.dark .score-card strong {
            color: var(--navy);
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

        body.dark .criterion-locked {
            background: #203950;
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

        body.dark .file-item {
            background: #192f45;
            border-color: #344b62;
        }

        body.dark .file-name {
            color: #e3effa;
        }

        body.dark .criterion.is-locked {
            background: #172a3d;
        }

        @media (max-width: 600px) {
            .locked-message {
                margin-left: 0;
            }

            .file-item {
                align-items: flex-start;
            }
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

                <button class="theme-btn" id="themeToggle" type="button">
                    Gunakan tema gelap
                </button>
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
                            Level berikutnya terbuka setelah kriteria level
                            sebelumnya sesuai.
                        </p>
                    </div>
                </div>

                <div class="level-grid" id="levelGrid">
                    <button type="button" class="level-option active" data-level="1">
                        <strong>≤1</strong>
                        <span>Nilai 1.0</span>
                    </button>
                    <button type="button" class="level-option" data-level="2">
                        <strong>1&lt;x≤2</strong>
                        <span>Nilai 1.0</span>
                    </button>
                    <button type="button" class="level-option" data-level="3">
                        <strong>2&lt;x≤3</strong>
                        <span>Nilai 0.2</span>
                    </button>
                    <button type="button" class="level-option locked" data-level="4">
                        <strong>3&lt;x≤4</strong>
                        <span>Nilai 0.0 · Terkunci</span>
                    </button>
                    <button type="button" class="level-option locked" data-level="5">
                        <strong>4&lt;x≤5</strong>
                        <span>Nilai 0.0 · Terkunci</span>
                    </button>
                </div>

                <div class="criteria-heading">
                    <div>
                        <h3 id="criteriaTitle">Level 1</h3>
                        <p id="criteriaSubtitle">Kriteria verifikasi</p>
                    </div>

                    <div class="level-badge">
                        Nilai level <strong id="levelScore">1.0</strong>
                    </div>
                </div>

                <form action="#" method="POST" id="verificationForm" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="unit" value="{{ $namaUnit }}">
                    <input type="hidden" name="sub_area" id="subAreaInput" value="{{ $subAreas[0]['nama'] ?? '' }}">
                    <input type="hidden" name="level" id="levelInput" value="1">

                    <div id="criteriaContainer"></div>

                    <div class="save-row">
                        <button type="button" class="theme-btn" id="resetButton">Reset pilihan</button>
                        <button type="submit" class="save-button">
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
        const subAreas = @json($subAreas);

        const unitSelect = document.getElementById('unitSelect');
        const subareaList = document.getElementById('subareaList');
        const criteriaContainer = document.getElementById('criteriaContainer');

        let selectedIndex = 0;
        let selectedLevel = 1;

        // Menyimpan pilihan admin selama halaman masih terbuka.
        const savedChoices = {};

        function getKey(index) {
            return selectedIndex + '-' + selectedLevel + '-' + index;
        }

        function getState(index) {
            const key = getKey(index);

            if (!savedChoices[key]) {
                savedChoices[key] = {
                    choice: '',
                    note: '',
                    files: []
                };
            }

            return savedChoices[key];
        }

        function scoreClass(score) {
            if (score >= 3.6) return 'score-good';
            if (score >= 2) return 'score-medium';
            return 'score-low';
        }

        // ==========================================
        // CEK APAKAH KRITERIA SUDAH TERPENUHI
        // ==========================================
        function isCriterionPassed(index) {
            const state = getState(index);

            return state.choice === 'sesuai' &&
                state.files.length > 0;
        }

        // Indeks 1 hanya jika file tersedia dan admin
        // memilih Sesuai. Selain itu, indeks tetap 0.
        function getDocumentIndex(index) {
            return isCriterionPassed(index) ? 1 : 0;
        }

        // Kriteria pertama selalu dapat dikerjakan.
        // Kriteria berikutnya terbuka jika kriteria
        // sebelumnya sudah Sesuai dan memiliki file.
        function isCriterionUnlocked(index) {
            if (index === 0) return true;

            for (let i = 0; i < index; i++) {
                if (!isCriterionPassed(i)) {
                    return false;
                }
            }

            return true;
        }

        // ==========================================
        // UPDATE STATUS, INDEKS, DAN PENGUNCIAN
        // ==========================================
        function updateCriteriaStates() {
            const sub = subAreas[selectedIndex];
            const criteria = sub?.kriteria || [];
            const cards = criteriaContainer.querySelectorAll('.criterion');

            cards.forEach((card, index) => {
                const state = getState(index);
                const unlocked = isCriterionUnlocked(index);
                const documentIndex = getDocumentIndex(index);

                card.classList.toggle('criterion-locked', !unlocked);

                // Tombol pilihan Sesuai / Tidak sesuai
                card.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.disabled = !unlocked;
                });

                // Catatan verifikator
                const note = card.querySelector('textarea');

                if (note) {
                    note.disabled = !unlocked;
                }

                // Upload lampiran
                const fileInput = card.querySelector('input[type="file"]');

                if (fileInput) {
                    fileInput.disabled = !unlocked;
                }

                // Indeks dokumen
                const indexValue = card.querySelector('.index-badge strong');

                if (indexValue) {
                    indexValue.textContent = documentIndex;
                    indexValue.style.color =
                        documentIndex === 1 ? '#087c52' : '#c33';
                }

                // Pesan kriteria terkunci seperti screenshot.
                let lockMessage = card.querySelector('.lock-message');

                if (!unlocked) {
                    if (!lockMessage) {
                        lockMessage = document.createElement('div');
                        lockMessage.className = 'lock-message';

                        lockMessage.style.cssText = `
                        margin-top: 12px;
                        padding: 9px 10px;
                        background: #fde7e5;
                        border-left: 2px solid #dc3545;
                        color: #c53535;
                        font-size: 9px;
                        line-height: 1.7;
                    `;

                        const top = card.querySelector('.criterion-top');

                        if (top) {
                            top.insertAdjacentElement('afterend', lockMessage);
                        }
                    }

                    lockMessage.textContent =
                        'Indeks otomatis 0 karena kriteria sebelumnya belum terpenuhi. ' +
                        'Selesaikan dan setujui kriteria sebelumnya untuk melanjutkan.';
                } else if (lockMessage) {
                    lockMessage.remove();
                }

                // Nama file yang dipilih
                const fileDescription = card.querySelector('.file-description');

                if (fileDescription) {
                    if (state.files.length > 0) {
                        fileDescription.textContent =
                            state.files.map(file => file.name).join(', ');
                    } else {
                        fileDescription.textContent =
                            'Semua jenis file yang diizinkan dapat dilampirkan.';
                    }
                }

                // Tandai pilihan Sesuai yang belum memiliki file.
                let fileWarning = card.querySelector('.file-warning');

                if (unlocked &&
                    state.choice === 'sesuai' &&
                    state.files.length === 0) {

                    if (!fileWarning) {
                        fileWarning = document.createElement('p');
                        fileWarning.className = 'file-warning';

                        fileWarning.style.cssText = `
                        margin: 9px 0 0;
                        color: #c53535;
                        font-size: 10px;
                        line-height: 1.6;
                    `;

                        const verification = card.querySelector('.verification');

                        if (verification) {
                            verification.insertAdjacentElement(
                                'afterend',
                                fileWarning
                            );
                        }
                    }

                    fileWarning.textContent =
                        'Lampiran bukti wajib diunggah agar indeks menjadi 1.';
                } else if (fileWarning) {
                    fileWarning.remove();
                }
            });

            // Nilai level: contoh sederhana berdasarkan
            // persentase kriteria yang sudah terpenuhi.
            const passedCount = criteria.filter((item, index) =>
                isCriterionPassed(index)
            ).length;

            const total = criteria.length;

            const levelScore = total > 0 ?
                (passedCount / total).toFixed(1) :
                '0.0';

            document.getElementById('levelScore').textContent = levelScore;

            document.getElementById('scoreDescription').textContent =
                total > 0 ?
                passedCount + ' dari ' + total +
                ' kriteria telah sesuai dan memiliki lampiran.' :
                'Belum ada kriteria untuk sub area ini.';
        }

        // ==========================================
        // TAMPILKAN KRITERIA
        // ==========================================
        function renderCriteria() {
            const sub = subAreas[selectedIndex];

            if (!sub) {
                criteriaContainer.innerHTML = `
                <div class="empty-criteria">
                    Data sub area belum tersedia.
                </div>
            `;
                return;
            }

            const criteria = sub.kriteria || [];

            document.getElementById('detailTitle').textContent = sub.nama;

            document.getElementById('breadcrumb').textContent =
                (sub.area || 'Inventory') + ' · ' +
                (selectedIndex + 1) + '.1.1';

            document.getElementById('mainScore').textContent =
                Number(sub.score || 0).toFixed(1);

            document.getElementById('subAreaInput').value = sub.nama;
            document.getElementById('levelInput').value = selectedLevel;

            document.getElementById('criteriaTitle').textContent =
                'Level ' + selectedLevel;

            document.getElementById('criteriaSubtitle').textContent =
                criteria.length + ' kriteria';

            document.querySelectorAll('.subarea-link').forEach((button, i) => {
                button.classList.toggle('active', i === selectedIndex);
            });

            document.querySelectorAll('.level-option').forEach(button => {
                const level = Number(button.dataset.level);
                button.classList.toggle('active', level === selectedLevel);
            });

            if (!criteria.length) {
                criteriaContainer.innerHTML = `
                <div class="empty-criteria">
                    <strong>Data kriteria belum tersedia</strong><br>
                    Tambahkan data kriteria pada data sub area di Laravel
                    agar formulir verifikasi dapat ditampilkan.
                </div>
            `;

                updateCriteriaStates();
                return;
            }

            criteriaContainer.innerHTML = criteria.map((item, i) => {
                const state = getState(i);

                return `
                <section class="criterion">
                    <div class="criterion-top">
                        <span class="number">${i + 1}</span>

                        <div class="criterion-name">
                            ${escapeHtml(item.nama)}
                        </div>

                        <span class="index-badge">
                            Indeks dokumen
                            <strong>0</strong>
                        </span>
                    </div>

                    <div class="verification">
                        <div class="choice">
                            <label>
                                <input
                                    type="radio"
                                    name="criteria[${i}][status]"
                                    value="sesuai"
                                    ${state.choice === 'sesuai' ? 'checked' : ''}>
                                Sesuai
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="criteria[${i}][status]"
                                    value="tidak"
                                    ${state.choice === 'tidak' ? 'checked' : ''}>
                                Tidak sesuai
                            </label>
                        </div>
                    </div>

                    <label class="field-label" for="note-${i}">
                        Catatan verifikator
                    </label>

                    <textarea
                        class="note-input"
                        id="note-${i}"
                        name="criteria[${i}][catatan]"
                        rows="1"
                        placeholder="Tambahkan catatan hasil pemeriksaan">${escapeHtml(state.note)}</textarea>

                    <div class="upload-box">
                        <div style="min-width:0;flex:1">
                            <strong>Lampiran bukti</strong>

                            <p class="file-description">
                                ${state.files.length > 0
                                    ? escapeHtml(state.files.map(file => file.name).join(', '))
                                    : 'Semua jenis file yang diizinkan. Anda dapat memilih beberapa file.'}
                            </p>

                            <input
                                class="file-input"
                                type="file"
                                name="criteria[${i}][lampiran][]"
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx"
                                multiple>
                        </div>
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
            // PILIHAN SESUAI / TIDAK SESUAI
            // ======================================
            criteriaContainer.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    const match = radio.name.match(/criteria\[(\d+)\]/);

                    if (!match) return;

                    const index = Number(match[1]);
                    getState(index).choice = radio.value;

                    // Jika Tidak sesuai, indeks otomatis 0
                    // dan kriteria berikutnya terkunci.
                    updateCriteriaStates();
                });
            });

            // ======================================
            // UPLOAD FILE
            // ======================================
            criteriaContainer.querySelectorAll('input[type="file"]').forEach((input, i) => {
                input.addEventListener('change', () => {
                    const state = getState(i);

                    state.files = Array.from(input.files || []);

                    updateCriteriaStates();
                });
            });

            updateCriteriaStates();
        }

        // Hindari karakter HTML yang tidak aman
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
                selectedLevel = 1;
                renderCriteria();
            });
        });

        // ==========================================
        // PILIH LEVEL
        // ==========================================
        document.querySelectorAll('.level-option').forEach(button => {
            button.addEventListener('click', () => {
                if (button.classList.contains('locked')) return;

                selectedLevel = Number(button.dataset.level);
                renderCriteria();
            });
        });

        // ==========================================
        // PINDAH UNIT
        // ==========================================
        unitSelect.addEventListener('change', () => {
            window.location.href =
                '/admin/unit/' +
                encodeURIComponent(unitSelect.value) +
                '/verifikasi';
        });

        // ==========================================
        // GANTI TEMA
        // ==========================================
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark');

            this.textContent = document.body.classList.contains('dark') ?
                'Gunakan tema terang' :
                'Gunakan tema gelap';
        });

        // ==========================================
        // RESET PILIHAN
        // ==========================================
        document.getElementById('resetButton').addEventListener('click', () => {
            if (!confirm('Reset pilihan pada halaman ini?')) return;

            const prefix = selectedIndex + '-' + selectedLevel + '-';

            Object.keys(savedChoices).forEach(key => {
                if (key.startsWith(prefix)) {
                    delete savedChoices[key];
                }
            });

            renderCriteria();
        });

        // ==========================================
        // SUBMIT FORM
        // ==========================================
        document.getElementById('verificationForm').addEventListener('submit', event => {
            const sub = subAreas[selectedIndex];
            const criteria = sub?.kriteria || [];

            const incomplete = criteria.findIndex((item, index) => {
                const state = getState(index);

                return !isCriterionPassed(index) || !state.choice;
            });

            if (incomplete !== -1) {
                event.preventDefault();

                alert(
                    'Kriteria nomor ' + (incomplete + 1) +
                    ' belum memenuhi syarat. Pastikan memilih Sesuai ' +
                    'dan mengunggah lampiran bukti sebelum menyimpan.'
                );

                return;
            }

            // Form akan dikirim ke route Laravel jika action
            // dan penyimpanan backend sudah dikonfigurasi.
        });

        // Tampilkan halaman pertama
        renderCriteria();
    </script>

</body>

</html>
