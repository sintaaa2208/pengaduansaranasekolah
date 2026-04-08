<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show dashboard with statistics
     */
    public function index()
    {
        $totalAspirasi = Aspirasi::count();
        $aspirasiBaru = Aspirasi::where('status', 'Menunggu')->count();
        $aspirasiProses = Aspirasi::where('status', 'Proses')->count();
        $aspirasiSelesai = Aspirasi::where('status', 'Selesai')->count();
        $totalSiswa = Siswa::count();

        $aspirasiTerbaru = Aspirasi::with(['siswa', 'kategori'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'totalAspirasi' => $totalAspirasi,
            'aspirasiBaru' => $aspirasiBaru,
            'aspirasiProses' => $aspirasiProses,
            'aspirasiSelesai' => $aspirasiSelesai,
            'totalSiswa' => $totalSiswa,
            'aspirasiTerbaru' => $aspirasiTerbaru,
        ]);
    }
}
