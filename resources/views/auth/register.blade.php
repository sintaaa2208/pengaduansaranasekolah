@extends('layouts.app')

@section('title', 'Register - Aplikasi Pengaduan Sarana Sekolah')

@section('css')
<style>
    body {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-container {
        width: 100%;
        max-width: 450px;
    }

    .register-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        padding: 40px;
    }

    .register-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .register-header h1 {
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .register-header p {
        color: #7f8c8d;
    }

    .form-control {
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-register {
        width: 100%;
        padding: 10px;
        background-color: #3498db;
        border-color: #3498db;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 10px;
    }

    .btn-register:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .register-footer {
        text-align: center;
        color: #7f8c8d;
        font-size: 0.85rem;
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <h1><i class="fas fa-user-plus"></i></h1>
            <h1>Daftar Akun Baru</h1>
            <p>Mulai gunakan aplikasi pengaduan sarana sekolah</p>
        </div>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary btn-register">
                <i class="fas fa-user-plus"></i> Daftar
            </button>
        </form>

        <div class="text-center mt-3">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>

        <div class="register-footer">
            <p>© 2026 Aplikasi Pengaduan Sarana Sekolah</p>
        </div>
    </div>
</div>
@endsection
