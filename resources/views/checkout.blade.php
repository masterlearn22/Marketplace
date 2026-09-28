@extends('layouts.main')
@section('title', 'Ringkasan Pemesanan - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container" style="max-width: 900px;">
    <h1 class="page-title-lg">Ringkasan Pemesanan</h1>

    <form action="/checkout" method="POST">
        @csrf
        <div class="checkout-section">
            @foreach($cart as $item)
            <div class="checkout-card" style="margin-bottom: 12px;">
                <div class="cart-item-img" style="width: 60px; height: 60px; border-radius: 8px;">
                    <img src="{{ asset($item['gambar_product']) }}" alt="{{ $item['nama_product'] }}" style="max-width: 100%;">
                </div>
                <div>
                    <h4 style="font-size: 14px; font-weight: 800; margin-bottom: 4px;">{{ $item['nama_product'] }}</h4>
                    <div style="font-size: 14px; font-weight: 700;">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                </div>
                <div style="margin-left: auto; font-size: 14px; font-weight: 700;">
                    x{{ $item['kuantitas'] }}
                </div>
            </div>
            @endforeach
        </div>

    <div class="checkout-section">
        <h2 class="checkout-section-title">Alamat penerima</h2>
        <div class="checkout-card address-card" style="padding: 0;">
            <input type="text" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman..." required style="width: 100%; border: none; padding: 24px; font-family: inherit; font-size: 14px; outline: none; border-radius: 12px; background: transparent;">
        </div>
    </div>

    <div class="checkout-section">
        <h2 class="checkout-section-title">Metode Pembayaran</h2>
        <div class="payment-methods">
            <div class="payment-card">
                <div style="width: 24px; height: 24px; border-radius: 50%; background: #118ee9; display: flex; justify-content: center; align-items: center; color: white; font-size: 10px; font-weight: bold; font-style: italic;">DANA</div>
                <h4>Dana</h4>
            </div>
            <div class="payment-card" style="opacity: 0.5;">
                <div style="width: 24px; height: 24px; border-radius: 50%; background: #118ee9; display: flex; justify-content: center; align-items: center; color: white; font-size: 10px; font-weight: bold; font-style: italic;">DANA</div>
                <h4>Dana</h4>
            </div>
            <div class="payment-card" style="opacity: 0.5;">
                <div style="width: 24px; height: 24px; border-radius: 50%; background: #118ee9; display: flex; justify-content: center; align-items: center; color: white; font-size: 10px; font-weight: bold; font-style: italic;">DANA</div>
                <h4>Dana</h4>
            </div>
        </div>
    </div>

    <div class="checkout-section">
        <h2 class="checkout-section-title">Informasi Total Harga</h2>
        <div class="info-total">
            <p>Total Pesanan ({{ count($cart) }} Produk)</p>
            <h3>Rp {{ number_format($total, 0, ',', '.') }}</h3>
        </div>
        
        <button type="submit" class="btn-order">Order</button>
    </div>
    </form>
</main>
@endsection
