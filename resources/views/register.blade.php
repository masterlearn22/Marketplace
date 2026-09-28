@extends('layouts.main')
@section('title', 'Daftar - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="auth-container">
    <div class="auth-card" style="border: none; padding-top: 20px;">
        <div class="auth-header">
            <a href="/" class="auth-logo" style="text-decoration: none;">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 16L10 10L14 14L20 6" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                RunMarket<span style="color: var(--primary-red);">.</span>
            </a>
            <h1 class="auth-title">Buat Akun Baru</h1>
            <p class="auth-subtitle">Bergabung dan mulai belanja sekarang.</p>
        </div>

        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Daftar sebagai</label>
                <div class="role-selector">
                    <div class="role-card active" data-role="pembeli">
                        <div class="role-icon"><i class="far fa-user"></i></div>
                        <div class="role-text">
                            <h4>Pembeli</h4>
                            <p>Beli produk</p>
                        </div>
                        <div class="role-radio"></div>
                    </div>
                    <div class="role-card" data-role="penjual">
                        <div class="role-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="role-text">
                            <h4>Penjual</h4>
                            <p>Jual produk</p>
                        </div>
                        <div class="role-radio"></div>
                    </div>
                </div>
                <input type="hidden" name="role" id="role-input" value="pembeli">
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_user" class="form-control" placeholder="Nama lengkap Anda" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
            </div>

            <div class="form-group">
                <label class="form-label">Kata Sandi</label>
                <div class="input-icon-right">
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                    <i class="far fa-eye"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-full" style="margin-top: 16px;">
                &rarr; Daftar
            </button>

            <div class="auth-footer">
                Sudah punya akun? <a href="/login">Masuk</a>
            </div>
        </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleCards = document.querySelectorAll('.role-card');
        const roleInput = document.getElementById('role-input');

        roleCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove active class from all
                roleCards.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked card
                this.classList.add('active');
                
                // Update hidden input
                roleInput.value = this.getAttribute('data-role');
            });
        });
    });
</script>
@endsection
