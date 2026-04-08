@extends('layouts.app')

@section('title', 'Data Siswa - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="fas fa-users"></i> Data Siswa</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('siswa.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($siswas->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>Total Aspirasi</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswas as $siswa)
                            <tr>
                                <td>
                                    @if($siswa->foto)
                                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="{{ $siswa->nama_siswa }}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <div style="width: 50px; height: 50px; border-radius: 50%; background-color: #e9ecef; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-user" style="color: #999;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $siswa->nis }}</strong></td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td><span class="badge bg-info">{{ $siswa->kelas }}</span></td>
                                <td>{{ $siswa->email ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $siswa->aspirasis->count() }}</span>
                                </td>
                                <td>{{ $siswa->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                {{ $siswas->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-inbox" style="font-size: 3rem; color: #bdc3c7;"></i>
                <p class="text-muted mt-3">Belum ada data siswa</p>
            </div>
        @endif
    </div>
</div>
@endsection
