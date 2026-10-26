<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Unit | ML SCM App</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f6f9;
            color: #173451;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }

        button,
        input,
        textarea {
            font-family: inherit;
        }

        .page {
            width: calc(100% - 48px);
            max-width: 1500px;
            margin: 20px auto 36px;
        }

        .page-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            gap: 16px;
        }

        .back-link {
            color: #0755a0;
            text-decoration: none;
            font-size: 12px;
        }

        .unit-select {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #647b92;
        }

        .unit-select select {
            min-width: 145px;
            padding: 10px 12px;
            border: 1px solid #d5dfeb;
            border-radius: 8px;
            background: white;
            color: #173451;
        }

        /* Sidebar dan konten utama */
        .layout {
            display: grid;
            grid-template-columns: 250px minmax(0, 1fr);
            align-items: start;
            gap: 16px;
            width: 100%;
        }

        .sidebar,
        .main-card {
            border: 1px solid #dce4ed;
            border-radius: 10px;
            background: #fff;
        }

        .sidebar {
            padding: 16px 10px;
            min-width: 0;
        }

        .main-card {
            width: 100%;
            min-width: 0;
            padding: 20px;
            overflow: hidden;
        }

        .sidebar-label {
            margin: 0 5px 3px;
            color: #75869a;
            font-size: 10px;
        }

        .sidebar h3 {
            margin: 0 5px 14px;
            font-size: 13px;
        }

        .side-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 7px;
            margin-bottom: 5px;
            padding: 10px 8px;
            border: 1px solid transparent;
            border-radius: 8px;
            color: #17416b;
            font-size: 10px;
            line-height: 1.5;
        }

        .side-item.active {
            border-color: #1d4774;
            box-shadow: inset 3px 0 #173d63;
            background: #f8fafc;
            font-weight: 600;
        }

        .side-score {
            flex-shrink: 0;
            padding: 4px 7px;
            border-radius: 12px;
            background: #fff0dc;
            color: #a65c05;
            font-size: 9px;
        }

        /* .main-card {
            min-width: 0;
            padding: 20px;
        } */

        /* Kurangi ruang kosong pada bagian judul */
        .overview {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 190px;
            align-items: stretch;
            gap: 22px;
            margin-bottom: 18px;
        }

        .eyebrow {
            color: #657b93;
            font-size: 10px;
        }

        .overview h1 {
            margin: 6px 0;
            color: #153b61;
            font-size: 22px;
        }

        /* .description {
            max-width: 490px;
            margin: 0;
            color: #607994;
            font-size: 11px;
            line-height: 1.7;
        } */

        .description {
            max-width: 650px;
            line-height: 1.65;
        }

        .score-card {
            width: 100%;
            min-width: 0;
            flex-shrink: 0;
            padding: 14px;
            border-left: 2px solid #00a9bd;
            border-radius: 0 7px 7px 0;
            background: #f7f9fb;
        }

        .score-card span {
            color: #657b93;
            font-size: 10px;
        }

        .score-card strong {
            display: block;
            margin: 3px 0;
            font-size: 27px;
        }

        .score-card p {
            margin: 0;
            color: #657b93;
            font-size: 9px;
            line-height: 1.5;
        }

        /* Level memenuhi lebar konten */
        .level-list {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 8px;
            width: 100%;
            margin: 18px 0;
        }

        .level-item {
            min-height: 50px;
            min-width: 0;
            padding: 9px 5px;
            border: 1px solid #d8e1eb;
            border-radius: 7px;
            text-align: center;
            color: #173451;
            font-size: 10px;
        }

        .level-item strong,
        .level-item span {
            display: block;
        }

        .level-item span {
            margin-top: 3px;
            color: #008b9c;
            font-size: 9px;
        }

        .level-item.active {
            background: #173d63;
            color: #fff;
            border-color: #173d63;
        }

        .level-item.active span {
            color: #fff;
        }

        .level-item.locked {
            border-style: dashed;
            background: #f8fafc;
            color: #8796a6;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px 0 10px;
        }

        .section-heading small {
            color: #71859a;
            font-size: 10px;
        }

        .section-heading h2 {
            margin: 3px 0 0;
            font-size: 14px;
        }

        .section-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .criteria-count {
            color: #71859a;
            font-size: 10px;
            white-space: nowrap;
        }

        .level-score {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 6px 9px;
            border: 1px solid #d8e2ec;
            border-radius: 8px;
            background: #fff;
        }

        .level-score span {
            color: #657b93;
            font-size: 10px;
            white-space: nowrap;
        }

        .level-score strong {
            display: flex;
            min-width: 33px;
            height: 28px;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: #e1f4f3;
            color: #008c91;
            font-size: 12px;
            font-weight: 600;
        }

        .criteria-card {
            margin-bottom: 10px;
            /* padding: 14px 16px; */
            padding-top: 12px;
            padding-bottom: 12px;
            border: 1px solid #d8e2ec;
            border-radius: 9px;
            background: white;
            width: 100%;

        }

        .criteria-card.locked {
            background: #fbfcfd;
        }

        .criteria-header {
            display: grid;
            grid-template-columns: 27px minmax(0px, 1fr) 108px 168px;
            align-items: center;
            gap: 10px;
        }

        .number {
            display: flex;
            width: 24px;
            height: 24px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e1f4e8;
            color: #17834a;
            font-size: 10px;
        }

        .number.error {
            background: #fde7e5;
            color: #d93025;
        }

        .criteria-title {
            padding-top: 4px;
            font-size: 12px;
            line-height: 1.6;
            font-weight: 500;
        }

        .locked .criteria-title {
            color: #778797;
        }

        .index-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            min-height: 35px;
            padding: 6px 8px;
            border: 1px solid #d9e2ec;
            border-radius: 7px;
            color: #657b93;
            font-size: 9px;
        }

        .index-value {
            display: flex;
            width: 21px;
            height: 21px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e1f4e8;
            color: #17834a;
            font-weight: 600;
        }

        .index-value.zero {
            background: #fde7e5;
            color: #d93025;
        }

        .actions {
            display: flex;
            overflow: hidden;
            min-height: 35px;
            border: 1px solid #d9e2ec;
            border-radius: 7px;
        }

        .actions button {
            flex: 1;
            padding: 6px;
            border: 0;
            border-right: 1px solid #d9e2ec;
            background: white;
            color: #173451;
            font-size: 10px;
            cursor: pointer;
        }

        .actions button:last-child {
            border-right: 0;
        }

        .actions .yes.active {
            background: #e1f4e8;
            color: #17834a;
        }

        .actions .no.active {
            background: #fde7e5;
            color: #c62828;
        }

        .actions button:disabled {
            background: #f8fafc;
            color: #a6b1bd;
            cursor: not-allowed;
        }

        .locked-message {
            margin: 11px 0 12px 31px;
            padding: 10px;
            border-left: 2px solid #d93025;
            background: #fde9e7;
            color: #bd2823;
            font-size: 10px;
            line-height: 1.6;
        }

        .field,
        .evidence,
        .locked-message {
            margin-left: 37px;
        }

        /* .field {
            margin: 12px 0 10px 31px;
        } */

        .field {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .field label {
            display: block;
            margin-bottom: 6px;
            color: #71859a;
            font-size: 10px;
        }

        .field textarea {
            display: block;
            width: 100%;
            min-height: 36px;
            padding: 8px 10px;
            resize: vertical;
            border: 1px solid #d8e2ec;
            border-radius: 7px;
            outline: none;
            color: #173451;
            background: #fff;
            font-size: 10px;
        }

        .field textarea:focus {
            border-color: #69b8d7;
        }

        .field textarea:disabled {
            background: #f7f9fb;
            color: #9aa8b8;
        }

        .save-note {
            margin-top: 5px;
            padding: 6px 10px;
            border: 1px solid #d5e1eb;
            border-radius: 6px;
            background: white;
            color: #087e9d;
            font-size: 10px;
            cursor: pointer;
        }

        .evidence {
            margin-left: 31px;
            /* padding: 11px 10px 9px; */
            padding: 10px;
            border: 1px dashed #d6e0eb;
            border-radius: 8px;
            background: #f8fafc;
        }

        .evidence h4 {
            margin: 0 0 5px;
            font-size: 10px;
            font-weight: 600;
        }

        .evidence-description {
            margin: 0;
            color: #7489a0;
            font-size: 9px;
            line-height: 1.5;
        }

        .evidence-content {
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid #dce4ed;
        }

        .empty-file {
            padding: 7px 0;
            color: #8797a8;
            font-size: 10px;
        }

        .file-row {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 8px;
            border: 1px solid #dce4ed;
            border-radius: 7px;
            background: white;
        }

        .file-icon {
            display: flex;
            width: 27px;
            height: 25px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 1px solid #91d9e4;
            border-radius: 4px;
            background: #f0fcfd;
            color: #128da3;
            font-size: 8px;
        }

        .file-info {
            flex: 1;
            min-width: 0;
        }

        .file-info strong,
        .file-info span {
            display: block;
            overflow-wrap: anywhere;
        }

        .file-info strong {
            margin-bottom: 4px;
            font-size: 10px;
            font-weight: 500;
        }

        .file-info span {
            color: #7b8da1;
            font-size: 9px;
        }

        .file-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .file-links a {
            color: #087e9d;
            font-size: 9px;
            text-decoration: none;
            white-space: nowrap;
        }

        .file-links .open {
            padding: 7px 12px;
            border: 1px solid #9aafc7;
            border-radius: 6px;
            background: #f8fafc;
            color: #173451;
        }

        .locked .evidence {
            opacity: .7;
        }

        .file-links a.disabled {
            pointer-events: none;
            opacity: .45;
        }

        .flash {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 7px;
            background: #e1f4e8;
            color: #17834a;
        }

        .flash.error {
            background: #fde9e7;
            color: #bd2823;
        }

        .save-note:disabled {
            opacity: .45;
            cursor: not-allowed;
        }



        /* NEW */
        /* Laptop ukuran sedang */
        @media (min-width: 901px) and (max-width: 1200px) {
            .page {
                width: calc(100% - 32px);
            }

            .layout {
                grid-template-columns: 220px minmax(0, 1fr);
                gap: 12px;
            }

            .main-card {
                padding: 16px;
            }

            .overview {
                grid-template-columns: minmax(0, 1fr) 165px;
                gap: 12px;
            }

            .criteria-header {
                grid-template-columns: 25px minmax(0, 1fr) 100px 150px;
                gap: 7px;
            }

            .field,
            .evidence,
            .locked-message {
                margin-left: 32px;
            }
        }

        /* Tablet dan HP */
        @media (max-width: 900px) {
            .page {
                width: calc(100% - 24px);
            }

            .layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .sidebar {
                display: none;
            }

            .main-card {
                padding: 16px;
            }
        }

        @media (max-width: 560px) {
            .overview {
                grid-template-columns: minmax(0, 1fr);
            }

            .criteria-header {
                grid-template-columns: 25px minmax(0, 1fr);
                align-items: start;
            }

            .index-box,
            .actions {
                grid-column: 2;
            }

            .field,
            .evidence,
            .locked-message {
                margin-left: 0;
            }

            .level-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .criteria-header {
                grid-template-columns: 27px minmax(0, 1fr) 108px;
            }

            .actions {
                grid-column: 2 / -1;
            }
        }

        @media (max-width: 600px) {
            .page {
                width: calc(100% - 20px);
                margin-top: 14px;
            }

            .main-card {
                padding: 12px;
            }

            .overview {
                flex-direction: column;
            }

            .score-card {
                width: 100%;
            }

            .level-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .criteria-header {
                grid-template-columns: 25px minmax(0, 1fr);
            }

            .index-box {
                grid-column: 2;
                width: 130px;
            }

            .actions {
                grid-column: 2;
            }

            .field,
            .evidence,
            .locked-message {
                margin-left: 0;
            }

            .file-row {
                flex-wrap: wrap;
            }

            .file-info {
                flex-basis: calc(100% - 45px);
            }

            .file-links {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 480px) {
            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .section-meta {
                width: 100%;
                justify-content: flex-end;
            }
        }

        /* MERAPIKAN HALAMAN NEW */

        /* ========================================
   PERAPIAN HALAMAN VERIFIKASI UNIT
======================================== */

        /* Area halaman */
        .page {
            width: calc(100% - 40px);
            max-width: 1500px;
            margin: 20px auto 35px;
        }

        /* Konten utama */
        .layout {
            grid-template-columns: 250px minmax(0, 1fr);
            gap: 16px;
            align-items: start;
        }

        .main-card {
            min-width: 0;
            padding: 20px;
            border-radius: 10px;
        }

        /* Header Catalogue */
        .overview {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 190px;
            gap: 22px;
            align-items: stretch;
            margin-bottom: 18px;
        }

        .overview h1 {
            margin: 5px 0 7px;
            font-size: 22px;
            line-height: 1.35;
        }

        .description {
            max-width: 650px;
            line-height: 1.65;
        }

        .score-card {
            width: 100%;
            padding: 14px;
            border-radius: 0 8px 8px 0;
        }

        /* Kotak level */
        .level-list {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 8px;
            margin: 18px 0 20px;
        }

        .level-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 52px;
            padding: 8px 5px;
            line-height: 1.45;
        }

        /* Header Level 1 dan Fire Fighting */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 0 0 10px;
        }

        .section-heading h2 {
            margin: 3px 0 0;
            font-size: 15px;
            line-height: 1.4;
        }

        .section-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .criteria-count {
            white-space: nowrap;
            font-size: 10px;
            color: #657b93;
        }

        .level-score {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 6px 9px;
            border: 1px solid #d8e2ec;
            border-radius: 8px;
            white-space: nowrap;
        }

        .level-score strong {
            min-width: 33px;
            height: 28px;
            border-radius: 6px;
            font-size: 12px;
        }

        /* Kartu kriteria */
        .criteria-card {
            margin: 0 0 10px;
            padding: 13px 14px;
            border: 1px solid #d8e2ec;
            border-radius: 9px;
            background: #fff;
        }

        .criteria-card.locked {
            background: #fcfdfe;
        }

        /* Nomor, judul, indeks, dan tombol sejajar */
        .criteria-header {
            display: grid;
            grid-template-columns: 27px minmax(0, 1fr) 108px 168px;
            align-items: center;
            gap: 10px;
        }

        .number {
            width: 24px;
            height: 24px;
        }

        .criteria-title {
            padding: 0;
            font-size: 11px;
            line-height: 1.55;
            font-weight: 500;
        }

        .index-box {
            min-height: 35px;
            padding: 5px 8px;
        }

        .actions {
            min-height: 35px;
        }

        .actions button {
            padding: 7px 5px;
            font-size: 10px;
        }

        /* Catatan verifikator */
        .field {
            margin: 10px 0 10px 37px;
        }

        .field label {
            margin-bottom: 6px;
            font-size: 10px;
        }

        .field textarea {
            display: block;
            width: 100%;
            min-height: 36px;
            padding: 9px 10px;
            border-radius: 7px;
            font-size: 10px;
            line-height: 1.5;
        }

        /* Tombol simpan catatan */
        .save-note {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 30px;
            margin-top: 6px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 10px;
        }

        .save-note:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        /* Pesan ketika kriteria terkunci */
        .locked-message {
            margin: 10px 0 10px 37px;
            padding: 9px 11px;
            line-height: 1.55;
            border-left-width: 2px;
            font-size: 10px;
        }

        /* Lampiran bukti */
        .evidence {
            margin-left: 37px;
            padding: 11px;
            border-radius: 8px;
        }

        .evidence h4 {
            margin: 0 0 5px;
            font-size: 10px;
        }

        .evidence-description {
            line-height: 1.55;
        }

        .evidence-content {
            margin-top: 9px;
            padding-top: 8px;
        }

        .file-row {
            min-height: 48px;
            padding: 8px;
            gap: 9px;
        }

        .file-icon {
            width: 27px;
            height: 25px;
        }

        .file-info strong {
            font-size: 10px;
            line-height: 1.45;
        }

        .file-info span {
            font-size: 9px;
        }

        .file-links {
            gap: 12px;
        }

        .file-links .open {
            padding: 7px 12px;
        }

        /* Sidebar agar konsisten */
        .sidebar {
            padding: 15px 10px;
            border-radius: 10px;
        }

        .side-item {
            min-height: 43px;
            margin-bottom: 4px;
            padding: 9px 8px;
        }

        /* Laptop */
        @media (min-width: 901px) {
            .sidebar {
                position: sticky;
                top: 15px;
            }
        }

        /* Laptop kecil dan tablet */
        @media (max-width: 1100px) {
            .layout {
                grid-template-columns: 215px minmax(0, 1fr);
                gap: 12px;
            }

            .main-card {
                padding: 15px;
            }

            .overview {
                grid-template-columns: minmax(0, 1fr) 160px;
                gap: 12px;
            }

            .criteria-header {
                grid-template-columns: 25px minmax(0, 1fr) 100px 150px;
                gap: 7px;
            }

            .field,
            .evidence,
            .locked-message {
                margin-left: 32px;
            }
        }

        /* Tablet dan HP */
        @media (max-width: 900px) {
            .page {
                width: calc(100% - 24px);
            }

            .layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .sidebar {
                display: none;
            }

            .main-card {
                padding: 14px;
            }

            .criteria-header {
                grid-template-columns: 25px minmax(0, 1fr);
                align-items: start;
            }

            .index-box,
            .actions {
                grid-column: 2;
            }
        }

        @media (max-width: 560px) {
            .overview {
                grid-template-columns: minmax(0, 1fr);
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .section-meta {
                width: 100%;
                justify-content: flex-end;
            }

            .level-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .field,
            .evidence,
            .locked-message {
                margin-left: 0;
            }

            .file-row {
                flex-wrap: wrap;
            }

            .file-info {
                flex-basis: calc(100% - 45px);
            }

            .file-links {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        <div class="page-top">
            <a href="{{ url()->previous() }}" class="back-link">
                ← Kembali ke dashboard admin
            </a>

            <div class="unit-select">
                <label for="unit">Unit</label>
                <select id="unit" onchange="changeUnit(this.value)">
                    <option value="Banjarsari">Banjarsari</option>
                    <option value="Unit Lain">Unit Lain</option>
                </select>
            </div>
        </div>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="flash error">{{ session('error') }}</div>
        @endif

        <div class="layout">

            <aside class="sidebar">
                <p class="sidebar-label">Sub area</p>
                <h3>Banjarsari</h3>

                <div class="side-item active">
                    <span>Catalogue</span>
                    <span class="side-score">2.2</span>
                </div>
                <div class="side-item">
                    <span>Mengelola Permintaan Penyediaan Barang dan Jasa</span>
                    <span class="side-score">3.1</span>
                </div>
                <div class="side-item">
                    <span>Setting Minimum Stock</span>
                    <span class="side-score">3.8</span>
                </div>
                <div class="side-item">
                    <span>Persediaan dan Perputaran Material</span>
                    <span class="side-score">2.9</span>
                </div>
                <div class="side-item">
                    <span>Mengevaluasi dan Membina Kinerja Penyedia</span>
                    <span class="side-score">3.7</span>
                </div>
                <div class="side-item">
                    <span>Monitoring, Pengendalian dan Purchase Effectiveness</span>
                    <span class="side-score">2.6</span>
                </div>
                <div class="side-item">
                    <span>Implementasi Sistem Kontrak Payung</span>
                    <span class="side-score">1.8</span>
                </div>
                <div class="side-item">
                    <span>Pengelolaan Penerimaan dan Pengeluaran Barang</span>
                    <span class="side-score">4.1</span>
                </div>
                <div class="side-item">
                    <span>Administrasi & Pengelolaan Barang</span>
                    <span class="side-score">3.4</span>
                </div>
                <div class="side-item">
                    <span>Stock Opname</span>
                    <span class="side-score">3.9</span>
                </div>
            </aside>

            <main class="main-card">

                <div class="overview">
                    <div>
                        <span class="eyebrow">Inventory · 4.2.3.1</span>
                        <h1>Catalogue</h1>
                        <p class="description">
                            Memastikan proses, dokumen, dan bukti pelaksanaan sub area
                            memenuhi pedoman maturity level SCM.
                        </p>
                    </div>

                    <div class="score-card">
                        <span>Score ML sub area</span>
                        <strong>2.2</strong>
                        <p>Level berikutnya terbuka hanya jika semua kriteria level sebelumnya sesuai.</p>
                    </div>
                </div>

                <div class="level-list">
                    <div class="level-item active">
                        <strong>≤1</strong>
                        <span>Nilai 1.0</span>
                    </div>
                    <div class="level-item">
                        <strong>1&lt;x≤2</strong>
                        <span>Nilai 1.0</span>
                    </div>
                    <div class="level-item">
                        <strong>2&lt;x≤3</strong>
                        <span>Nilai 0.2</span>
                    </div>
                    <div class="level-item locked">
                        <strong>3&lt;x≤4</strong>
                        <span>Nilai 0.0 · Terkunci</span>
                    </div>
                    <div class="level-item locked">
                        <strong>4&lt;x≤5</strong>
                        <span>Nilai 0.0 · Terkunci</span>
                    </div>
                </div>

                <div class="section-heading">
                    <div>
                        <small>Level 1</small>
                        <h2>Fire Fighting</h2>
                    </div>

                    <div class="section-meta">
                        <span class="criteria-count">5 kriteria</span>

                        <div class="level-score">
                            <span>Nilai level</span>
                            <strong>0.0</strong>
                        </div>
                    </div>
                </div>

                @php
                    /*
                     * DATA CONTOH UNTUK PREVIEW.
                     *
                     * Dalam penggunaan database, kirimkan variabel $kriteria
                     * dari controller dan hapus data contoh ini.
                     *
                     * status: null | sesuai | tidak_sesuai
                     * file: null jika unit belum upload.
                     */
                    $kriteria = $kriteria ?? [
                        [
                            'id' => 1,
                            'nama' => 'Data katalog terdokumentasi dalam SIT',
                            'catatan' => 'Data terisi lengkap dan dapat ditelusuri.',
                            'file' => 'contoh/Bukti_Kriteria_01.txt',
                            'nama_file' => 'Bukti_Kriteria_01.txt',
                            'ukuran_file' => '204 KB',
                            'tanggal_upload' => '21 Jun 2026, 09.11',
                            'status' => null,
                        ],
                        [
                            'id' => 2,
                            'nama' => 'Katalog material memiliki kode dan deskripsi yang seragam',
                            'catatan' => '',
                            'file' => null,
                            'nama_file' => '',
                            'ukuran_file' => '',
                            'tanggal_upload' => '',
                            'status' => null,
                        ],
                        [
                            'id' => 3,
                            'nama' => 'Data katalog diperbarui secara berkala',
                            'catatan' => '',
                            'file' => null,
                            'nama_file' => '',
                            'ukuran_file' => '',
                            'tanggal_upload' => '',
                            'status' => null,
                        ],
                    ];
                @endphp

                @php
                    $sebelumnyaSesuai = true;
                @endphp

                @foreach ($kriteria as $i => $item)
                    @php
                        $nomor = $i + 1;
                        $fileAda = !empty($item['file']);
                        $terkunci = !$sebelumnyaSesuai;
                        $indeks = !$terkunci && $fileAda ? 1 : 0;
                        $bisaVerifikasi = !$terkunci && $fileAda;
                        $status = $item['status'] ?? null;
                    @endphp

                    <section class="criteria-card {{ $terkunci ? 'locked' : '' }}" data-status="{{ $status ?? '' }}">

                        <div class="criteria-header">

                            <div class="number {{ $status === 'tidak_sesuai' ? 'error' : '' }}">
                                {{ $nomor }}
                            </div>

                            <div class="criteria-title">
                                {{ $item['nama'] }}
                            </div>

                            <div class="index-box">
                                <span>Indeks dokumen</span>
                                <strong class="index-value {{ $indeks === 0 ? 'zero' : '' }}">
                                    {{ $indeks }}
                                </strong>
                            </div>

                            <div class="actions">
                                @foreach (['sesuai' => 'Sesuai', 'tidak_sesuai' => 'Tidak sesuai'] as $nilai => $label)
                                    <button type="button"
                                        class="{{ $nilai === 'sesuai' ? 'yes' : 'no' }} {{ $status === $nilai ? 'active' : '' }}"
                                        {{ !$bisaVerifikasi ? 'disabled' : '' }}
                                        onclick="submitVerification({{ $nomor }}, '{{ $nilai }}')">
                                        {{ $label }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        @if ($terkunci)
                            <div class="locked-message">
                                Indeks otomatis 0 karena kriteria sebelumnya belum terpenuhi.
                                Selesaikan dan setujui kriteria sebelumnya untuk melanjutkan.
                            </div>
                        @endif

                        <div class="field">
                            <label for="note-{{ $nomor }}">Catatan verifikator</label>

                            <textarea id="note-{{ $nomor }}"
                                placeholder="{{ $terkunci ? 'Kriteria sebelumnya belum terpenuhi' : 'Tambahkan catatan hasil pemeriksaan' }}"
                                {{ !$bisaVerifikasi ? 'disabled' : '' }}>{{ $item['catatan'] ?? '' }}</textarea>

                            @if ($bisaVerifikasi)
                                <button type="button" class="save-note" onclick="saveNote({{ $nomor }})">
                                    Simpan catatan
                                </button>
                            @endif
                        </div>

                        <div class="evidence">
                            <h4>Lampiran bukti</h4>
                            <p class="evidence-description">
                                Buka file untuk diperiksa, lalu tentukan hasil verifikasinya.
                            </p>

                            <div class="evidence-content">
                                @if ($fileAda)
                                    <div class="file-row">
                                        <div class="file-icon">
                                            {{ strtoupper(pathinfo($item['nama_file'] ?? $item['file'], PATHINFO_EXTENSION) ?: 'FILE') }}
                                        </div>

                                        <div class="file-info">
                                            <strong>
                                                {{ $item['nama_file'] ?? basename($item['file']) }}
                                            </strong>
                                            <span>
                                                {{ $item['ukuran_file'] ?? '' }}
                                                @if (!empty($item['tanggal_upload']))
                                                    · Diunggah {{ $item['tanggal_upload'] }}
                                                @endif
                                            </span>
                                        </div>

                                        <div class="file-links">
                                            <a class="open {{ $terkunci ? 'disabled' : '' }}"
                                                href="{{ $terkunci ? '#' : (str_starts_with($item['file'], 'contoh/') ? '#' : \Illuminate\Support\Facades\Storage::url($item['file'])) }}"
                                                target="_blank" rel="noopener noreferrer">
                                                Open
                                            </a>

                                            <a class="{{ $terkunci ? 'disabled' : '' }}"
                                                href="{{ $terkunci ? '#' : (str_starts_with($item['file'], 'contoh/') ? '#' : \Illuminate\Support\Facades\Storage::url($item['file'])) }}"
                                                download>
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="empty-file">
                                        Belum ada lampiran yang diunggah oleh unit.
                                    </div>
                                @endif
                            </div>
                        </div>

                    </section>

                    @php
                        $sebelumnyaSesuai = $sebelumnyaSesuai && $fileAda && $status === 'sesuai';
                    @endphp
                @endforeach

            </main>
        </div>
    </div>

    <script>
        /*
         * Mode preview: perubahan langsung terlihat di browser.
         * Untuk menyimpan secara permanen, hubungkan fungsi ini ke controller.
         */
        // const demoStatus = {};

        // function submitVerification(nomor, status) {
        //     demoStatus[nomor] = status;

        // Preview perubahan status.
        // Mode database akan menggunakan form POST ke Laravel.
        //     alert(
        //         'Hasil verifikasi kriteria ' + nomor + ': ' +
        //         (status === 'sesuai' ? 'Sesuai' : 'Tidak sesuai') +
        //         '. Sambungkan ke controller agar tersimpan permanen.'
        //     );
        // }

        // function saveNote(nomor) {
        //     const catatan = document.getElementById('note-' + nomor).value;

        //     alert(
        //         'Catatan kriteria ' + nomor + ':\n' + catatan +
        //         '\n\nSambungkan ke controller untuk menyimpan catatan.'
        //     );
        // }

        // function changeUnit(unit) {
        //     const url = new URL(window.location.href);
        //     url.searchParams.set('unit', unit);
        //     window.location.href = url.toString();
        // }



        function submitVerification(nomor, status) {
            const cards = [...document.querySelectorAll('.criteria-card')];
            const card = cards[nomor - 1];

            if (!card || card.classList.contains('locked')) return;
            if (!card.querySelector('.file-row')) return;

            card.dataset.status = status;
            updateCriteria();
        }

        function updateCriteria() {
            const cards = [...document.querySelectorAll('.criteria-card')];
            let sebelumnyaSesuai = true;

            cards.forEach((card) => {
                const fileAda = !!card.querySelector('.file-row');
                const terkunci = !sebelumnyaSesuai;
                const status = card.dataset.status || '';
                const indeks = !terkunci && fileAda ? 1 : 0;

                card.classList.toggle('locked', terkunci);

                const indexValue = card.querySelector('.index-value');
                indexValue.textContent = indeks;
                indexValue.classList.toggle('zero', indeks === 0);

                const number = card.querySelector('.number');
                number.classList.toggle('error', status === 'tidak_sesuai');

                const buttons = card.querySelectorAll('.actions button');

                buttons.forEach((button) => {
                    const isYes = button.classList.contains('yes');
                    const buttonStatus = isYes ? 'sesuai' : 'tidak_sesuai';

                    button.disabled = terkunci || !fileAda;
                    button.classList.toggle('active', status === buttonStatus);
                });

                const textarea = card.querySelector('textarea');

                if (textarea) {
                    textarea.disabled = terkunci || !fileAda;
                }

                const saveButton = card.querySelector('.save-note');

                if (saveButton) {
                    saveButton.disabled = terkunci || !fileAda;
                }

                const evidence = card.querySelector('.evidence');
                let message = card.querySelector('.locked-message');

                if (terkunci && !message) {
                    message = document.createElement('div');
                    message.className = 'locked-message';
                    message.textContent =
                        'Indeks otomatis 0 karena kriteria sebelumnya belum terpenuhi. ' +
                        'Selesaikan dan setujui kriteria sebelumnya untuk melanjutkan.';

                    card.querySelector('.criteria-header').after(message);
                } else if (!terkunci && message) {
                    message.remove();
                }

                card.querySelectorAll('.file-links a').forEach((link) => {
                    link.classList.toggle('disabled', terkunci);

                    if (terkunci) {
                        link.setAttribute('aria-disabled', 'true');
                        link.setAttribute('tabindex', '-1');
                    } else {
                        link.removeAttribute('aria-disabled');
                        link.removeAttribute('tabindex');
                    }
                });

                sebelumnyaSesuai =
                    sebelumnyaSesuai &&
                    fileAda &&
                    status === 'sesuai';
            });
        }
    </script>
</body>

</html>
