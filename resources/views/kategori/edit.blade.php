@extends('layouts.app')

@section('title', 'Edit Kategori - Aplikasi Pengaduan Sarana Sekolah')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="fas fa-edit"></i> Edit Kategori</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Edit Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="ket_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('ket_kategori') is-invalid @enderror" id="ket_kategori" name="ket_kategori" value="{{ $kategori->ket_kategori }}" required>
                        @error('ket_kategori')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Maksimal 30 karakter</small>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
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
