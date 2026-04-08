@extends('layouts.app')

@section('title', 'Tambah Aspirasi - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="fas fa-plus"></i> Tambah Aspirasi Baru</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Input Aspirasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('aspirasi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_pelaporan" class="form-label">ID Pelaporan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('id_pelaporan') is-invalid @enderror" id="id_pelaporan" name="id_pelaporan" value="{{ old('id_pelaporan') }}" required>
                        @error('id_pelaporan')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nis" class="form-label">Siswa <span class="text-danger">*</span></label>
                        <select class="form-select @error('nis') is-invalid @enderror" id="nis" name="nis" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->nis }}" {{ old('nis') == $siswa->nis ? 'selected' : '' }}>
                                    {{ $siswa->nama_siswa }} - {{ $siswa->nis }} ({{ $siswa->kelas }})
                                </option>
                            @endforeach
                        </select>
                        @error('nis')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                                    {{ $kategori->ket_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Ruang Kelas A1" required>
                        @error('lokasi')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('ket') is-invalid @enderror" id="ket" name="ket" value="{{ old('ket') }}" placeholder="Deskripsi singkat masalah" required>
                        @error('ket')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('aspirasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
