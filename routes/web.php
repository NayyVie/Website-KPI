<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifikasiUnitController;


// AUTHENTICATION
Route::get('/', function () {
    return view('Auth.login');
});

// UNIT
Route::get('/dashboardUnit', function () {
    return view('Unit.dashboard');
})->name('dashboardUnit');

// UNIT - LENGKAPI BUKTI
Route::get('/unit/lengkapi-bukti', function () {
    $namaUnit = 'Banjarsari';

    $subAreas = [
        [
            'nama' => 'Catalogue',
            'area' => 'Inventory',
            'score' => 2.2,
            'kriteria' => [
                ['nama' => 'Data katalog terdokumentasi dalam SIT'],
                ['nama' => 'Katalog material memiliki kode dan deskripsi yang seragam'],
                ['nama' => 'Pemutakhiran katalog dilakukan secara berkala'],
                ['nama' => 'Penanggung jawab pengelolaan katalog telah ditetapkan'],
                ['nama' => 'Kualitas data katalog dievaluasi dan ditindaklanjuti'],
            ]
        ],
        [
            'nama' => 'Mengelola Permintaan Penyediaan Barang dan Jasa',
            'area' => 'Inventory',
            'score' => 3.1,
            'kriteria' => [
                ['nama' => 'Prosedur pengelolaan permintaan telah disahkan'],
                ['nama' => 'Permintaan diverifikasi sebelum diproses'],
                ['nama' => 'Dokumen permintaan terdokumentasi dengan baik'],
            ]
        ],
        [
            'nama' => 'Setting Minimum Stock',
            'area' => 'Inventory',
            'score' => 3.8,
            'kriteria' => [
                ['nama' => 'Minimum stock ditetapkan untuk setiap item'],
                ['nama' => 'Minimum stock ditinjau secara berkala'],
            ]
        ],
        [
            'nama' => 'Persediaan dan Perputaran Material',
            'area' => 'Inventory',
            'score' => 2.9,
            'kriteria' => [
                ['nama' => 'Perputaran material dipantau secara berkala'],
                ['nama' => 'Laporan perputaran material tersedia'],
            ]
        ],
        [
            'nama' => 'Mengevaluasi dan Membina Kinerja Penyedia',
            'area' => 'Procurement',
            'score' => 3.7,
            'kriteria' => [
                ['nama' => 'Evaluasi kinerja penyedia dilakukan berkala'],
                ['nama' => 'Hasil evaluasi ditindaklanjuti'],
            ]
        ],
        [
            'nama' => 'Monitoring, Pengendalian dan Purchase Effectiveness',
            'area' => 'Procurement',
            'score' => 2.6,
            'kriteria' => [
                ['nama' => 'Monitoring purchase effectiveness dilakukan'],
                ['nama' => 'Laporan pengendalian tersedia'],
            ]
        ],
        [
            'nama' => 'Implementasi Sistem Kontrak Payung',
            'area' => 'Procurement',
            'score' => 1.8,
            'kriteria' => [
                ['nama' => 'Sistem kontrak payung telah diimplementasikan'],
                ['nama' => 'Dokumen kontrak payung tersedia'],
            ]
        ],
        [
            'nama' => 'Pengelolaan Penerimaan dan Pengeluaran Barang',
            'area' => 'Gudang',
            'score' => 4.1,
            'kriteria' => [
                ['nama' => 'Prosedur penerimaan barang terdokumentasi'],
                ['nama' => 'Prosedur pengeluaran barang terdokumentasi'],
            ]
        ],
        [
            'nama' => 'Administrasi & Pengelolaan Barang',
            'area' => 'Gudang',
            'score' => 3.4,
            'kriteria' => [
                ['nama' => 'Administrasi barang tertata dengan baik'],
                ['nama' => 'Laporan administrasi tersedia berkala'],
            ]
        ],
        [
            'nama' => 'Stock Opname',
            'area' => 'Gudang',
            'score' => 3.9,
            'kriteria' => [
                ['nama' => 'Stock opname dilakukan secara berkala'],
                ['nama' => 'Hasil stock opname terdokumentasi'],
            ]
        ],
    ];

    return view('Unit.lengkapiBukti', compact('namaUnit', 'subAreas'));
})->name('unit.lengkapi');

// BARU: UNIT - RIWAYAT LAPORAN KPI
Route::get('/unit/riwayat-kpi', function () {
    $namaUnit = 'Banjarsari';
    
    // Data dummy (bisa diganti dengan query database nanti)
    $dokumen = [
        (object) [
            'nama_file' => 'Laporan KPI SCM Juni 2026.xlsx',
            'ukuran' => '2.4 MB',
            'tanggal_unggah' => '28 Jun 2026, 14.32',
            'periode' => 'Juni 2026',
            'tipe' => 'excel'
        ],
        (object) [
            'nama_file' => 'Laporan KPI SCM Mei 2026.xlsx',
            'ukuran' => '2.1 MB',
            'tanggal_unggah' => '30 Mei 2026, 09.18',
            'periode' => 'Mei 2026',
            'tipe' => 'excel'
        ],
        (object) [
            'nama_file' => 'Realisasi KPI Logistik April 2026.pdf',
            'ukuran' => '1.8 MB',
            'tanggal_unggah' => '29 Apr 2026, 16.45',
            'periode' => 'April 2026',
            'tipe' => 'pdf'
        ],
        (object) [
            'nama_file' => 'Laporan KPI SCM Maret 2026.xlsx',
            'ukuran' => '2.2 MB',
            'tanggal_unggah' => '27 Mar 2026, 11.06',
            'periode' => 'Maret 2026',
            'tipe' => 'excel'
        ],
    ];

    return view('Unit.riwayatKpi', compact('namaUnit', 'dokumen'));
})->name('unit.riwayat-kpi');


// ADMIN
Route::get('/dashboardAdmin', function () {
    return view('Admin.dashboardAdmin');
})->name('dashboardAdmin');


// ADMIN - VERIFIKASI UNIT (MATURITY LEVEL)
Route::get('/admin/unit/{unit}/verifikasi', [
    VerifikasiUnitController::class,
    'show'
])->name('admin.unit.verifikasi');

// Menyimpan hasil verifikasi (dipanggil tombol "Simpan verifikasi" via fetch)
Route::post('/admin/unit/{unit}/verifikasi', [
    VerifikasiUnitController::class,
    'simpan'
])->name('admin.unit.verifikasi.simpan');