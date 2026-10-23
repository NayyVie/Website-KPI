<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan KPI - {{ $namaUnit }}</title>
    <!-- Pastikan tailwind sudah terload, jika kamu menggunakan Vite, hapus baris CDN ini -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; } 
    </style>
</head>
<body class="min-h-screen p-8 text-gray-800">

    <!-- Top Navigation -->
    <div class="max-w-6xl mx-auto mb-6 flex justify-between items-center">
        <a href="{{ url('/dashboardUnit') }}" class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke portal unit
        </a>
        <a href="{{ url('/') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors">
            Keluar
        </a>
    </div>

    <!-- Header Title -->
    <div class="max-w-6xl mx-auto mb-8">
        <div class="flex items-center gap-2 mb-3">
            <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-md border border-blue-200">Portal Unit</span>
            <span class="text-sm text-gray-500">{{ $namaUnit }}</span>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Riwayat Laporan KPI</h1>
        <p class="text-gray-500 text-sm">Lihat kembali dokumen KPI yang pernah diunggah beserta status pemeriksaannya.</p>
    </div>

    <!-- Main Card -->
    <div class="max-w-6xl mx-auto bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        
        <!-- Card Header & Filters -->
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Dokumen yang pernah diunggah</h2>
                <p class="text-xs text-gray-500 mt-1">{{ count($dokumen) }} dokumen ditemukan</p>
            </div>
            
            <div class="flex gap-4">
                <!-- Filter Bulan (min-w-32 = 128px) -->
                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500 font-medium">Bulan</label>
                    <select class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-32">
                        <option>Semua</option>
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                    </select>
                </div>
                <!-- Filter Tahun (min-w-28 = 112px) -->
                <div class="flex flex-col gap-1">
                    <label class="text-xs text-gray-500 font-medium">Tahun</label>
                    <select class="border border-gray-300 rounded-md px-3 py-2 text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-28">
                        <option>2026</option>
                        <option>2025</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4 font-medium">Nama dokumen</th>
                        <th class="px-6 py-4 font-medium">Tanggal unggah</th>
                        <th class="px-6 py-4 font-medium">Periode</th>
                        <th class="px-6 py-4 font-medium text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($dokumen as $doc)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <!-- Nama Dokumen -->
                        <td class="px-6 py-4 flex items-center gap-3">
                            <!-- Warna dinamis berdasarkan tipe file -->
                            <div class="w-10 h-10 {{ $doc->tipe == 'excel' ? 'bg-green-50 text-green-600 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }} rounded flex items-center justify-center font-bold text-[10px] border uppercase tracking-wider">
                                {{ $doc->tipe }}
                            </div>
                            <div>
                                <p class="font-medium text-sm text-gray-900">{{ $doc->nama_file }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $doc->ukuran }}</p>
                            </div>
                        </td>
                        <!-- Tanggal -->
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $doc->tanggal_unggah }}
                        </td>
                        <!-- Periode -->
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $doc->periode }}
                        </td>
                        <!-- Tindakan -->
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <button class="border border-gray-300 text-gray-700 px-3 py-1.5 rounded-md text-xs font-medium hover:bg-gray-50 transition-colors">
                                    Lihat detail
                                </button>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-xs font-medium transition-colors">
                                    Unduh
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            Belum ada dokumen yang diunggah.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>