@extends('layouts.main')
@section('title', 'Manajemen Produk - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container">
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

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h1 class="page-title-lg" style="margin: 0;">Manajemen Produk</h1>
        <button class="btn btn-primary" onclick="openModal('add')" style="padding: 8px 16px; border-radius: 8px;">+ Tambah Produk</button>
    </div>

    <div class="products-grid" style="margin-bottom: 60px;">
        @forelse ($products as $product)
        <!-- Card -->
        <div class="product-card">
            <div class="product-image-container">
                <span class="badge-bestseller" style="background: var(--text-dark);">Stok: {{ $product->stok }}</span>
                <img src="{{ asset($product->gambar_product) }}" alt="{{ $product->nama_product }}">
            </div>
            <div class="product-info">
                <div class="product-tags">
                    <span class="tag-brand">ARDILES</span>
                    <span class="tag-category">&bull; {{ $product->kategori }}</span>
                </div>
                <h3 class="product-title">{{ $product->nama_product }}</h3>
                <div class="product-footer" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="product-price">
                        <span class="price-current">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn-edit" onclick="openModal('edit', {{ json_encode($product) }})" style="background: transparent; color: var(--text-dark); border: 1px solid var(--border-color); padding: 4px 12px; border-radius: 6px; cursor: pointer;">Edit</button>
                        <form action="/products/delete/{{ $product->id_product }}" method="POST" style="margin:0;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            <button type="submit" style="background: transparent; color: #e74c3c; border: 1px solid #e74c3c; padding: 4px 12px; border-radius: 6px; cursor: pointer;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 40px; color: #888; grid-column: span 4;">Belum ada produk yang dijual.</div>
        @endforelse
    </div>
</main>

<!-- Modal Overlay -->
<div id="productModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 32px; border-radius: 16px; width: 100%; max-width: 500px; max-height: 90vh; overflow-y: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h2 id="modalTitle" style="margin: 0;">Tambah Produk</h2>
            <button onclick="closeModal()" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
        </div>
        <form id="productForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="margin-bottom: 16px;">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_product" id="nama_product" class="form-control" required>
            </div>
            <div class="form-group" style="margin-bottom: 16px;">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" required>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" required placeholder="Contoh: Road Running">
                </div>
                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="form-label">Status</label>
                    <select name="status_product" id="status_product" class="form-control" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid var(--border-color);">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 24px;">
                <label class="form-label">Gambar Produk (Kosongkan jika tidak diubah)</label>
                <input type="file" name="gambar_product" class="form-control" style="padding: 10px;">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; border-radius: 8px;">Simpan Produk</button>
        </form>
    </div>
</div>

<script>
    function openModal(mode, product = null) {
        const modal = document.getElementById('productModal');
        const form = document.getElementById('productForm');
        const title = document.getElementById('modalTitle');
        
        modal.style.display = 'flex';
        
        if (mode === 'add') {
            title.textContent = 'Tambah Produk Baru';
            form.action = '/products';
            form.reset();
        } else if (mode === 'edit') {
            title.textContent = 'Edit Produk';
            form.action = '/products/' + product.id_product;
            
            document.getElementById('nama_product').value = product.nama_product;
            document.getElementById('deskripsi').value = product.deskripsi;
            document.getElementById('harga').value = product.harga;
            document.getElementById('stok').value = product.stok;
            document.getElementById('kategori').value = product.kategori;
            document.getElementById('status_product').value = product.status_product;
        }
    }
    
    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }
</script>
@endsection
