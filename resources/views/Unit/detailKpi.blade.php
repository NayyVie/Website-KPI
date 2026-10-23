<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Laporan KPI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('unit.riwayat-kpi') }}" class="text-blue-600 mb-4 inline-block">&larr; Kembali ke Riwayat</a>
        
        <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $detail->nama_file }}</h1>
                    <p class="text-gray-500 text-sm mt-1">Periode: {{ $detail->periode }}</p>
                </div>
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-md text-sm font-bold">{{ $detail->status }}</span>
            </div>

            @if($detail->status == 'Revisi')
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800 text-sm">
                <strong>Catatan Admin:</strong> {{ $detail->catatan_admin }}
            </div>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
            <div class="p-4 border-b bg-gray-50 font-bold text-gray-700">Rincian Penilaian Sub Area</div>
            <table class="w-full text-left">
                <thead class="border-b text-sm text-gray-500">
                    <tr>
                        <th class="p-4">Sub Area</th>
                        <th class="p-4">Skor</th>
                        <th class="p-4">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    @foreach($detail->rincian_skor as $skor)
                    <tr>
                        <td class="p-4 font-medium">{{ $skor['sub_area'] }}</td>
                        <td class="p-4">{{ $skor['skor'] }}</td>
                        <td class="p-4">
                            @if($skor['status'] == 'Perlu Revisi')
                                <span class="text-red-600 font-bold">Perlu Revisi</span>
                            @else
                                <span class="text-green-600">Sesuai</span>
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