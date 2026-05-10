<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Chart 1: Jumlah mahasiswa tiap prodi (Bar Chart)
        $mahasiswaPerProdi = Student::select('prodi', DB::raw('count(*) as total'))
            ->groupBy('prodi')
            ->orderBy('prodi')
            ->get();

        // Chart 2: Jumlah mahasiswa tiap angkatan (Line Chart)
        $mahasiswaPerAngkatan = Student::select('angkatan', DB::raw('count(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->get();

        // Chart 3: Jumlah mahasiswa LULUS tiap angkatan (Bar Chart)
        $lulusPerAngkatan = Student::select('angkatan', DB::raw('count(*) as total'))
            ->where('status', 'lulus')
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->get();

        // Chart 4 (bonus): Distribusi status mahasiswa (Pie/Doughnut Chart)
        $distribusiStatus = Student::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $totalMahasiswa = Student::count();

        return view('dashboard', compact(
            'mahasiswaPerProdi',
            'mahasiswaPerAngkatan',
            'lulusPerAngkatan',
            'distribusiStatus',
            'totalMahasiswa'
        ));
    }
}