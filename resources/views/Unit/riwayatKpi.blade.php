<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan KPI - {{ $namaUnit }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; } </style>
</head>
<body class="min-h-screen p-8 text-gray-800">

    <div class="max-w-6xl mx-auto mb-6 flex justify-between items-center">
        <a href="{{ url('/dashboardUnit') }}" class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1 font-medium">
            ← Kembali ke portal unit
        </a>
        <a href="{{ url('/') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50">
            Keluar
        </a>
    </div>

    <div class="max-w-6xl mx-auto mb-8">
        <div class="flex items-center gap-2 mb-3">
            <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-md border border-blue-200">Portal Unit</span>
            <span class="text-sm text-gray-500">{{ $namaUnit }}</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Riwayat Laporan KPI</h1>
        <p class="text-gray-500 text-sm">Lihat kembali dokumen KPI yang pernah diunggah beserta status pemeriksaannya.</p>
    </div>

    <div class="max-w-6xl mx-auto bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        
        <!-- BAGIAN FILTER -->
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Dokumen yang pernah diunggah</h2>
                <p class="text-xs text-gray-500 mt-1">{{ $dokumen->count() }} dokumen ditemukan</p>
            </div>
            
            <form action="{{ route('unit.riwayat-kpi') }}" method="GET" class="flex gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500 font-medium">Bulan</label>
                    <!-- onchange="this.form.submit()" akan otomatis memfilter saat diganti -->
                    <select name="bulan" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-32">
                        <option value="Semua" {{ $filterBulan == 'Semua' ? 'selected' : '' }}>Semua</option>
                        <option value="Januari" {{ $filterBulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                        <option value="Februari" {{ $filterBulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                        <option value="Maret" {{ $filterBulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                        <option value="April" {{ $filterBulan == 'April' ? 'selected' : '' }}>April</option>
                        <option value="Mei" {{ $filterBulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                        <option value="Juni" {{ $filterBulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500 font-medium">Tahun</label>
                    <select name="tahun" onchange="this.form.submit()" class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-28">
                        <option value="2026" {{ $filterTahun == '2026' ? 'selected' : '' }}>2026</option>
                        <option value="2025" {{ $filterTahun == '2025' ? 'selected' : '' }}>2025</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- BAGIAN TABEL -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4 font-medium">Nama dokumen</th>
                        <th class="px-6 py-4 font-medium">Tanggal unggah</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($dokumen as $doc)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-10 h-10 {{ $doc->tipe == 'excel' ? 'bg-green-50 text-green-600 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }} rounded flex items-center justify-center font-bold text-[10px] border uppercase tracking-wider">
                                {{ $doc->tipe }}
                            </div>
                            <div>
                                <p class="font-medium text-sm text-gray-900">{{ $doc->nama_file }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $doc->ukuran }} • {{ $doc->periode }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $doc->tanggal_unggah }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($doc->status == 'Disetujui')
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-md">Disetujui</span>
                            @elseif($doc->status == 'Revisi')
                                <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-md">Revisi</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2.5 py-1 rounded-md">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <!-- TOMBOL DETAIL SUDAH DIARAHKAN KE ROUTE YANG BENAR -->
                                <a href="{{ route('unit.riwayat-kpi.detail', $doc->id) }}" class="border border-gray-300 text-gray-700 px-3 py-1.5 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors">
                                    Lihat detail
                                </a>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-xs font-medium transition-colors">
                                    Unduh
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            Tidak ada dokumen pada periode ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>