@extends('layouts.app')

@section('title', 'Edit Aspirasi - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="fas fa-edit"></i> Edit Aspirasi</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Edit Aspirasi #{{ $aspirasi->id_pelaporan }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('aspirasi.update', $aspirasi->id_aspirasi) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_pelaporan" class="form-label">ID Pelaporan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('id_pelaporan') is-invalid @enderror" id="id_pelaporan" name="id_pelaporan" value="{{ $aspirasi->id_pelaporan }}" required>
                        @error('id_pelaporan')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nis" class="form-label">Siswa <span class="text-danger">*</span></label>
                        <select class="form-select @error('nis') is-invalid @enderror" id="nis" name="nis" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->nis }}" {{ $aspirasi->nis == $siswa->nis ? 'selected' : '' }}>
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
                                <option value="{{ $kategori->id_kategori }}" {{ $aspirasi->id_kategori == $kategori->id_kategori ? 'selected' : '' }}>
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
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ $aspirasi->lokasi }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('ket') is-invalid @enderror" id="ket" name="ket" value="{{ $aspirasi->ket }}" required>
                        @error('ket')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            @foreach($statuses as $key => $value)
                                <option value="{{ $key }}" {{ $aspirasi->status == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="feedback" class="form-label">Feedback</label>
                        <textarea class="form-control @error('feedback') is-invalid @enderror" id="feedback" name="feedback" rows="4">{{ old('feedback', $aspirasi->feedback ?? '') }}</textarea>
                        @error('feedback')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('aspirasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
