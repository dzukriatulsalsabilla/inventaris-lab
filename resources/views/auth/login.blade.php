@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card auth-card">
    <div class="row g-0">
        <!-- Sisi Kiri: Branding -->
        <div class="col-md-5 auth-brand d-none d-md-flex">
            <i class="bi bi-box-seam fs-1 mb-3"></i>
            <h3 class="fw-bold mb-2">Inventaris Lab RPL</h3>
            <p class="opacity-75 mb-4">Sistem Manajemen Barang Laboratorium Profesional</p>
            <div class="text-start w-100 px-3">
                <div class="feature-item"><i class="bi bi-check-circle-fill"></i> <span>Akses Data Terisolasi per Petugas</span></div>
                <div class="feature-item"><i class="bi bi-check-circle-fill"></i> <span>Dashboard Statistik Real-time</span></div>
                <div class="feature-item"><i class="bi bi-check-circle-fill"></i> <span>Cetak Laporan Otomatis</span></div>
            </div>
        </div>
        
        <!-- Sisi Kanan: Form Login -->
        <div class="col-md-7 auth-form">
            <div class="text-center mb-4">
                <h4 class="fw-bold text-dark">Selamat Datang Kembali 👋</h4>
                <p class="text-muted">Masuk menggunakan akun petugas Anda</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                        <input type="email" class="form-control border-start-0" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@lab.com">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0" name="password" required placeholder="••••••••">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted small" for="remember">Ingat Saya</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link small">Lupa Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-auth w-100">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                </button>

                <div class="text-center mt-4 pt-2 border-top">
                    <p class="text-muted mb-0">Belum punya akun? 
                        <a href="{{ route('register') }}" class="auth-link">Daftar Sekarang</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection