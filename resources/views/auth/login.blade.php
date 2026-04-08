@extends('layouts.app')

@section('title', 'Login - Aplikasi Pengaduan Sarana Sekolah')

@section('css')
<style>
    body {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        width: 100%;
        max-width: 400px;
    }

    .login-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        padding: 40px;
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h1 {
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .login-header p {
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

    .btn-login {
        width: 100%;
        padding: 10px;
        background-color: #3498db;
        border-color: #3498db;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 10px;
    }

    .btn-login:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .login-footer {
        text-align: center;
        color: #7f8c8d;
        font-size: 0.85rem;
        margin-top: 20px;
    }

    .info-box {
        background-color: #ecf0f1;
        border-left: 4px solid #3498db;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .info-box p {
        margin: 0;
        color: #2c3e50;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1><i class="fas fa-bullhorn"></i></h1>
            <h1>Pengaduan Sarana Sekolah</h1>
            <p>Portal Admin</p>
        </div>

        <div class="info-box">
            <p><strong>Demo Account:</strong></p>
            <p>Email: admin@sekolah.com</p>
            <p>Password: password</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email Sekolah</label>
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

            <button type="submit" class="btn btn-primary btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="text-center mt-3">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
        </div>

        <div class="login-footer">
            <p>© 2026 Aplikasi Pengaduan Sarana Sekolah</p>
        </div>
    </div>
</div>
@endsection
