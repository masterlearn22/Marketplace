@extends('layouts.main')
@section('title', 'Manajemen Order - RunMarket')
@section('body-class', 'light-theme')
@section('content')
<main class="container" style="max-width: 1000px;">
    <h1 class="page-title-lg">Manajemen Order</h1>

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

    <div class="order-list">
        @forelse($orders as $order)
        <div class="order-card" style="display: flex; gap: 16px; padding: 16px; border: 1px solid var(--border-color); border-radius: 12px; margin-bottom: 16px; align-items: center; justify-content: space-between;">
            <div style="display: flex; gap: 16px; align-items: center;">
                <div class="order-img" style="width: 80px; height: 80px; border-radius: 8px; overflow: hidden; background: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset($order->product->gambar_product) }}" alt="{{ $order->product->nama_product }}" style="max-width: 100%; max-height: 100%;">
                </div>
                <div class="order-info">
                    <h4 style="margin: 0 0 4px 0; font-size: 16px; font-weight: 700;">{{ $order->product->nama_product }}</h4>
                    <p style="margin: 0; color: #666; font-size: 14px;">Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }} ({{ $order->kuantitas }} unit)</p>
                    <p style="margin: 4px 0 0 0; color: #888; font-size: 12px;">Order ID: {{ $order->id_order }} &bull; Tanggal: {{ \Carbon\Carbon::parse($order->tgl_order)->format('d M Y, H:i') }}</p>
                    @if(auth()->user()->role === 'penjual')
                        <p style="margin: 4px 0 0 0; color: #888; font-size: 12px;">Pembeli: {{ $order->pembeli->nama_user }} ({{ $order->alamat_pengiriman }})</p>
                    @endif
                </div>
            </div>

            <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 8px;">
                @php
                    $statusClass = 'status-black';
                    if($order->status_order === 'selesai') $statusClass = 'status-green';
                    if($order->status_order === 'dibatalkan') $statusClass = 'status-red';
                @endphp
                <div class="order-status {{ $statusClass }}" style="text-transform: capitalize;">{{ str_replace('_', ' ', $order->status_order) }}</div>

                @if(auth()->user()->role === 'pembeli')
                    @if($order->status_order === 'menunggu_bayar')
                        <form action="/orders/upload/{{ $order->id_order }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 8px; align-items: center;">
                            @csrf
                            <input type="file" name="bukti_bayar" required style="font-size: 12px; width: 150px;">
                            <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 12px; border-radius: 6px;">Upload Bukti</button>
                        </form>
                    @elseif($order->bukti_bayar)
                        <a href="{{ asset($order->bukti_bayar) }}" target="_blank" style="font-size: 12px; color: var(--primary-red); font-weight: 600;">Lihat Bukti Bayar</a>
                    @endif
                @else
                    {{-- Penjual Actions --}}
                    @if($order->status_order === 'menunggu_konfirmasi')
                        <div style="display: flex; gap: 8px; align-items: center;">
                            <a href="{{ asset($order->bukti_bayar) }}" target="_blank" style="font-size: 12px; color: var(--primary-red); font-weight: 600;">Cek Bukti Bayar</a>
                            <form action="/orders/status/{{ $order->id_order }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="konfirmasi">
                                <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 12px; border-radius: 6px; background-color: #000; border-color: #000; color: #fff;">Terima Pesanan</button>
                            </form>
                        </div>
                    @elseif($order->status_order === 'diproses')
                        <form action="/orders/status/{{ $order->id_order }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="kirim">
                            <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 12px; border-radius: 6px; background-color: #f39c12; border-color: #f39c12; color: #fff;">Kirim Pesanan</button>
                        </form>
                    @elseif($order->status_order === 'dikirim')
                        <form action="/orders/status/{{ $order->id_order }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="selesai">
                            <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 12px; border-radius: 6px; background-color: #27ae60; border-color: #27ae60; color: #fff;">Selesaikan Pesanan</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 40px; color: #888;">Belum ada pesanan.</div>
        @endforelse
    </div>
</main>
@endsection
