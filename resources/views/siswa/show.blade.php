@extends('layouts.app')

@section('title', 'Detail Siswa - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="fas fa-user"></i> Detail Siswa</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Siswa</h5>
            </div>
            <div class="card-body">
                @if($siswa->foto)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama_siswa }}" style="max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    </div>
                    <hr>
                @endif

                <div class="mb-3">
                    <h6 class="text-muted">NIS</h6>
                    <p><strong>{{ $siswa->nis }}</strong></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Nama</h6>
                    <p><strong>{{ $siswa->nama_siswa }}</strong></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Kelas</h6>
                    <p><span class="badge bg-info">{{ $siswa->kelas }}</span></p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Email</h6>
                    <p>{{ $siswa->email ?? 'Belum diisi' }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Tanggal Daftar</h6>
                    <p>{{ $siswa->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-comments"></i> Aspirasi Siswa ({{ $siswa->aspirasis->count() }})</h5>
            </div>
            <div class="card-body">
                @if($siswa->aspirasis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Pelaporan</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa->aspirasis as $aspirasi)
                                    <tr>
                                        <td><strong>#{{ $aspirasi->id_pelaporan }}</strong></td>
                                        <td>{{ $aspirasi->kategori->ket_kategori ?? 'N/A' }}</td>
                                        <td>{{ substr($aspirasi->lokasi, 0, 15) }}...</td>
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
                    <p class="text-center text-muted">Belum ada aspirasi dari siswa ini</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
