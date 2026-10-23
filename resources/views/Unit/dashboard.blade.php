<body>

    <!-- HEADER -->
    <div class="header-unit">
        <div class="header-left">
            <span class="badge-portal">Portal Unit</span>
            <span class="semester">Semester 1 2026 · Pedoman 2022</span>
            <h1>Unit Banjarsari</h1>
            <p>Lengkapi dokumen bukti dan pantau capaian self-assessment unit Anda.</p>
        </div>
        <div class="header-right">
            <!-- PERBAIKAN: Tombol Riwayat KPI diubah menjadi tag <a> -->
            <a href="{{ route('unit.riwayat-kpi') }}" class="btn-outline" style="text-decoration: none; display: inline-block;">
                Riwayat KPI
            </a>
            
            <!-- (Opsional) Tombol Keluar juga diubah jadi link -->
            <a href="{{ url('/') }}" class="btn-outline" style="text-decoration: none; display: inline-block;">
                Keluar
            </a>
        </div>
    </div>

    <!-- KARTU RINGKASAN -->
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

    <!-- TABEL SUB AREA -->
    @include('Unit.tabel_sub_area')

</body>