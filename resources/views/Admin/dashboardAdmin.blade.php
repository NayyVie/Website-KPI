<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | PLN NPS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #009fc1;
            --cyan: #14c3d3;
            --navy: #153e53;
            --text: #355365;
            --muted: #8498a5;
            --border: #dce8ed;
            --surface: rgba(255, 255, 255, 0.94);
            --page: #f3f7fa;
            --soft: #f7fafc;
            --green: #087e58;
            --green-bg: #e3f5ec;
            --shadow: 0 5px 20px rgba(31, 79, 101, 0.045);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--page);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background .25s, color .25s;
        }

        /* BAYANGAN ROBOT DI POJOK KIRI BAWAH */
        .robot-watermark {
            position: fixed;
            z-index: 0;
            left: 0;
            bottom: 0;

            width: 290px;
            height: 255px;

            background-image: url('assets/images/backgroundKPI.png');
            background-repeat: no-repeat;
            background-size: 560px auto;
            background-position: 100% 100%;

            opacity: .075;
            filter: saturate(.8);
            pointer-events: none;
        }

        /* KONTEN UTAMA */
        .dashboard {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px 40px 50px;
        }

        /* HEADER */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 26px;
        }

        .admin-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .admin-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: fit-content;
            padding: 5px 11px;
            border-radius: 20px;
            color: #0089a8;
            background: #e3f8fb;
            border: 1px solid #cdeff4;
            font-size: 10px;
            font-weight: 600;
        }

        .admin-label::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--cyan);
        }

        .semester {
            font-size: 11px;
            color: var(--muted);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .btn {
            min-height: 39px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 0 15px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: var(--surface);
            color: var(--navy);
            font-family: inherit;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            transition: .2s ease;
            text-decoration: none;
        }

        .btn:hover {
            border-color: #9edce7;
            background: #f0fbfd;
            transform: translateY(-1px);
        }

        .btn-primary {
            color: #fff;
            border: none;
            background: linear-gradient(105deg,
                    #008fb5,
                    #13bfd0);
            box-shadow: 0 5px 14px rgba(0, 159, 193, .12);
        }

        .btn-primary:hover {
            color: #fff;
            background: linear-gradient(105deg,
                    #007f9f,
                    #08b2c5);
        }

        /* JUDUL HALAMAN */
        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            color: var(--navy);
            font-size: clamp(22px, 2.2vw, 30px);
            font-weight: 700;
            letter-spacing: -.65px;
            line-height: 1.4;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 7px;
            line-height: 1.7;
        }

        /* KARTU RINGKASAN */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 20px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            min-height: 125px;
            padding: 22px 20px;

            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);

            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 25px rgba(31, 79, 101, .075);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            right: -30px;
            top: -43px;
            width: 105px;
            height: 105px;
            border-radius: 50%;
            background: rgba(0, 181, 205, .055);
            pointer-events: none;
        }

        .stat-label {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .stat-value {
            color: var(--navy);
            font-size: 28px;
            line-height: 1.25;
            font-weight: 700;
            letter-spacing: -.5px;
            position: relative;
            z-index: 1;
        }

        .stat-description {
            margin-top: 7px;
            color: var(--muted);
            font-size: 10px;
            position: relative;
            z-index: 1;
        }

        .stat-accent {
            color: #008fab;
        }

        /* PANEL TABEL */
        .table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 13px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 20px 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .table-title {
            color: var(--navy);
            font-size: 15px;
            font-weight: 600;
        }

        .table-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .search-input {
            width: 180px;
            height: 39px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 12px;
            outline: none;
            background: var(--surface);
            color: var(--text);
            font-family: inherit;
            font-size: 11px;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 159, 193, .09);
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
            padding: 0 16px 10px;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #f4f8fa;
        }

        th {
            padding: 12px 10px;
            color: #68808e;
            font-size: 10px;
            font-weight: 500;
            white-space: nowrap;
        }

        td {
            padding: 15px 10px;
            color: var(--text);
            font-size: 11px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody tr {
            transition: background .15s;
        }

        tbody tr:hover {
            background: rgba(0, 175, 200, .035);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .unit-name {
            color: var(--navy);
            font-weight: 600;
        }

        .score-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            padding: 5px 9px;
            border-radius: 20px;
            color: var(--green);
            background: var(--green-bg);
            font-size: 10px;
            font-weight: 600;
        }

        .difference {
            color: var(--green);
            font-weight: 600;
        }

        .difference.negative {
            color: #d97735;
        }

        .row-actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-small {
            min-height: 35px;
            padding: 0 12px;
            font-size: 10px;
            border-radius: 7px;
        }

        .table-footer {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 10px;
        }

        .pagination {
            display: flex;
            gap: 6px;
        }

        .page-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--text);
            background: var(--surface);
            cursor: pointer;
            font-family: inherit;
            font-size: 10px;
        }

        .page-btn.active {
            color: white;
            border-color: var(--primary);
            background: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 35px 15px;
            color: var(--muted);
            font-size: 12px;
        }

        /* MODAL VERIFIKASI */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 20;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(12, 39, 54, .38);
            backdrop-filter: blur(4px);
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            width: 100%;
            max-width: 450px;
            padding: 25px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(12, 39, 54, .15);
        }

        .modal h2 {
            color: var(--navy);
            font-size: 18px;
        }

        .modal p {
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .modal label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            color: var(--text);
            font-size: 11px;
            font-weight: 500;
        }

        .modal select,
        .modal textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
            color: var(--text);
            font: inherit;
            font-size: 11px;
            outline: none;
        }

        .modal textarea {
            min-height: 85px;
            resize: vertical;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            margin-top: 22px;
        }

        /* TEMA GELAP */
        body.dark {
            --navy: #e1f2f8;
            --text: #c2d6df;
            --muted: #91a9b7;
            --border: #2b4657;
            --surface: rgba(24, 43, 57, .96);
            --page: #112331;
            --soft: #1b3343;
            --green: #75d8af;
            --green-bg: #204b40;
            --shadow: 0 5px 20px rgba(0, 0, 0, .10);
        }

        body.dark .admin-label {
            color: #8de6f0;
            background: #1c414e;
            border-color: #2b5b68;
        }

        body.dark .stat-card::after {
            background: rgba(0, 190, 210, .08);
        }

        body.dark thead {
            background: #1b3343;
        }

        body.dark .btn:hover {
            background: #244657;
        }

        body.dark .btn-primary:hover {
            background: linear-gradient(105deg, #007f9f, #08b2c5);
        }

        body.dark .search-input:focus,
        body.dark .modal select:focus,
        body.dark .modal textarea:focus {
            border-color: var(--cyan);
        }

        body.dark .robot-watermark {
            opacity: .045;
        }


        /* SCORE ML PER SUB AREA */
        .score-section {
            margin-top: 22px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 13px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .score-section-header {
            padding: 20px 16px 17px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
        }

        .score-section-title {
            color: var(--navy);
            font-size: 15px;
            font-weight: 600;
        }

        .score-section-description {
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        .score-legend {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--muted);
            font-size: 10px;
            white-space: nowrap;
        }

        .legend-color {
            width: 10px;
            height: 10px;
            border-radius: 3px;
        }

        .legend-high {
            background: #dff3e9;
        }

        .legend-medium {
            background: #fff0d9;
        }

        .legend-low {
            background: #fde5e5;
        }

        /* Scroll horizontal jika kolom unit banyak */
        .score-table-scroll {
            width: 100%;
            overflow-x: auto;
            overflow-y: auto;
            max-height: 570px;
            padding: 0 16px 14px;
            scrollbar-width: thin;
            scrollbar-color: #b8d8e1 transparent;
        }

        .score-table {
            width: max-content;
            min-width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .score-table th,
        .score-table td {
            border-bottom: 1px solid var(--border);
            padding: 5px;
            font-size: 10px;
        }

        .score-table thead th {
            height: 90px;
            background: var(--soft);
            text-align: center;
            vertical-align: middle;
            color: var(--text);
            font-weight: 500;
        }

        .score-table .area-column {
            width: 90px;
            min-width: 90px;
            text-align: left;
            padding-left: 10px;
        }

        .score-table .subarea-column {
            width: 250px;
            min-width: 250px;
            text-align: left;
            padding-left: 10px;
        }

        .score-table .unit-column {
            width: 73px;
            min-width: 73px;
            padding: 0;
            vertical-align: bottom;
        }

        .score-table .unit-column span {
            display: flex;
            height: 85px;
            align-items: center;
            justify-content: center;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            margin: auto;
            padding: 7px 0;
            white-space: nowrap;
        }

        .score-table tbody td {
            height: 41px;
            text-align: center;
        }

        .score-table tbody .area-cell,
        .score-table tbody .subarea-cell {
            text-align: left;
            padding: 9px 10px;
            line-height: 1.6;
            white-space: normal;
        }

        .score-table tbody .area-cell {
            color: var(--navy);
            font-weight: 500;
        }

        .score-table tbody .subarea-cell {
            color: var(--text);
        }

        .score-cell {
            width: 100%;
            min-width: 63px;
            min-height: 30px;
            border: 1px solid transparent;
            border-radius: 6px;
            font-family: inherit;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: transform .15s, border-color .15s;
        }

        .score-cell:hover {
            transform: scale(1.04);
            border-color: var(--primary);
        }

        .score-cell:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        .score-high {
            background: #e1f3e9;
            color: #087e58;
        }

        .score-medium {
            background: #fff0db;
            color: #a76514;
        }

        .score-low {
            background: #fce6e6;
            color: #c44545;
        }

        .score-empty {
            background: var(--soft);
            color: var(--muted);
        }

        .score-detail {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 18px;
        }

        .score-detail-item {
            padding: 12px;
            background: var(--soft);
            border: 1px solid var(--border);
            border-radius: 9px;
        }

        .score-detail-label {
            color: var(--muted);
            font-size: 10px;
        }

        .score-detail-value {
            margin-top: 5px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 600;
        }

        .score-detail-note {
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            background: var(--soft);
            color: var(--text);
            font-size: 11px;
            line-height: 1.7;
        }

        @media (max-width: 700px) {
            .score-section-header {
                flex-direction: column;
            }

            .score-legend {
                justify-content: flex-start;
            }

            .score-table-scroll {
                padding: 0 10px 12px;
                max-height: 500px;
            }

            .score-table .subarea-column {
                width: 210px;
                min-width: 210px;
            }

            .score-table .area-column {
                width: 85px;
                min-width: 85px;
            }

            .score-table .unit-column {
                width: 68px;
                min-width: 68px;
            }

            .score-detail {
                grid-template-columns: 1fr;
            }
        }

        body.dark .legend-high,
        body.dark .score-high {
            background: #204b40;
            color: #9ae6c3;
        }

        body.dark .legend-medium,
        body.dark .score-medium {
            background: #59452b;
            color: #ffcf8a;
        }

        body.dark .legend-low,
        body.dark .score-low {
            background: #542f36;
            color: #ffb4bd;
        }


        /* TABLET */
        @media (max-width: 900px) {
            .dashboard {
                padding: 25px 22px 40px;
            }

            .stats-grid {
                gap: 12px;
            }

            .stat-card {
                padding: 18px 15px;
            }

            .stat-value {
                font-size: 25px;
            }

            .table-header {
                align-items: flex-start;
            }

            .table-header,
            .table-actions {
                flex-wrap: wrap;
            }
        }

        /* MOBILE */
        @media (max-width: 600px) {
            .dashboard {
                padding: 20px 14px 30px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 23px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions .btn {
                flex: 1;
                padding: 0 10px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .page-heading p {
                font-size: 11px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .stat-card {
                min-height: 105px;
                padding: 17px;
            }

            .stat-label {
                margin-bottom: 7px;
            }

            .stat-value {
                font-size: 25px;
            }

            .table-header {
                padding: 17px 15px;
            }

            .table-actions {
                width: 100%;
            }

            .search-input {
                width: 100%;
                flex: 1;
            }

            .table-scroll {
                padding: 0 10px 8px;
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .robot-watermark {
                width: 210px;
                height: 190px;
                background-size: 420px auto;
                opacity: .05;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- Bayangan ilustrasi robot dari background login -->
    <div class="robot-watermark" aria-hidden="true"></div>

    <main class="dashboard">

        <!-- HEADER ADMIN -->
        <header class="topbar">
            <div class="admin-info">
                <span class="admin-label">Admin Pusat</span>

                <span class="semester">
                    Semester 1 2026 · Pedoman 2022
                </span>
            </div>

            <div class="header-actions">
                <button class="btn" type="button" id="logoutButton">
                    Keluar
                </button>

                <button class="btn" type="button" id="themeButton">
                    <span id="themeIcon">◐</span>
                    <span id="themeLabel">Gunakan tema gelap</span>
                </button>
            </div>
        </header>

        <!-- JUDUL -->
        <section class="page-heading">
            <h1>Verifikasi Maturity Level SCM</h1>

            <p>
                Pantau progres, bandingkan capaian, dan verifikasi
                seluruh unit pembangkit.
            </p>
        </section>

        <!-- RINGKASAN -->
        <section class="stats-grid">

            <article class="stat-card">
                <p class="stat-label">
                    Rata-rata nilai konkin (semua unit)
                </p>

                <p class="stat-value">3.4</p>

                <p class="stat-description">
                    Semester berjalan
                </p>
            </article>

            <article class="stat-card">
                <p class="stat-label">
                    Target nilai konkin
                </p>

                <p class="stat-value">3.6</p>

                <p class="stat-description">
                    Target perusahaan
                </p>
            </article>

            <article class="stat-card">
                <p class="stat-label">
                    Unit mencapai target
                </p>

                <p class="stat-value">
                    <span class="stat-accent">4</span> dari 13
                </p>

                <p class="stat-description">
                    31% dari seluruh unit
                </p>
            </article>

        </section>

        <!-- REKAP UNIT -->
        <section class="table-card">

            <div class="table-header">
                <div>
                    <h2 class="table-title">Rekap per unit</h2>

                    <p class="table-subtitle">
                        Ringkasan hasil verifikasi seluruh unit pembangkit
                    </p>
                </div>

                <div class="table-actions">
                    <input class="search-input" type="search" id="searchUnit" placeholder="Cari nama unit..."
                        aria-label="Cari nama unit">

                    <button class="btn" type="button" id="exportAllButton">
                        Ekspor semua unit
                        <span>⌄</span>
                    </button>
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>ML</th>
                            <th>KPI</th>
                            <th>Konkin</th>
                            <th>Selisih target</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>

                    <tbody id="unitTableBody">

                        <tr data-unit="Ampana">
                            <td class="unit-name">Ampana</td>
                            <td>3.8</td>
                            <td>91</td>
                            <td><span class="score-badge">3.7</span></td>
                            <td class="difference">+0.12</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Ampana">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Ampana">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr data-unit="Amurang">
                            <td class="unit-name">Amurang</td>
                            <td>3.7</td>
                            <td>88</td>
                            <td><span class="score-badge">3.6</span></td>
                            <td class="difference">+0.01</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Amurang">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Amurang">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr data-unit="Anggrek">
                            <td class="unit-name">Anggrek</td>
                            <td>3.6</td>
                            <td>90</td>
                            <td><span class="score-badge">3.7</span></td>
                            <td class="difference">+0.06</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Anggrek">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Anggrek">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr data-unit="Asahan">
                            <td class="unit-name">Asahan</td>
                            <td>3.8</td>
                            <td>92</td>
                            <td><span class="score-badge">3.7</span></td>
                            <td class="difference">+0.14</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Asahan">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Asahan">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr data-unit="Belawan">
                            <td class="unit-name">Belawan</td>
                            <td>3.5</td>
                            <td>86</td>
                            <td><span class="score-badge">3.4</span></td>
                            <td class="difference negative">-0.20</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Belawan">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Belawan">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr data-unit="Cilacap">
                            <td class="unit-name">Cilacap</td>
                            <td>3.4</td>
                            <td>85</td>
                            <td><span class="score-badge">3.3</span></td>
                            <td class="difference negative">-0.30</td>
                            <td>
                                <div class="row-actions">
                                    <button class="btn btn-small verify-button" data-unit="Cilacap">
                                        Verifikasi
                                    </button>

                                    <button class="btn btn-small export-button" data-unit="Cilacap">
                                        Ekspor ↓
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div class="empty-state" id="emptyState" hidden>
                    Unit yang kamu cari tidak ditemukan.
                </div>
            </div>

            <div class="table-footer">
                <span id="tableCount">
                    Menampilkan 6 unit contoh
                </span>

                <div class="pagination">
                    <button class="page-btn" type="button" aria-label="Halaman sebelumnya">‹</button>
                    <button class="page-btn active" type="button">1</button>
                    <button class="page-btn" type="button">2</button>
                    <button class="page-btn" type="button">3</button>
                    <button class="page-btn" type="button" aria-label="Halaman selanjutnya">›</button>
                </div>
            </div>

        </section>


        <!-- SCORE ML PER SUB AREA -->
        <section class="score-section">

            <div class="score-section-header">
                <div>
                    <h2 class="score-section-title">
                        Score ML per sub area
                    </h2>

                    <p class="score-section-description">
                        Pilih nilai untuk membuka detail verifikasi unit dan sub area
                    </p>
                </div>

                <div class="score-legend">
                    <span class="legend-item">
                        <span class="legend-color legend-high"></span>
                        ≥ 3.6
                    </span>

                    <span class="legend-item">
                        <span class="legend-color legend-medium"></span>
                        2–3.59
                    </span>

                    <span class="legend-item">
                        <span class="legend-color legend-low"></span>
                        &lt; 2
                    </span>
                </div>
            </div>

            <div class="score-table-scroll">
                <table class="score-table">
                    <thead>
                        <tr>
                            <th class="area-column">Area</th>
                            <th class="subarea-column">Sub area</th>

                            <th class="unit-column"><span>Banjar Sari</span></th>
                            <th class="unit-column"><span>Asahan</span></th>
                            <th class="unit-column"><span>Belitung</span></th>
                            <th class="unit-column"><span>Bangka</span></th>
                            <th class="unit-column"><span>Tembilahan</span></th>
                            <th class="unit-column"><span>Ketapang</span></th>
                            <th class="unit-column"><span>Amurang</span></th>
                            <th class="unit-column"><span>Tidore</span></th>
                        </tr>
                    </thead>

                    <tbody id="scoreTableBody">

                        <tr>
                            <td class="area-cell">Inventory</td>
                            <td class="subarea-cell">Catalogue</td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Banjar Sari" data-score="0.8">0.8</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Asahan" data-score="1.1">1.1</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Belitung" data-score="1.4">1.4</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Bangka" data-score="1.7">1.7</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Tembilahan" data-score="2.0">2.0</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Ketapang" data-score="2.3">2.3</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Amurang" data-score="2.6">2.6</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Catalogue"
                                    data-unit="Tidore" data-score="2.9">2.9</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Inventory</td>
                            <td class="subarea-cell">Mengelola Permintaan Penyediaan Barang dan Jasa</td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa"
                                    data-unit="Banjar Sari" data-score="1.5">1.5</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa" data-unit="Asahan"
                                    data-score="1.8">1.8</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa"
                                    data-unit="Belitung" data-score="2.1">2.1</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa" data-unit="Bangka"
                                    data-score="2.4">2.4</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa"
                                    data-unit="Tembilahan" data-score="2.7">2.7</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa"
                                    data-unit="Ketapang" data-score="3.0">3.0</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa" data-unit="Amurang"
                                    data-score="3.3">3.3</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Mengelola Permintaan Penyediaan Barang dan Jasa" data-unit="Tidore"
                                    data-score="3.6">3.6</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Inventory</td>
                            <td class="subarea-cell">Setting Minimum Stock</td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Banjar Sari" data-score="2.2">2.2</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Asahan" data-score="2.5">2.5</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Belitung" data-score="2.8">2.8</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Bangka" data-score="3.1">3.1</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Tembilahan" data-score="3.4">3.4</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Ketapang" data-score="3.7">3.7</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Amurang" data-score="4.0">4.0</button></td>
                            <td><button class="score-cell" data-area="Inventory" data-subarea="Setting Minimum Stock"
                                    data-unit="Tidore" data-score="4.3">4.3</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Inventory</td>
                            <td class="subarea-cell">Persediaan dan Perputaran Material</td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Banjar Sari"
                                    data-score="2.9">2.9</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Asahan"
                                    data-score="3.2">3.2</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Belitung"
                                    data-score="3.5">3.5</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Bangka"
                                    data-score="3.8">3.8</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Tembilahan"
                                    data-score="4.1">4.1</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Ketapang"
                                    data-score="4.4">4.4</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Amurang"
                                    data-score="4.7">4.7</button></td>
                            <td><button class="score-cell" data-area="Inventory"
                                    data-subarea="Persediaan dan Perputaran Material" data-unit="Tidore"
                                    data-score="0.9">0.9</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Procurement</td>
                            <td class="subarea-cell">Mengevaluasi dan Membina Kinerja Penyedia</td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Banjar Sari"
                                    data-score="3.6">3.6</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Asahan"
                                    data-score="3.9">3.9</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Belitung"
                                    data-score="4.2">4.2</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Bangka"
                                    data-score="4.5">4.5</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Tembilahan"
                                    data-score="4.8">4.8</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Ketapang"
                                    data-score="1.0">1.0</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Amurang"
                                    data-score="1.3">1.3</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Mengevaluasi dan Membina Kinerja Penyedia" data-unit="Tidore"
                                    data-score="1.6">1.6</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Procurement</td>
                            <td class="subarea-cell">Monitoring, Pengendalian dan Purchase Effectiveness</td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Banjar Sari" data-score="4.3">4.3</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Asahan" data-score="4.6">4.6</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Belitung" data-score="0.8">0.8</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Bangka" data-score="1.1">1.1</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Tembilahan" data-score="1.4">1.4</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Ketapang" data-score="1.7">1.7</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Amurang" data-score="2.0">2.0</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Monitoring, Pengendalian dan Purchase Effectiveness"
                                    data-unit="Tidore" data-score="2.3">2.3</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Procurement</td>
                            <td class="subarea-cell">Implementasi Sistem Kontrak Payung</td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Banjar Sari"
                                    data-score="0.9">0.9</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Asahan"
                                    data-score="1.2">1.2</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Belitung"
                                    data-score="1.5">1.5</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Bangka"
                                    data-score="1.8">1.8</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Tembilahan"
                                    data-score="2.1">2.1</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Ketapang"
                                    data-score="2.4">2.4</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Amurang"
                                    data-score="2.7">2.7</button></td>
                            <td><button class="score-cell" data-area="Procurement"
                                    data-subarea="Implementasi Sistem Kontrak Payung" data-unit="Tidore"
                                    data-score="3.0">3.0</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Gudang</td>
                            <td class="subarea-cell">Pengelolaan Penerimaan dan Pengeluaran Barang</td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang"
                                    data-unit="Banjar Sari" data-score="1.6">1.6</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Asahan"
                                    data-score="1.9">1.9</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Belitung"
                                    data-score="2.2">2.2</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Bangka"
                                    data-score="2.5">2.5</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang"
                                    data-unit="Tembilahan" data-score="2.8">2.8</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Ketapang"
                                    data-score="3.1">3.1</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Amurang"
                                    data-score="3.4">3.4</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Pengelolaan Penerimaan dan Pengeluaran Barang" data-unit="Tidore"
                                    data-score="3.7">3.7</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Gudang</td>
                            <td class="subarea-cell">Administrasi &amp; Pengelolaan Barang</td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Banjar Sari"
                                    data-score="2.3">2.3</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Asahan"
                                    data-score="2.6">2.6</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Belitung"
                                    data-score="2.9">2.9</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Bangka"
                                    data-score="3.2">3.2</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Tembilahan"
                                    data-score="3.5">3.5</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Ketapang"
                                    data-score="3.8">3.8</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Amurang"
                                    data-score="4.1">4.1</button></td>
                            <td><button class="score-cell" data-area="Gudang"
                                    data-subarea="Administrasi & Pengelolaan Barang" data-unit="Tidore"
                                    data-score="4.4">4.4</button></td>
                        </tr>

                        <tr>
                            <td class="area-cell">Gudang</td>
                            <td class="subarea-cell">Stock Opname</td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Banjar Sari" data-score="3.0">3.0</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Asahan" data-score="3.3">3.3</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Belitung" data-score="3.6">3.6</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Bangka" data-score="3.9">3.9</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Tembilahan" data-score="4.2">4.2</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Ketapang" data-score="4.5">4.5</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Amurang" data-score="4.8">4.8</button></td>
                            <td><button class="score-cell" data-area="Gudang" data-subarea="Stock Opname"
                                    data-unit="Tidore" data-score="1.0">1.0</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>

        <!-- MODAL DETAIL SKOR -->
        <div class="modal-overlay" id="scoreDetailModal">
            <section class="modal" role="dialog" aria-modal="true" aria-labelledby="scoreModalTitle">

                <h2 id="scoreModalTitle">Detail Score ML</h2>

                <p>
                    Informasi nilai maturity level berdasarkan unit dan sub area.
                </p>

                <div class="score-detail">
                    <div class="score-detail-item">
                        <div class="score-detail-label">Unit</div>
                        <div class="score-detail-value" id="detailUnit">-</div>
                    </div>

                    <div class="score-detail-item">
                        <div class="score-detail-label">Area</div>
                        <div class="score-detail-value" id="detailArea">-</div>
                    </div>

                    <div class="score-detail-item">
                        <div class="score-detail-label">Nilai ML</div>
                        <div class="score-detail-value" id="detailScore">-</div>
                    </div>

                    <div class="score-detail-item">
                        <div class="score-detail-label">Kategori</div>
                        <div class="score-detail-value" id="detailCategory">-</div>
                    </div>
                </div>

                <div class="score-detail-note">
                    <strong>Sub area:</strong>
                    <span id="detailSubarea">-</span>
                    <p id="detailDescription"></p>
                </div>

                <div class="modal-actions">
                    <button class="btn" type="button" id="closeScoreModal">
                        Tutup
                    </button>
                </div>
            </section>
        </div>


    </main>

    <!-- MODAL VERIFIKASI -->
    <div class="modal-overlay" id="verifyModal">
        <section class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

            <h2 id="modalTitle">Verifikasi Unit</h2>

            <p id="modalDescription">
                Periksa data unit sebelum menentukan hasil verifikasi.
            </p>

            <form id="verifyForm">
                <label for="verificationStatus">
                    Status verifikasi
                </label>

                <select id="verificationStatus" required>
                    <option value="">Pilih status</option>
                    <option value="Terverifikasi">Terverifikasi</option>
                    <option value="Perlu revisi">Perlu revisi</option>
                </select>

                <label for="verificationNote">
                    Catatan verifikasi
                </label>

                <textarea id="verificationNote" placeholder="Masukkan catatan jika diperlukan..."></textarea>

                <div class="modal-actions">
                    <button class="btn" type="button" id="cancelVerify">
                        Batal
                    </button>

                    <button class="btn btn-primary" type="submit">
                        Simpan verifikasi
                    </button>
                </div>
            </form>
        </section>
    </div>

    <script>
        // TEMA GELAP
        const themeButton = document.getElementById('themeButton');
        const themeLabel = document.getElementById('themeLabel');
        const themeIcon = document.getElementById('themeIcon');

        themeButton.addEventListener('click', function() {
            document.body.classList.toggle('dark');

            const isDark = document.body.classList.contains('dark');

            themeLabel.textContent = isDark ?
                'Gunakan tema terang' :
                'Gunakan tema gelap';

            themeIcon.textContent = isDark ? '☀' : '◐';
        });

        // PENCARIAN UNIT
        const searchInput = document.getElementById('searchUnit');
        const rows = Array.from(
            document.querySelectorAll('#unitTableBody tr')
        );

        const emptyState = document.getElementById('emptyState');
        const tableCount = document.getElementById('tableCount');

        function filterUnits() {
            const query = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            rows.forEach(function(row) {
                const unitName = row.dataset.unit.toLowerCase();
                const matched = unitName.includes(query);

                row.hidden = !matched;

                if (matched) visibleCount++;
            });

            emptyState.hidden = visibleCount !== 0;

            tableCount.textContent =
                'Menampilkan ' + visibleCount + ' dari ' +
                rows.length + ' unit contoh';
        }

        searchInput.addEventListener('input', filterUnits);

        // EKSPOR CSV YANG DAPAT DIBUKA DI EXCEL
        function exportRows(selectedRows, filename) {
            const csvEscape = function(value) {
                return '"' + String(value).replace(/"/g, '""') + '"';
            };

            const data = [
                ['Unit', 'ML', 'KPI', 'Konkin', 'Selisih Target']
            ];

            selectedRows.forEach(function(row) {
                const cells = Array.from(row.querySelectorAll('td'));

                data.push([
                    cells[0].innerText.trim(),
                    cells[1].innerText.trim(),
                    cells[2].innerText.trim(),
                    cells[3].innerText.trim(),
                    cells[4].innerText.trim()
                ]);
            });

            const csv = '\uFEFF' + data.map(function(line) {
                return line.map(csvEscape).join(';');
            }).join('\r\n');

            const blob = new Blob([csv], {
                type: 'text/csv;charset=utf-8;'
            });

            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');

            link.href = url;
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            link.remove();

            URL.revokeObjectURL(url);
        }

        document.getElementById('exportAllButton')
            .addEventListener('click', function() {
                exportRows(rows, 'rekap-maturity-level-scm.csv');
            });

        document.querySelectorAll('.export-button')
            .forEach(function(button) {
                button.addEventListener('click', function() {
                    const unit = this.dataset.unit;

                    const selectedRow = rows.filter(function(row) {
                        return row.dataset.unit === unit;
                    });

                    exportRows(
                        selectedRow,
                        'rekap-' + unit.toLowerCase() + '.csv'
                    );
                });
            });

        // MODAL VERIFIKASI
        const modal = document.getElementById('verifyModal');
        const modalDescription = document.getElementById('modalDescription');
        const verifyForm = document.getElementById('verifyForm');

        let selectedUnit = '';

        document.querySelectorAll('.verify-button')
            .forEach(function(button) {
                button.addEventListener('click', function() {
                    selectedUnit = this.dataset.unit;

                    modalDescription.textContent =
                        'Periksa data unit ' + selectedUnit +
                        ' sebelum menentukan hasil verifikasi.';

                    verifyForm.reset();
                    modal.classList.add('show');

                    document.getElementById('verificationStatus').focus();
                });
            });

        function closeModal() {
            modal.classList.remove('show');
        }

        document.getElementById('cancelVerify')
            .addEventListener('click', closeModal);

        modal.addEventListener('click', function(event) {
            if (event.target === modal) closeModal();
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') closeModal();
        });

        verifyForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const status = document.getElementById(
                'verificationStatus'
            ).value;

            const note = document.getElementById(
                'verificationNote'
            ).value.trim();

            /*
             * Demo antarmuka saja.
             * Belum mengirim data ke server/database.
             */
            alert(
                'Simulasi verifikasi\\n' +
                'Unit: ' + selectedUnit + '\\n' +
                'Status: ' + status +
                (note ? '\\nCatatan: ' + note : '') +
                '\\n\\nData belum disimpan ke database.'
            );

            closeModal();
        });

        // Tombol keluar: hubungkan ke route logout Laravel nantinya.
        document.getElementById('logoutButton')
            .addEventListener('click', function() {
                const confirmed = confirm(
                    'Apakah kamu yakin ingin keluar dari halaman admin?'
                );

                if (confirmed) {
                    alert(
                        'Hubungkan tombol ini ke route logout Laravel.'
                    );
                }
            });
    </script>

    <script>
        /* WARNA SKOR OTOMATIS */
        document.querySelectorAll('.score-cell').forEach(function(button) {
            const score = Number(button.dataset.score);

            button.classList.remove(
                'score-high',
                'score-medium',
                'score-low',
                'score-empty'
            );

            if (score >= 3.6) {
                button.classList.add('score-high');
            } else if (score >= 2 && score < s 3.6) {
                button.classList.add('score-medium');
            } else {
                button.classList.add('score-low');
            }
        });

        /* MODAL DETAIL SCORE ML */
        const scoreModal = document.getElementById('scoreDetailModal');

        document.querySelectorAll('.score-cell').forEach(function(button) {
            button.addEventListener('click', function() {
                const unit = this.dataset.unit;
                const area = this.dataset.area;
                const subarea = this.dataset.subarea;
                const score = Number(this.dataset.score);

                let category = 'Di bawah 2';

                if (score >= 3.6) {
                    category = 'Mencapai nilai 3.6';
                } else if (score >= 2) {
                    category = 'Rentang 2–3.59';
                }

                document.getElementById('detailUnit').textContent = unit;
                document.getElementById('detailArea').textContent = area;
                document.getElementById('detailScore').textContent =
                    score.toFixed(1);

                document.getElementById('detailCategory').textContent = category;
                document.getElementById('detailSubarea').textContent = subarea;

                document.getElementById('detailDescription').textContent =
                    score >= 3.6 ?
                    'Nilai sub area ini telah mencapai batas target visual 3.6.' :
                    'Nilai sub area ini masih di bawah batas target visual 3.6.';

                scoreModal.classList.add('show');
            });
        });

        document.getElementById('closeScoreModal')
            .addEventListener('click', function() {
                scoreModal.classList.remove('show');
            });

        scoreModal.addEventListener('click', function(event) {
            if (event.target === scoreModal) {
                scoreModal.classList.remove('show');
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                scoreModal.classList.remove('show');
            }
        });
    </script>

</body>

</html>
