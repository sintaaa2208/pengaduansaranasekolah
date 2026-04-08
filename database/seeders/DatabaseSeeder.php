<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Create admin user
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('password'),
        ]);

        // Create categories
        $kategori = [
            'Ruang Kelas',
            'Ruang Perpustakaan',
            'Ruang Laboratorium',
            'Ruang Olahraga',
            'Kamar Mandi',
            'Kantin Sekolah',
            'Peralatan Sekolah',
            'Fasilitas Umum',
        ];

        foreach ($kategori as $kat) {
            Kategori::create(['ket_kategori' => $kat]);
        }

        // Create sample students
        $siswas = [
            ['nis' => 1001, 'nama_siswa' => 'Ahmad Rizki Pratama', 'kelas' => 'X A', 'email' => 'ahmad@student.com'],
            ['nis' => 1002, 'nama_siswa' => 'Budi Santoso', 'kelas' => 'X A', 'email' => 'budi@student.com'],
            ['nis' => 1003, 'nama_siswa' => 'Citra Dewi Azizah', 'kelas' => 'X B', 'email' => 'citra@student.com'],
            ['nis' => 1004, 'nama_siswa' => 'Deni Kurniawan', 'kelas' => 'X B', 'email' => 'deni@student.com'],
            ['nis' => 1005, 'nama_siswa' => 'Eka Permata Sari', 'kelas' => 'X C', 'email' => 'eka@student.com'],
            ['nis' => 1006, 'nama_siswa' => 'Fajar Harahap', 'kelas' => 'XI A', 'email' => 'fajar@student.com'],
            ['nis' => 1007, 'nama_siswa' => 'Gita Maharani', 'kelas' => 'XI B', 'email' => 'gita@student.com'],
            ['nis' => 1008, 'nama_siswa' => 'Hendra Wijaya', 'kelas' => 'XII A', 'email' => 'hendra@student.com'],
        ];

        foreach ($siswas as $siswa) {
            Siswa::create($siswa);
        }

        // Create sample aspirations
        $aspirations = [
            [
                'id_pelaporan' => 20260101,
                'nis' => 1001,
                'id_kategori' => 1,
                'lokasi' => 'Ruang Kelas X A',
                'ket' => 'Pintu rusak dan perlu perbaikan',
                'status' => 'Selesai',
                'feedback' => 5,
            ],
            [
                'id_pelaporan' => 20260102,
                'nis' => 1002,
                'id_kategori' => 2,
                'lokasi' => 'Perpustakaan Lantai 2',
                'ket' => 'Rak buku perlu ditambah',
                'status' => 'Proses',
                'feedback' => null,
            ],
            [
                'id_pelaporan' => 20260103,
                'nis' => 1003,
                'id_kategori' => 3,
                'lokasi' => 'Lab IPA',
                'ket' => 'Beberapa peralatan praktikum hilang',
                'status' => 'Menunggu',
                'feedback' => null,
            ],
            [
                'id_pelaporan' => 20260104,
                'nis' => 1004,
                'id_kategori' => 5,
                'lokasi' => 'Kamar Mandi Lantai 1',
                'ket' => 'Kran air bocor dan perlu ganti',
                'status' => 'Proses',
                'feedback' => null,
            ],
            [
                'id_pelaporan' => 20260105,
                'nis' => 1005,
                'id_kategori' => 4,
                'lokasi' => 'Lapangan Olahraga',
                'ket' => 'Jaring bola voli rusak',
                'status' => 'Selesai',
                'feedback' => 4,
            ],
        ];

        foreach ($aspirations as $aspiration) {
            Aspirasi::create($aspiration);
        }
    }
}
