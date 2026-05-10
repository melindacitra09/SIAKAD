<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIAkad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <span class="font-bold text-lg text-blue-700">SIAkad</span>
        <div class="flex gap-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a>
            <a href="{{ route('student.index') }}" class="text-gray-600 hover:text-blue-600">Data Mahasiswa</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard SIAkad</h1>

        {{-- Stat Card --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Mahasiswa</p>
                <p class="text-3xl font-bold text-blue-600">{{ $totalMahasiswa }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Prodi</p>
                <p class="text-3xl font-bold text-green-600">{{ $mahasiswaPerProdi->count() }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Mahasiswa Lulus</p>
                <p class="text-3xl font-bold text-purple-600">{{ $distribusiStatus->where('status','lulus')->first()->total ?? 0 }}</p>
            </div>
        </div>

        {{-- Charts Row 1 --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-base font-semibold text-gray-700 mb-4">Mahasiswa per Prodi</h2>
                <canvas id="chartProdi"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-base font-semibold text-gray-700 mb-4">Mahasiswa per Angkatan</h2>
                <canvas id="chartAngkatan"></canvas>
            </div>
        </div>

        {{-- Charts Row 2 --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-base font-semibold text-gray-700 mb-4">Mahasiswa Lulus per Angkatan</h2>
                <canvas id="chartLulus"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-base font-semibold text-gray-700 mb-4">Distribusi Status Mahasiswa</h2>
                <canvas id="chartStatus"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Data dari Laravel (di-encode ke JSON)
        const prodiLabels  = @json($mahasiswaPerProdi->pluck('prodi'));
        const prodiData    = @json($mahasiswaPerProdi->pluck('total'));

        const angkatanLabels = @json($mahasiswaPerAngkatan->pluck('angkatan'));
        const angkatanData   = @json($mahasiswaPerAngkatan->pluck('total'));

        const lulusLabels  = @json($lulusPerAngkatan->pluck('angkatan'));
        const lulusData    = @json($lulusPerAngkatan->pluck('total'));

        const statusLabels = @json($distribusiStatus->pluck('status'));
        const statusData   = @json($distribusiStatus->pluck('total'));

        // Chart 1 - Bar: Mahasiswa per Prodi
        new Chart(document.getElementById('chartProdi'), {
            type: 'bar',
            data: {
                labels: prodiLabels,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: prodiData,
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });

        // Chart 2 - Line: Mahasiswa per Angkatan
        new Chart(document.getElementById('chartAngkatan'), {
            type: 'line',
            data: {
                labels: angkatanLabels,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: angkatanData,
                    borderColor: 'rgba(16, 185, 129, 1)',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });

        // Chart 3 - Bar: Lulus per Angkatan
        new Chart(document.getElementById('chartLulus'), {
            type: 'bar',
            data: {
                labels: lulusLabels,
                datasets: [{
                    label: 'Mahasiswa Lulus',
                    data: lulusData,
                    backgroundColor: 'rgba(139, 92, 246, 0.7)',
                    borderColor: 'rgba(139, 92, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });

        // Chart 4 - Doughnut: Distribusi Status (BONUS)
        new Chart(document.getElementById('chartStatus'), {
            type: 'doughnut',
            data: {
                labels: statusLabels.map(s => s.charAt(0).toUpperCase() + s.slice(1)),
                datasets: [{
                    data: statusData,
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                    ],
                    borderWidth: 2,
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });
    </script>
</body>
</html>