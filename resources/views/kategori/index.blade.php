@extends('layouts.app')

@section('title', 'Data Kategori - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="fas fa-list"></i> Data Kategori</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('kategori.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($kategoris->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Total Aspirasi</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoris as $kategori)
                            <tr>
                                <td><strong>#{{ $kategori->id_kategori }}</strong></td>
                                <td>{{ $kategori->ket_kategori }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $kategori->aspirasis->count() }}</span>
                                </td>
                                <td>{{ $kategori->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                {{ $kategoris->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-inbox" style="font-size: 3rem; color: #bdc3c7;"></i>
                <p class="text-muted mt-3">Belum ada data kategori</p>
            </div>
        @endif
    </div>
</div>
@endsection
