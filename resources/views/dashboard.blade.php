@extends('layouts.app')

@section('title', 'Dashboard - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4"><i class="fas fa-chart-line"></i> Dashboard</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="stat-card">
            <h5>Total Aspirasi</h5>
            <h2>{{ $totalAspirasi }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #f39c12;">
            <h5>Menunggu</h5>
            <h2 style="color: #f39c12;">{{ $aspirasiBaru }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #3498db;">
            <h5>Sedang Diproses</h5>
            <h2 style="color: #3498db;">{{ $aspirasiProses }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #27ae60;">
            <h5>Selesai</h5>
            <h2 style="color: #27ae60;">{{ $aspirasiSelesai }}</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="stat-card">
            <h5>Total Siswa</h5>
            <h2>{{ $totalSiswa }}</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-history"></i> Aspirasi Terbaru</h5>
            </div>
            <div class="card-body">
                @if($aspirasiTerbaru->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Pelaporan</th>
                                    <th>Nama Siswa</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aspirasiTerbaru as $aspirasi)
                                    <tr>
                                        <td><strong>{{ $aspirasi->id_pelaporan }}</strong></td>
                                        <td>{{ $aspirasi->siswa->nama_siswa ?? 'N/A' }}</td>
                                        <td>{{ $aspirasi->kategori->ket_kategori ?? 'N/A' }}</td>
                                        <td>{{ $aspirasi->lokasi }}</td>
                                        <td>
                                            <span class="badge {{ strtolower($aspirasi->status) }}">
                                                {{ $aspirasi->status }}
                                            </span>
                                        </td>
                                        <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('aspirasi.show', $aspirasi->id_aspirasi) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">Belum ada aspirasi</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
