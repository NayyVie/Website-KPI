<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerifikasiUnitController extends Controller
{
    private const DAFTAR_UNIT = [
        'banjarsari' => 'Banjarsari',
        'asahan' => 'Asahan',
        'belitung' => 'Belitung',
        'bangka' => 'Bangka',
        'tembilahan' => 'Tembilahan',
        'ketapang' => 'Ketapang',
        'amurang' => 'Amurang',
        'tidore' => 'Tidore',
        'surabaya' => 'Surabaya',
        'jakarta' => 'Jakarta',
        'bandung' => 'Bandung',
    ];

    public function show(string $unit)
    {
        abort_unless(isset(self::DAFTAR_UNIT[$unit]), 404);

        $namaUnit = self::DAFTAR_UNIT[$unit];
        $levels = array_values(config('maturity.levels'));
        $kriteriaConfig = config('maturity.kriteria', []);
        $hasilTersimpan = $this->hasilTersimpan($unit);

        // Skor dasar dipakai hanya jika sub area belum punya data kriteria.
        $daftarSubArea = [
            ['area' => 'Inventory',   'nama' => 'Catalogue', 'score' => 2.2],
            ['area' => 'Inventory',   'nama' => 'Mengelola Permintaan Penyediaan Barang dan Jasa', 'score' => 3.1],
            ['area' => 'Inventory',   'nama' => 'Setting Minimum Stock', 'score' => 3.8],
            ['area' => 'Inventory',   'nama' => 'Persediaan dan Perputaran Material', 'score' => 2.9],
            ['area' => 'Procurement', 'nama' => 'Mengevaluasi dan Membina Kinerja Penyedia', 'score' => 3.7],
            ['area' => 'Procurement', 'nama' => 'Monitoring, Pengendalian dan Purchase Effectiveness', 'score' => 2.6],
            ['area' => 'Procurement', 'nama' => 'Implementasi Sistem Kontrak Payung', 'score' => 1.8],
            ['area' => 'Gudang',      'nama' => 'Pengelolaan Penerimaan dan Pengeluaran Barang', 'score' => 4.1],
            ['area' => 'Gudang',      'nama' => 'Administrasi & Pengelolaan Barang', 'score' => 3.4],
            ['area' => 'Gudang',      'nama' => 'Stock Opname', 'score' => 3.9],
        ];

        $subAreas = array_map(function (array $sub) use ($levels, $kriteriaConfig, $hasilTersimpan) {
            $perLevel = $kriteriaConfig[$sub['nama']] ?? [];

            // kriteria: list per level -> [ [ {nama}, ... ], [ ... ], ... ]
            $sub['kriteria'] = [];
            foreach (array_keys($levels) as $i) {
                $level = $i + 1;
                $sub['kriteria'][] = array_map(
                    fn (string $nama) => ['nama' => $nama],
                    $perLevel[$level] ?? []
                );
            }

            // tersimpan: list per level -> [ [1,0,0,...], ... ] (1 = sudah Sesuai + ada bukti)
            $sub['tersimpan'] = $hasilTersimpan[$sub['nama']] ?? [];
            $sub['score'] = round(min(5, max(0, $sub['score'])), 1);

            return $sub;
        }, $daftarSubArea);

        return view('Admin.verifikasiUnit', [
            'namaUnit' => $namaUnit,
            'daftarUnit' => self::DAFTAR_UNIT,
            'levels' => $levels,
            'subAreas' => $subAreas,
        ]);
    }

    public function simpan(Request $request, string $unit): JsonResponse
    {
        abort_unless(isset(self::DAFTAR_UNIT[$unit]), 404);

        $validated = $request->validate([
            'sub_area' => ['required', 'string', 'max:255'],
            'hasil' => ['nullable', 'array'],
            'hasil.*.*.status' => ['nullable', 'in:sesuai,tidak'],
            'hasil.*.*.catatan' => ['nullable', 'string', 'max:2000'],
            'hasil.*.*.lampiran' => ['nullable', 'array'],
            'hasil.*.*.lampiran.*' => ['file', 'max:10240', 'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx'],
        ]);

        // TODO: simpan ke database / storage.
        // $validated['hasil'][level][indexKriteria] = ['status', 'catatan', 'lampiran' => [UploadedFile...]]

        return response()->json([
            'message' => 'Verifikasi sub area "' . $validated['sub_area'] . '" berhasil disimpan.',
        ]);
    }

    /**
     * DATA CONTOH. Ganti dengan query database nanti.
     * Format: [nama sub area => [ [level 1 per kriteria], [level 2], ... ]]
     * 1 = kriteria sudah Sesuai dan memiliki bukti.
     * Contoh ini menghasilkan 1.0 + 1.0 + 0.2 = 2.2 (sesuai screenshot).
     */
    private function hasilTersimpan(string $unit): array
    {
        return [
            'Catalogue' => [
                [1, 1, 1, 1, 1],
                [1, 1, 1, 1, 1],
                [1, 0, 0, 0, 0],
            ],
        ];
    }
}
