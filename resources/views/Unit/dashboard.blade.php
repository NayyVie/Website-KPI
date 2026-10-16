<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Unit - Banjarsari</title>
    
    <!-- PANGGIL CSS DENGAN VITE (Tailwind + Custom Unit Style) -->
    @vite(['resources/css/app.css'])
</head>
<body>

    <!-- HEADER (Gambar 1 bagian atas) -->
    <div class="header-unit">
        <div class="header-left">
            <span class="badge-portal">Portal Unit</span>
            <span class="semester">Semester 1 2026 · Pedoman 2022</span>
            <h1>Unit Banjarsari</h1>
            <p>Lengkapi dokumen bukti dan pantau capaian self-assessment unit Anda.</p>
        </div>
        <div class="header-right">
            <button class="btn-outline">Riwayat KPI</button>
            <button class="btn-outline">Keluar</button>
            <button class="btn-outline">Gunakan tema gelap</button>
        </div>
    </div>

    <!-- KARTU RINGKASAN (Gambar 1 bagian tengah) -->
    <div class="summary-section">
        <div class="summary-card">
            <p>Nilai ML sementara</p>
            <h2>3.8</h2>
            <small>Dari bukti saat ini</small>
        </div>
        <div class="summary-card">
            <p>Nilai konkin</p>
            <h2>3.72</h2>
            <small>Target tercapai</small>
        </div>
        <div class="summary-card">
            <p>KPI keterlaksanaan</p>
            <h2>91%</h2>
            <small>9 sub area lengkap</small>
        </div>
    </div>

    <!-- TABEL SUB AREA (Gambar 2) -->
    <!-- Kita panggil file terpisah agar rapi -->
    @include('Unit.tabel_sub_area')

</body>
</html>