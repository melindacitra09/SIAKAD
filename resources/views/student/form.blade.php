<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($student) ? 'Edit' : 'Tambah' }} Mahasiswa - SIAkad</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="bg-white rounded-xl shadow p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                {{ isset($student) ? 'Edit Data Mahasiswa' : 'Tambah Mahasiswa Baru' }}
            </h1>

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($student) ? route('student.update', $student->id) : route('student.store') }}" method="POST">
                @csrf
                @if(isset($student)) @method('PUT') @endif

                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">NPM</label>
                        <input type="text" name="npm" value="{{ old('npm', $student->npm ?? '') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Contoh: 20240001">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Nama lengkap mahasiswa">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="email@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <select name="prodi" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach(['Informatika', 'Sistem Informasi', 'Sains Data', 'Bisnis Digital'] as $prodi)
                                <option value="{{ $prodi }}" {{ old('prodi', $student->prodi ?? '') == $prodi ? 'selected' : '' }}>
                                    {{ $prodi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan', $student->angkatan ?? '') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Contoh: 2022" min="2000" max="2099">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Status --</option>
                            @foreach(['aktif', 'cuti', 'lulus'] as $status)
                                <option value="{{ $status }}" {{ old('status', $student->status ?? '') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Handphone</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $student->no_hp ?? '') }}"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Contoh: 08123456789">
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-medium">
                        {{ isset($student) ? 'Simpan Perubahan' : 'Tambah Mahasiswa' }}
                    </button>
                    <a href="{{ route('student.index') }}"
                        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 font-medium">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>