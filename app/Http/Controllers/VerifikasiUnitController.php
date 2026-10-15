<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiUnitController extends Controller
{
    public function show(string $unit)
    {
        $daftarUnit = [
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

        abort_unless(isset($daftarUnit[$unit]), 404);

        $namaUnit = $daftarUnit[$unit];

        $subAreas = [
            [
                'area' => 'Inventory',
                'nama' => 'Catalogue',
                'score' => 2.2,
                'level' => 1,
                'kriteria' => [
                    [
                        'nama' => 'Data katalog terdokumentasi dalam SIT',
                        'catatan' => 'Data terisi lengkap dan dapat ditelusuri.',
                        'indeks' => 0,
                    ],
                    [
                        'nama' => 'Dokumen katalog diperbarui secara berkala',
                        'catatan' => '',
                        'indeks' => 0,
                    ],
                    [
                        'nama' => 'Informasi material dapat ditelusuri',
                        'catatan' => '',
                        'indeks' => 0,
                    ],
                    [
                        'nama' => 'Data katalog sesuai kondisi aktual',
                        'catatan' => '',
                        'indeks' => 0,
                    ],
                    [
                        'nama' => 'Evaluasi katalog dilakukan secara berkala',
                        'catatan' => '',
                        'indeks' => 0,
                    ],
                ],
            ],
            [
                'area' => 'Inventory',
                'nama' => 'Mengelola Permintaan Penyediaan Barang dan Jasa',
                'score' => 3.1,
                'level' => 2,
                'kriteria' => [],
            ],
            [
                'area' => 'Inventory',
                'nama' => 'Setting Minimum Stock',
                'score' => 3.8,
                'level' => 3,
                'kriteria' => [],
            ],
            [
                'area' => 'Inventory',
                'nama' => 'Persediaan dan Perputaran Material',
                'score' => 2.9,
                'level' => 2,
                'kriteria' => [],
            ],
            [
                'area' => 'Procurement',
                'nama' => 'Mengevaluasi dan Membina Kinerja Penyedia',
                'score' => 3.7,
                'level' => 3,
                'kriteria' => [],
            ],
            [
                'area' => 'Procurement',
                'nama' => 'Monitoring, Pengendalian dan Purchase Effectiveness',
                'score' => 2.6,
                'level' => 2,
                'kriteria' => [],
            ],
            [
                'area' => 'Procurement',
                'nama' => 'Implementasi Sistem Kontrak Payung',
                'score' => 1.8,
                'level' => 1,
                'kriteria' => [],
            ],
            [
                'area' => 'Gudang',
                'nama' => 'Pengelolaan Penerimaan dan Pengeluaran Barang',
                'score' => 4.1,
                'level' => 4,
                'kriteria' => [],
            ],
            [
                'area' => 'Gudang',
                'nama' => 'Administrasi & Pengelolaan Barang',
                'score' => 3.4,
                'level' => 3,
                'kriteria' => [],
            ],
            [
                'area' => 'Gudang',
                'nama' => 'Stock Opname',
                'score' => 3.6,
                'level' => 3,
                'kriteria' => [],
            ],
        ];

        // Data contoh tampilan. Nantinya bisa diganti dengan data database.
        $subAreas = array_map(function ($item) use ($namaUnit) {
            $item['score'] = round(
                min(5, max(0.8, $item['score'])),
                1
            );

            return $item;
        }, $subAreas);

        return view('Admin.verifikasiUnit', [
            'namaUnit' => $namaUnit,
            'daftarUnit' => $daftarUnit,
            'subAreas' => $subAreas,
        ]);
    }
}
