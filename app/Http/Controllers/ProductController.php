<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required|string|max:255',
            'gambar_product' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,avif|max:2048',
            'status_product' => 'required|in:tersedia,habis',
        ]);

        $imagePath = 'assets/img/products/Ardiles/3.jpg'; // default
        if ($request->hasFile('gambar_product')) {
            $imageName = time().'.'.$request->gambar_product->extension();  
            $request->gambar_product->move(public_path('assets/img/products'), $imageName);
            $imagePath = 'assets/img/products/' . $imageName;
        }

        Produk::create([
            'id_product' => 'PRD-' . Str::random(6),
            'penjual_id' => Auth::user()->id_user,
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'gambar_product' => $imagePath,
            'status_product' => $request->status_product,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required|string|max:255',
            'gambar_product' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif,avif|max:2048',
            'status_product' => 'required|in:tersedia,habis',
        ]);

        $product = Produk::where('id_product', $id)->where('penjual_id', Auth::user()->id_user)->firstOrFail();

        if ($request->hasFile('gambar_product')) {
            $imageName = time().'.'.$request->gambar_product->extension();  
            $request->gambar_product->move(public_path('assets/img/products'), $imageName);
            $product->gambar_product = 'assets/img/products/' . $imageName;
        }

        $product->nama_product = $request->nama_product;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kategori = $request->kategori;
        $product->status_product = $request->status_product;
        $product->save();

        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Produk::where('id_product', $id)->where('penjual_id', Auth::user()->id_user)->firstOrFail();
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
