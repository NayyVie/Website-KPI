<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Laporan KPI - {{ $namaUnit }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; } </style>
</head>
<body class="min-h-screen p-8 text-gray-800">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('unit.riwayat-kpi') }}" class="text-blue-600 mb-6 inline-block font-medium hover:underline">&larr; Kembali ke Riwayat KPI</a>
        
        <!-- Kartu Info Dokumen -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $detail->nama_file }}</h1>
                    <p class="text-gray-500 text-sm mt-2">Periode: <span class="font-medium text-gray-800">{{ $detail->periode }}</span> • Diunggah: {{ $detail->tanggal_unggah }}</p>
                </div>
                <span class="bg-red-100 text-red-700 px-4 py-1.5 rounded-lg text-sm font-bold shadow-sm">{{ $detail->status }}</span>
            </div>

            @if($detail->status == 'Revisi')
            <div class="mt-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800 text-sm flex gap-3 items-start">
                <svg class="w-5 h-5 mt-0.5 shrink-0" ...>fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <div>
                    <strong class="block mb-1">Catatan dari Admin:</strong>
                    {{ $detail->catatan_admin }}
                </div>
            </div>
            @endif
        </div>

        <!-- Kartu Rincian Skor -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-5 border-b border-gray-200 bg-gray-50">
                <h2 class="font-bold text-gray-800 text-lg">Rincian Penilaian Sub Area</h2>
            </div>
            <table class="w-full text-left border-collapse">
                <thead class="border-b border-gray-200 text-sm text-gray-500 bg-white">
                    <tr>
                        <th class="px-6 py-4 font-medium">Sub Area</th>
                        <th class="px-6 py-4 font-medium w-24">Skor</th>
                        <th class="px-6 py-4 font-medium">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($detail->rincian_skor as $skor)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $skor['sub_area'] }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $skor['skor'] }}</td>
                        <td class="px-6 py-4">
                            @if($skor['keterangan'] == 'Perlu Revisi')
                                <span class="text-red-600 font-bold bg-red-50 px-2.5 py-1 rounded-md text-xs">Perlu Revisi</span>
                            @else
                                <span class="text-green-600 font-medium bg-green-50 px-2.5 py-1 rounded-md text-xs">Sesuai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>