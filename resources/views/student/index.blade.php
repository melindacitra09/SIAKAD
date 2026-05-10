<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - SIAkad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <span class="font-bold text-lg text-blue-700">SIAkad</span>
        <div class="flex gap-4">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
            <a href="{{ route('student.index') }}" class="text-blue-600 font-semibold">Data Mahasiswa</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Mahasiswa</h1>
            <a href="{{ route('student.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Tambah Mahasiswa
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">NPM</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Prodi</th>
                        <th class="px-4 py-3 text-left">Angkatan</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">No. HP</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $student->npm }}</td>
                        <td class="px-4 py-3 font-medium">{{ $student->name }}</td>
                        <td class="px-4 py-3">{{ $student->email }}</td>
                        <td class="px-4 py-3">{{ $student->prodi }}</td>
                        <td class="px-4 py-3">{{ $student->angkatan }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                {{ $student->status == 'aktif' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $student->status == 'cuti' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                {{ $student->status == 'lulus' ? 'bg-blue-100 text-blue-700' : '' }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $student->no_hp }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('student.edit', $student->id) }}"
                                    class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-gray-400">Belum ada data mahasiswa</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>