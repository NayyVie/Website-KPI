<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Unit - Banjarsari</title>

    <style>
        /* ============================================
           RESET & GLOBAL
           ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #1e293b;
            padding: 30px 40px;
            line-height: 1.6;
        }

        /* ============================================
           HEADER UNIT
           ============================================ */
        .header-unit {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-left h1 {
            margin: 10px 0 5px;
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
        }

        .header-left p {
            color: #64748b;
            margin: 0;
            font-size: 14px;
        }

        .badge-portal {
            background-color: #ccfbf1;
            color: #0d9488;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .semester {
            font-size: 12px;
            color: #94a3b8;
            margin-left: 10px;
        }

        .header-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        /* ============================================
           KARTU RINGKASAN
           ============================================ */
        .summary-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: linear-gradient(135deg, #0f2a4a, #1e4d7a);
            color: white;
            padding: 30px;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
        }

        .summary-card p {
            margin: 0;
            font-size: 13px;
            opacity: 0.85;
            font-weight: 500;
        }

        .summary-card h2 {
            margin: 10px 0 5px;
            font-size: 38px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .summary-card small {
            font-size: 11px;
            opacity: 0.7;
        }

        /* ============================================
           TABEL SUB AREA
           ============================================ */
        .table-section {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h3 {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .table-header p {
            color: #64748b;
            font-size: 13px;
            margin: 0;
        }

        .badge-total {
            background: #f1f5f9;
            color: #475569;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .table-unit {
            width: 100%;
            border-collapse: collapse;
        }

        .table-unit thead th {
            text-align: left;
            font-size: 11px;
            color: #94a3b8;
            padding: 12px 10px;
            border-bottom: 1px solid #e2e8f0;
            letter-spacing: 0.5px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .table-unit tbody td {
            padding: 18px 10px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            vertical-align: middle;
        }

        .table-unit tbody tr:hover {
            background-color: #f8fafc;
        }

        .table-unit tbody td strong {
            display: block;
            color: #0f172a;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .table-unit tbody td small {
            color: #94a3b8;
            font-size: 12px;
        }

        /* ============================================
           BADGE STATUS
           ============================================ */
        .badge-warning {
            background: #fef3c7;
            color: #d97706;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        .badge-success {
            background: #dcfce7;
            color: #16a34a;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            white-space: nowrap;
        }

        /* ============================================
           TOMBOL AKSI
           ============================================ */
        .btn-action {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 8px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: #334155;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-action:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 992px) {
            .summary-section {
                grid-template-columns: 1fr;
            }

            .header-unit {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .table-section {
                overflow-x: auto;
                padding: 20px;
            }

            .table-unit {
                min-width: 600px;
            }

            .summary-card h2 {
                font-size: 30px;
            }
        }
    </style>
</head>
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
            <!-- Tombol diubah menjadi tag <a> -->
            <a href="{{ route('unit.riwayat-kpi') }}" class="btn-outline">
                Riwayat KPI
            </a>
            
            <a href="{{ url('/') }}" class="btn-outline">
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
</html>