@extends('layouts.app')

@section('title', 'Detail Aspirasi - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="fas fa-eye"></i> Detail Aspirasi #{{ $aspirasi->id_pelaporan }}</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('aspirasi.edit', $aspirasi->id_aspirasi) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('aspirasi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Informasi Aspirasi</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">ID Pelaporan</h6>
                        <p><strong>#{{ $aspirasi->id_pelaporan }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Status</h6>
                        <p>
                            <span class="badge {{ strtolower($aspirasi->status) }}">
                                {{ $aspirasi->status }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Kategori</h6>
                        <p><strong>{{ $aspirasi->kategori->ket_kategori ?? 'N/A' }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Lokasi</h6>
                        <p><strong>{{ $aspirasi->lokasi }}</strong></p>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Keterangan</h6>
                    <p>{{ $aspirasi->ket }}</p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Tanggal Input</h6>
                        <p>{{ $aspirasi->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Tanggal Update</h6>
                        <p>{{ $aspirasi->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                @if($aspirasi->feedback)
                    <div class="mb-3">
                        <h6 class="text-muted">Feedback</h6>
                        <p>{{ $aspirasi->feedback }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Siswa</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted">Nama Siswa</h6>
                    <p><strong>{{ $aspirasi->siswa->nama_siswa ?? 'N/A' }}</strong></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">NIS</h6>
                    <p><strong>{{ $aspirasi->siswa->nis ?? 'N/A' }}</strong></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Kelas</h6>
                    <p><strong>{{ $aspirasi->siswa->kelas ?? 'N/A' }}</strong></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Email</h6>
                    <p>{{ $aspirasi->siswa->email ?? 'Belum diisi' }}</p>
                </div>

                <a href="{{ route('siswa.show', $aspirasi->siswa->id ?? '#') }}" class="btn btn-sm btn-primary w-100">
                    <i class="fas fa-user"></i> Lihat Profil Siswa
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
