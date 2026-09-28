@extends('layouts.main')
@section('title', 'Masuk - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="auth-container" style="align-items: center;">
    <div class="auth-card">
        <div class="auth-header">
            <a href="/" class="auth-logo" style="text-decoration: none;">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 16L10 10L14 14L20 6" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                RunMarket<span style="color: var(--primary-red);">.</span>
            </a>
            <h1 class="auth-title">Selamat Datang</h1>
            <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan.</p>
        </div>

        @if(session('success'))
            <div style="background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div style="background: #ffebee; color: #c62828; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email / Username</label>
                <input type="email" name="email" class="form-control" placeholder="" required>
            </div>

            <div class="form-group">
                <label class="form-label">
                    Kata Sandi
                    <a href="#">Lupa sandi?</a>
                </label>
                <div class="input-icon-right">
                    <input type="password" name="password" class="form-control" placeholder="" required>
                    <i class="far fa-eye"></i>
                </div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" style="accent-color: var(--primary-red);">
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary btn-full">
                &rarr; Masuk
            </button>

            <div class="auth-footer">
                Belum punya akun? <a href="/register">Daftar</a>
            </div>
        </form>
    </div>
</main>
@endsection
