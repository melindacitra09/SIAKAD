# SIAkad - Sistem Informasi Akademik

Sistem Informasi Akademik (SIAkad) adalah aplikasi web berbasis Laravel yang digunakan untuk mengelola data mahasiswa dan menampilkan informasi akademik dalam bentuk dashboard visual yang interaktif.

## Fitur

- **Dashboard** — Menampilkan ringkasan data mahasiswa dalam bentuk grafik interaktif:
  - Bar Chart: Jumlah mahasiswa per program studi
  - Line Chart: Jumlah mahasiswa per angkatan
  - Bar Chart: Jumlah mahasiswa lulus per angkatan
  - Doughnut Chart: Distribusi status mahasiswa (Aktif, Cuti, Lulus)
- **Data Mahasiswa** — CRUD lengkap (tambah, lihat, edit, hapus) dengan field:
  - NPM, Nama, Email, Program Studi, Angkatan, Status, No. Handphone

## Tech Stack

- **Backend**: PHP 8, Laravel 11
- **Frontend**: Blade Template, Tailwind CSS
- **Database**: SQLite
- **Chart**: Chart.js
- **Tools**: Composer, NPM, Vite

## Cara Menjalankan

1. Clone repository ini
```bash
   git clone https://github.com/azimzida/SIAKAD.git
   cd SIAKAD
```

2. Install dependencies
```bash
   composer install
   npm install
```

3. Copy file environment
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Jalankan migrasi database
```bash
   php artisan migrate
```

5. Jalankan aplikasi
```bash
   php artisan serve
```

6. Buka browser dan akses `http://127.0.0.1:8000`

## Struktur Fitur

| Halaman | URL | Keterangan |
|---|---|---|
| Dashboard | `/` | Grafik & statistik mahasiswa |
| Data Mahasiswa | `/student` | List semua mahasiswa |
| Tambah Mahasiswa | `/student/create` | Form tambah data |
| Edit Mahasiswa | `/student/{id}/edit` | Form edit data |

## Developer

- **Nama**: Azim Saqyal Huda
- **Mata Kuliah**: Pemrograman Web
- **Universitas**: UPN Veteran Jawa Timur