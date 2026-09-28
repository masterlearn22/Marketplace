<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Produk::where('status_product', 'tersedia')->inRandomOrder()->take(4)->get();
        return view('welcome', compact('featuredProducts'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function katalog()
    {
        $products = Produk::where('status_product', 'tersedia')->get();
        return view('katalog', compact('products'));
    }

    public function produk($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk', compact('product'));
    }

    public function keranjang()
    {
        return view('keranjang');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function orders()
    {
        return view('orders');
    }

    public function products()
    {
        $products = Produk::where('penjual_id', auth()->user()->id_user)->get();
        return view('products', compact('products'));
    }
}
