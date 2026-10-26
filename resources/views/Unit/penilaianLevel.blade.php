<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Level - {{ $namaUnit }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; } </style>
</head>
<body class="min-h-screen p-6 text-gray-800">

    <!-- Top Navbar -->
    <div class="max-w-7xl mx-auto mb-6 flex justify-between items-center text-sm">
        <a href="{{ url('/dashboardUnit') }}" class="text-gray-600 hover:text-gray-900 font-medium">
            &larr; Kembali ke portal unit
        </a>
        <div class="flex items-center gap-4">
            <span class="text-gray-500">Unit pengguna</span>
            <span class="bg-white border border-gray-300 px-3 py-1.5 rounded-md font-bold text-gray-800">{{ $namaUnit }}</span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto flex gap-6">
        
        <!-- SIDEBAR KIRI -->
        <div class="w-1/4 bg-white rounded-xl shadow-sm border border-gray-200 p-4 h-fit">
            <div class="mb-4">
                <p class="text-xs text-gray-500">Sub area</p>
                <h2 class="text-lg font-bold text-gray-900">{{ $namaUnit }}</h2>
            </div>
            
            <div class="flex flex-col gap-1">
                @foreach($subAreas as $sa)
                    <a href="#" class="flex justify-between items-center px-3 py-2.5 rounded-lg text-sm transition-colors {{ $sa['nama'] == $penilaian->sub_area ? 'bg-gray-50 font-bold text-gray-900 border border-gray-200' : 'text-gray-600 hover:bg-gray-50' }}">
                        <span class="truncate pr-2">{{ $sa['nama'] }}</span>
                        <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $sa['score'] >= 3 ? 'bg-green-100 text-green-700' : ($sa['score'] >= 2 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ $sa['score'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- KONTEN UTAMA KANAN -->
        <div class="w-3/4 flex flex-col gap-6">
            
            <!-- Header Sub Area -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex justify-between items-start">
                <div>
                    <p class="text-xs text-gray-500 mb-1">{{ $penilaian->kode }}</p>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $penilaian->sub_area }}</h1>
                    <p class="text-sm text-gray-600 max-w-xl">{{ $penilaian->deskripsi }}</p>
                </div>
                <div class="border-l-4 border-blue-600 pl-4 py-1">
                    <p class="text-xs text-gray-500 font-semibold">Score ML sub area</p>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $penilaian->score_ml }}</h2>
                   <p class="text-[11px] text-gray-400 mt-1 max-w-50 leading-tight">Level berikutnya terbuka hanya jika semua kriteria level sebelumnya sesuai.</p>
                </div>
            </div>

            <!-- Tab Level 1 - 5 -->
            <div class="grid grid-cols-5 gap-3">
                <!-- Level 1 (Aktif) -->
                <button class="border border-blue-900 bg-blue-900 text-white rounded-lg p-2 flex flex-col items-center justify-center transition-transform hover:scale-105 shadow-md">
                    <span class="font-bold text-sm"><i class="text-[10px] font-normal">&lt;1</i></span>
                    <span class="font-bold text-sm">1&lt;x≤2</span>
                    <span class="text-[10px] text-blue-200">Nilai 1.0</span>
                </button>
                <!-- Level 2 -->
                <button class="border border-gray-200 bg-white text-gray-700 rounded-lg p-2 flex flex-col items-center justify-center hover:bg-gray-50">
                    <span class="font-bold text-sm">1&lt;x≤2</span>
                    <span class="text-[10px] text-gray-500">Nilai 1.0</span>
                </button>
                <!-- Level 3 -->
                <button class="border border-gray-200 bg-white text-gray-700 rounded-lg p-2 flex flex-col items-center justify-center hover:bg-gray-50">
                    <span class="font-bold text-sm">2&lt;x≤3</span>
                    <span class="text-[10px] text-gray-500">Nilai 0.2</span>
                </button>
                <!-- Level 4 -->
                <button class="border border-gray-200 bg-gray-50 text-gray-400 rounded-lg p-2 flex flex-col items-center justify-center">
                    <span class="font-bold text-sm">3&lt;x≤4</span>
                    <span class="text-[10px]">Nilai 0.0</span>
                    <span class="text-[9px] mt-0.5 text-gray-400">Terkunci</span>
                </button>
                <!-- Level 5 -->
                <button class="border border-gray-200 bg-gray-50 text-gray-400 rounded-lg p-2 flex flex-col items-center justify-center">
                    <span class="font-bold text-sm">4&lt;x≤5</span>
                    <span class="text-[10px]">Nilai 0.0</span>
                    <span class="text-[9px] mt-0.5 text-gray-400">Terkunci</span>
                </button>
            </div>

            <!-- Konten Level 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Level 2</p>
                        <h2 class="text-xl font-bold text-gray-900">Stabilizing</h2>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <span class="text-gray-500">5 kriteria</span>
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-md font-semibold">Nilai level <span class="text-blue-600">1.0</span></span>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    @foreach($penilaian->kriteria_level_2 as $krit)
                    <div class="border border-gray-200 rounded-xl p-5 relative {{ $krit->status == 'terkunci' ? 'opacity-80' : '' }}">
                        
                        <!-- Header Kriteria -->
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center font-bold text-sm shrink-0">
                                    {{ $krit->no }}
                                </div>
                                <h3 class="font-bold text-gray-900 mt-1">{{ $krit->judul }}</h3>
                            </div>
                            <div class="text-xs {{ $krit->indeks_dokumen > 0 ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }} border px-3 py-1 rounded-md flex items-center gap-2">
                                Indeks dokumen <span class="font-bold">{{ $krit->indeks_dokumen }}</span>
                            </div>
                        </div>

                        <!-- Peringatan jika terkunci -->
                        @if($krit->status == 'terkunci')
                        <div class="mb-4 bg-red-50 text-red-600 text-sm p-3 rounded-md border-l-4 border-red-500 flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Indeks otomatis 0 karena kriteria sebelumnya belum terpenuhi. Selesaikan dan setujui kriteria sebelumnya untuk melanjutkan.
                        </div>
                        @endif

                        <!-- Form Area -->
                        <div class="grid grid-cols-1 gap-4 {{ $krit->status == 'terkunci' ? 'pointer-events-none' : '' }}">
                            
                            <!-- Catatan Verifikator -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Catatan verifikator</label>
                                <input type="text" value="{{ $krit->catatan }}" placeholder="Tambahkan catatan hasil pemeriksaan" class="w-full border border-gray-200 rounded-md p-2.5 text-sm {{ $krit->status == 'terkunci' ? 'bg-gray-50' : 'bg-white focus:ring-blue-500 focus:border-blue-500' }}">
                            </div>

                            <!-- Lampiran Bukti -->
                            <div class="border border-gray-100 rounded-lg p-4 flex justify-between items-center bg-white shadow-sm">
                                <div>
                                    <p class="font-semibold text-sm text-gray-800 mb-0.5">Lampiran bukti</p>
                                    <p class="text-xs text-gray-500">
                                        @if($krit->file)
                                            File terunggah: <strong class="text-blue-600">{{ $krit->file }}</strong>
                                        @else
                                            Semua jenis file didukung. Anda dapat memilih beberapa file.
                                        @endif
                                    </p>
                                </div>
                                <button class="bg-white border border-gray-300 text-gray-700 px-4 py-1.5 rounded-md text-xs font-semibold hover:bg-gray-50 whitespace-nowrap">
                                    Pilih file
                                </button>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</body>
</html>