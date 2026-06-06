@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="card auth-card">
    <div class="row g-0">
        <!-- Sisi Kiri: Branding (Sama seperti Login) -->
        <div class="col-md-5 auth-brand d-none d-md-flex">
            <i class="bi bi-person-plus fs-1 mb-3"></i>
            <h3 class="fw-bold mb-2">Bergabung Sekarang</h3>
            <p class="opacity-75 mb-4">Kelola inventaris lab dengan lebih efisien</p>
            <div class="text-start w-100 px-3">
                <div class="feature-item"><i class="bi bi-shield-check"></i> <span>Data Aman & Terenkripsi</span></div>
                <div class="feature-item"><i class="bi bi-speedometer2"></i> <span>Akses Dashboard Instan</span></div>
                <div class="feature-item"><i class="bi bi-file-earmark-check"></i> <span>Generate Laporan PDF</span></div>
            </div>
        </div>
        
        <!-- Sisi Kanan: Form Register -->
        <div class="col-md-7 auth-form">
            <div class="text-center mb-4">
                <h4 class="fw-bold text-dark">Buat Akun Petugas 🚀</h4>
                <p class="text-muted">Lengkapi data diri Anda untuk memulai</p>
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

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="name" value="{{ old('name') }}" required autofocus placeholder="John Doe">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                        <input type="email" class="form-control border-start-0" name="email" value="{{ old('email') }}" required placeholder="nama@lab.com">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0" name="password" required placeholder="Minimal 8 karakter">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock-fill text-muted"></i></span>
                        <input type="password" class="form-control border-start-0" name="password_confirmation" required placeholder="Ulangi password">
                    </div>
                </div>

                <button type="submit" class="btn btn-auth w-100">
                    <i class="bi bi-person-check me-2"></i> Daftar Akun
                </button>

                <div class="text-center mt-4 pt-2 border-top">
                    <p class="text-muted mb-0">Sudah punya akun? 
                        <a href="{{ route('login') }}" class="auth-link">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection