@extends('layouts.app')

@section('title', 'Data Aspirasi - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="fas fa-comments"></i> Data Aspirasi</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('aspirasi.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Aspirasi
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($aspirasis->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pelaporan</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aspirasis as $aspirasi)
                            <tr>
                                <td><strong>#{{ $aspirasi->id_pelaporan }}</strong></td>
                                <td>{{ $aspirasi->siswa->nama_siswa ?? 'N/A' }}</td>
                                <td>{{ $aspirasi->siswa->kelas ?? 'N/A' }}</td>
                                <td>{{ $aspirasi->kategori->ket_kategori ?? 'N/A' }}</td>
                                <td>{{ substr($aspirasi->lokasi, 0, 20) }}...</td>
                                <td>
                                    <span class="badge {{ strtolower($aspirasi->status) }}">
                                        {{ $aspirasi->status }}
                                    </span>
                                </td>
                                <td>{{ $aspirasi->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('aspirasi.show', $aspirasi->id_aspirasi) }}" class="btn btn-info" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('aspirasi.edit', $aspirasi->id_aspirasi) }}" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('aspirasi.destroy', $aspirasi->id_aspirasi) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $aspirasis->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-inbox" style="font-size: 3rem; color: #bdc3c7;"></i>
                <p class="text-muted mt-3">Belum ada data aspirasi</p>
            </div>
        @endif
    </div>
</div>
@endsection
