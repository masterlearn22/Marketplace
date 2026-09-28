@extends('layouts.main')
@section('title', 'Keranjang Belanja - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container">
    <div style="font-size: 12px; color: #888; padding: 24px 0; font-weight: 500;">
        Beranda &nbsp;&gt;&nbsp; Katalog &nbsp;&gt;&nbsp; <strong style="color: var(--text-dark);">Keranjang</strong>
    </div>

    <h1 class="cart-header-title">
        Keranjang Belanja <span>{{ count($cart) }} item</span>
    </h1>

    @if(session('success'))
        <div style="background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="cart-layout">
        <div class="cart-items-section">
            <div class="cart-card">
                <div class="cart-select-all">
                    <label class="checkbox-custom">
                        <input type="checkbox" checked>
                        Semua produk dipilih
                    </label>
                    <button class="btn-delete-all">Hapus Semua</button>
                </div>
            </div>

            @forelse($cart as $id => $item)
            <div class="cart-card" style="margin-bottom: 16px;">
                <div class="cart-item">
                    <input type="checkbox" style="width: 18px; height: 18px; accent-color: var(--primary-red);" checked>
                    <div class="cart-item-img">
                        <img src="{{ asset($item['gambar_product']) }}" alt="{{ $item['nama_product'] }}">
                    </div>
                    <div class="cart-item-info">
                        <h4>{{ $item['nama_product'] }}</h4>
                        <div class="cart-item-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                    </div>
                    <div class="cart-item-qty" style="display: flex; gap: 16px; align-items: center;">
                        <span>x{{ $item['kuantitas'] }}</span>
                        <form action="/keranjang/remove/{{ $id }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" style="background: transparent; border: none; color: #ff3b30; cursor: pointer;"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="cart-card" style="text-align: center; padding: 40px 20px;">
                <p>Keranjang Anda masih kosong.</p>
            </div>
            @endforelse

            <a href="/katalog" class="back-link">
                &lt; Lanjut Belanja
            </a>
        </div>

        <div class="cart-summary-section">
            <div class="cart-card">
                <h3 class="summary-title">Ringkasan Pesanan</h3>
                
                @foreach($cart as $id => $item)
                <div class="summary-item">
                    <h5>{{ $item['nama_product'] }}</h5>
                    <p>Rp {{ number_format($item['harga'] * $item['kuantitas'], 0, ',', '.') }}</p>
                </div>
                @endforeach
                
                <div class="summary-total">
                    <h5>Total Bayar</h5>
                    <p style="font-size: 16px;">Rp {{ number_format($total, 0, ',', '.') }}</p>
                </div>
                
                @if(count($cart) > 0)
                <a href="/checkout" class="btn btn-full" style="background-color: #000; color: #fff; border-radius: 12px; margin-top: 24px; text-decoration: none; text-align: center; display: block; padding: 12px;">
                    Checkout Produk
                </a>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
