<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (count($cart) === 0) {
            return redirect('/katalog')->withErrors('Keranjang Anda kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['kuantitas'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string|max:1054',
        ]);

        $cart = session()->get('cart', []);
        if (count($cart) === 0) {
            return redirect('/katalog');
        }

        foreach ($cart as $product_id => $item) {
            Order::create([
                'id_order' => 'ORD-' . Str::random(4),
                'pembeli_id' => Auth::user()->id_user,
                'product_id' => $product_id,
                'kuantitas' => $item['kuantitas'],
                'tgl_order' => now(),
                'total_harga' => $item['harga'] * $item['kuantitas'],
                'status_order' => 'menunggu_bayar',
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'bukti_bayar' => null,
            ]);
        }

        session()->forget('cart');

        return redirect('/orders')->with('success', 'Pesanan berhasil dibuat! Silakan upload bukti pembayaran.');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'pembeli') {
            $orders = Order::with('product')->where('pembeli_id', $user->id_user)->orderBy('tgl_order', 'desc')->get();
            return view('orders', compact('orders'));
        } else {
            // Penjual
            $orders = Order::with(['product', 'pembeli'])
                ->whereHas('product', function ($query) use ($user) {
                    $query->where('penjual_id', $user->id_user);
                })
                ->orderBy('tgl_order', 'desc')
                ->get();
            return view('orders', compact('orders'));
        }
    }

    public function uploadPayment(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,webp,gif,avif|max:2048',
        ]);

        $order = Order::where('id_order', $id)->where('pembeli_id', Auth::user()->id_user)->firstOrFail();

        $imageName = time().'.'.$request->bukti_bayar->extension();  
        $request->bukti_bayar->move(public_path('assets/img/payments'), $imageName);

        $order->bukti_bayar = 'assets/img/payments/' . $imageName;
        $order->status_order = 'menunggu_konfirmasi';
        $order->save();

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::where('id_order', $id)->firstOrFail();
        
        // Penjual verify
        if ($request->action === 'konfirmasi') {
            $order->status_order = 'diproses';
        } elseif ($request->action === 'kirim') {
            $order->status_order = 'dikirim';
        } elseif ($request->action === 'selesai') {
            $order->status_order = 'selesai';
        }

        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
