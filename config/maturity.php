<?php

/*
|--------------------------------------------------------------------------
| Konfigurasi Maturity Level SCM
|--------------------------------------------------------------------------
| - 'levels'   : definisi 5 level (nama + label rentang nilai pada tab level)
| - 'kriteria' : daftar kriteria per sub area, per level (key 1..5)
|
| Nilai level  = jumlah kriteria yang "Sesuai + ada lampiran" / total kriteria level.
| Score ML     = penjumlahan nilai semua level (maks. 5).
| Level n+1 hanya terbuka jika SEMUA kriteria level n sudah terpenuhi.
|
| CATATAN: nama Level 4 & 5 di bawah hanya placeholder (tidak ada di screenshot).
| Sesuaikan dengan pedoman maturity level SCM Anda.
*/

return [

    'levels' => [
        1 => ['nama' => 'Fire Fighting', 'range' => '≤1'],
        2 => ['nama' => 'Stabilizing',   'range' => '1<x≤2'],
        3 => ['nama' => 'Preventing',    'range' => '2<x≤3'],
        4 => ['nama' => 'Optimizing',    'range' => '3<x≤4'], // placeholder
        5 => ['nama' => 'Excellence',    'range' => '4<x≤5'], // placeholder
    ],

    // Key = nama sub area (harus sama persis dengan di controller).
    // Sub area yang belum diisi akan menampilkan "Data kriteria belum tersedia".
    'kriteria' => [

        'Catalogue' => [
            1 => [
                'Data katalog terdokumentasi dalam SIT',
                'Katalog material memiliki kode dan deskripsi yang seragam',
                'Klasifikasi material mengikuti standar perusahaan',
                'Temuan anomali data ditindaklanjuti tepat waktu',
                'Laporan kualitas katalog disampaikan kepada manajemen',
            ],
            2 => [
                'Prosedur pengelolaan katalog telah disahkan',
                'Duplikasi item katalog diidentifikasi',
                'Pemutakhiran katalog dilakukan secara berkala',
                'Penanggung jawab pengelolaan katalog telah ditetapkan',
                'Kualitas data katalog dievaluasi dan ditindaklanjuti',
            ],
            3 => [
                'Parameter kualitas katalog dipantau secara berkala',
                'Integrasi katalog dengan perencanaan kebutuhan diterapkan',
                'Permintaan item baru melalui proses verifikasi',
                'Katalog digunakan sebagai referensi permintaan barang',
                'Hasil pembersihan data katalog terdokumentasi',
            ],
            4 => [], // isi kriteria Level 4
            5 => [], // isi kriteria Level 5
        ],

        // Tambahkan sub area lain dengan pola yang sama:
        // 'Setting Minimum Stock' => [1 => ['...'], 2 => ['...'], 3 => [], 4 => [], 5 => []],
    ],
];
