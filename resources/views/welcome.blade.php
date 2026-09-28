@extends('layouts.main')

@section('content')
<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <div class="hero-badge"></div>
                <h1 class="hero-title">
                    Lari Lebih <br>
                    <span class="highlight">Cepat.</span> <br>
                    Tampil Lebih <br>
                    <span class="highlight">Keren.</span>
                </h1>
                <p class="hero-description">
                    Temukan koleksi sepatu lari terbaik dari brand lokal dan internasional. Performa tinggi, harga terjangkau, pengiriman cepat ke seluruh Indonesia.
                </p>
                <div class="hero-buttons">
                    <a href="/register" class="btn btn-primary" style="text-decoration: none; display: inline-flex; justify-content: center; align-items: center; box-sizing: border-box;">Daftar Sekarang</a>
                    <a href="/katalog" class="btn btn-outline" style="text-decoration: none; display: inline-flex; justify-content: center; align-items: center; box-sizing: border-box;">Lihat Katalog</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>50K+</h3>
                        <p>Produk Tersedia</p>
                    </div>
                    <div class="stat-item">
                        <h3>200+</h3>
                        <p>Brand Terpercaya</p>
                    </div>
                    <div class="stat-item">
                        <h3>1M+</h3>
                        <p>Pelanggan Puas</p>
                    </div>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="{{ asset('assets/img/products/shoes.png') }}" alt="Red Running Shoe">
                <div class="stok-badge">Stok Tersedia</div>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="featured">
        <div class="container">
            <div class="section-header">
                <div class="section-label">PILIHAN TERBAIK</div>
                <h2 class="section-title">
                    Featured Running <br>
                    <span class="highlight">Shoes</span>
                </h2>
                <p class="section-subtitle">
                    Koleksi sepatu lari pilihan editor dengan performa terbaik di kelasnya.
                </p>
                <a href="/katalog" class="view-all">Lihat Semua &rarr;</a>
            </div>

            <div class="products-grid">
                @foreach($featuredProducts as $product)
                <!-- Card -->
                <div class="product-card" style="position: relative;">
                    <a href="/produk/{{ $product->id_product }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></a>
                    <div class="product-image-container">
                        <span class="badge-bestseller">BEST SELLER</span>
                        <span class="badge-bestseller" style="left: auto; right: 16px; background: transparent; color: var(--primary-red); border: 1px solid var(--border-color); width: 32px; height: 32px; padding: 0; display: flex; justify-content: center; align-items: center; border-radius: 50%;"><i class="far fa-heart"></i></span>
                        <img src="{{ asset($product->gambar_product) }}" alt="{{ $product->nama_product }}">
                    </div>
                    <div class="product-info">
                        <div class="product-tags">
                            <span class="tag-brand">ARDILES</span>
                            <span class="tag-category">&bull; {{ $product->kategori }}</span>
                        </div>
                        <h3 class="product-title">{{ $product->nama_product }}</h3>
                        <div class="product-footer">
                            <div class="product-price">
                                <span class="price-current">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </div>
                            <form action="/keranjang/add/{{ $product->id_product }}" method="POST" style="margin: 0; z-index: 2; position: relative;">
                                @csrf
                                <button type="submit" class="btn-add-cart"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</main>
@endsection
