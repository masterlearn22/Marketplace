@extends('layouts.main')
@section('title', 'Katalog - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container">
    <section class="page-header">
        <div class="search-filter-bar">
            <div class="search-input-wrapper">
                <input type="text" class="form-control" placeholder="Cari sepatu, brand, atau kategori...">
            </div>
            <select class="select-control">
                <option>Terbaru</option>
                <option>Harga Tertinggi</option>
                <option>Harga Terendah</option>
            </select>
        </div>

        <div class="filter-chips">
            <div class="chip active">Semua</div>
            <div class="chip">Road Running</div>
            <div class="chip">Trail Running</div>
            <div class="chip">Track & Field</div>
            <div class="chip">Casual Running</div>
            <div class="chip">Minimalist</div>
        </div>

        <div class="results-count">
            Menampilkan <span style="color: var(--primary-red);">{{ $products->count() }}</span> Produk
        </div>
    </section>

    <section class="featured" style="padding: 40px 0; background: transparent;">
        <div class="products-grid">
            @foreach ($products as $product)
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
                        <span style="margin-left: auto; color: var(--primary-red); font-weight: 800;">Stock {{ $product->stok }}</span>
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
    </section>
</main>
@endsection
