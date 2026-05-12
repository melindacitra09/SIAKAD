<div align="center">

# 🎓 SIAkad
### Sistem Informasi Akademik

![SIAkad Banner](https://capsule-render.vercel.app/api?type=waving&color=0:3B82F6,100:6366F1&height=200&section=header&text=SIAkad&fontSize=80&fontColor=ffffff&fontAlignY=35&desc=Sistem%20Informasi%20Akademik&descAlignY=55&descSize=20)

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Chart.js](https://img.shields.io/badge/Chart.js-FF6384?style=for-the-badge&logo=chartdotjs&logoColor=white)

</div>

---

## 📖 Tentang SIAkad

**SIAkad** adalah aplikasi web *Sistem Informasi Akademik* berbasis **Laravel** yang dirancang untuk membantu pengelolaan data mahasiswa secara efisien. Aplikasi ini dilengkapi dengan dashboard visual interaktif menggunakan **Chart.js** untuk menyajikan data akademik dalam bentuk grafik yang informatif dan mudah dipahami.

---

## ✨ Fitur Utama

### 📊 Dashboard Visual
| Grafik | Jenis | Keterangan |
|--------|-------|------------|
| Mahasiswa per Prodi | **Bar Chart** | Perbandingan jumlah mahasiswa tiap program studi |
| Mahasiswa per Angkatan | **Line Chart** | Tren jumlah mahasiswa tiap angkatan |
| Mahasiswa Lulus per Angkatan | **Bar Chart** | Sebaran mahasiswa lulus tiap angkatan |
| Distribusi Status | **Doughnut Chart** | Proporsi mahasiswa Aktif, Cuti, dan Lulus |

### 👨‍🎓 Manajemen Data Mahasiswa
- ➕ Tambah data mahasiswa baru
- 📋 Lihat daftar seluruh mahasiswa
- ✏️ Edit data mahasiswa
- 🗑️ Hapus data mahasiswa

### 📝 Data yang Dikelola
- NPM, Nama Lengkap, Email
- Program Studi, Angkatan
- Status (Aktif / Cuti / Lulus)
- Nomor Handphone

---

## 🛠️ Tech Stack

```
🔵 Backend    : PHP 8.x + Laravel 11
🎨 Frontend   : Blade Template + Tailwind CSS
🗄️ Database   : SQLite
📊 Chart      : Chart.js
⚡ Build Tool : Vite + NPM
📦 Package    : Composer
```

---

## 🚀 Cara Menjalankan

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/azimzida/SIAKAD.git
cd SIAKAD
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Jalankan migrasi**
```bash
php artisan migrate
```

**5. Jalankan aplikasi**
```bash
php artisan serve
```

**6. Buka browser**
```
http://127.0.0.1:8000
```

---

## 🗺️ Struktur Halaman

```
SIAkad/
├── 🏠 Dashboard        → http://127.0.0.1:8000/
│   ├── Statistik total mahasiswa
│   └── 4 grafik interaktif
│
└── 👥 Data Mahasiswa   → http://127.0.0.1:8000/student
    ├── List mahasiswa
    ├── Tambah mahasiswa
    └── Edit / Hapus mahasiswa
```

---

## 👤 Developer

<div align="center">

| | |
|---|---|
| **Nama** | Azim Saqyal Huda |
| **Mata Kuliah** | Pemrograman Web |
| **Universitas** | UPN Veteran Jawa Timur |
| **GitHub** | [@azimzida](https://github.com/azimzida) |

</div>

---

<div align="center">

![Footer](https://capsule-render.vercel.app/api?type=waving&color=0:6366F1,100:3B82F6&height=120&section=footer)

</div>
