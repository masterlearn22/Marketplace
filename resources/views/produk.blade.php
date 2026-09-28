@extends('layouts.main')
@section('title', $product->nama_product . ' - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container">
    <div style="font-size: 12px; color: #888; padding: 24px 0; font-weight: 500;">
        Beranda &nbsp;&gt;&nbsp; Katalog &nbsp;&gt;&nbsp; <strong style="color: var(--text-dark);">{{ $product->nama_product }}</strong>
    </div>

    @if(session('success'))
        <div style="background: #e8f5e9; color: #2e7d32; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <section class="product-detail-section">
        <div class="product-detail-grid">
            <div class="product-gallery">
                <img src="{{ asset($product->gambar_product) }}" alt="{{ $product->nama_product }}">
            </div>
            
            <div class="product-info-detail">
                <div class="product-tags-lg">
                    <span class="tag-brand-lg">ARDILES</span>
                    <span class="tag-category-lg">{{ strtoupper($product->kategori) }}</span>
                </div>
                
                <h1 class="product-title-lg">{{ $product->nama_product }}</h1>
                
                <div class="product-price-lg">
                    <span class="price-current-lg">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                </div>
                
                <div class="stock-info">
                    <strong class="stock-value">Stok Tersedia</strong> &bull; Sisa {{ $product->stok }} unit
                </div>
                
                <h4 class="detail-section-title">Deskripsi Produk</h4>
                <p class="product-description">
                    {{ $product->deskripsi }}
                </p>
                
                <h4 class="detail-section-title">Detail Produk</h4>
                <table class="specs-table">
                    <tr>
                        <td>Kategori</td>
                        <td>{{ $product->kategori }}</td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td>Ardiles</td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td class="stock-value">{{ $product->stok }} unit tersedia</td>
                    </tr>
                    <tr>
                        <td>Kondisi</td>
                        <td>Baru</td>
                    </tr>
                </table>
                
                <div class="action-buttons">
                    <form action="/keranjang/add/{{ $product->id_product }}" method="POST" style="flex: 1;">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 8px; border-radius: 12px;">
                            <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
