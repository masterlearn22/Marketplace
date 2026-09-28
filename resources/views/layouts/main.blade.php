<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RunMarket - Toko Sepatu Lari')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/app-pages.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="@yield('body-class')">
    
    <div class="navbar-bg-wrapper">
        <header class="navbar">
            <div class="nav-container">
                <!-- Logo -->
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 16L10 10L14 14L20 6" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    RunMarket<span style="color: var(--primary-red);">.</span>
                </a>

                <!-- Navigation Links -->
                <nav>
                    <ul class="nav-links">
                        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                        <li><a href="/katalog" class="{{ request()->is('katalog') ? 'active' : '' }}">Katalog</a></li>
                        @auth
                            <li><a href="/orders" class="{{ request()->is('orders') ? 'active' : '' }}">Order</a></li>
                            @if(auth()->user()->role === 'penjual')
                                <li><a href="/products" class="{{ request()->is('products') ? 'active' : '' }}">Manajemen Produk</a></li>
                            @endif
                        @endauth
                    </ul>
                </nav>

                <!-- Actions -->
                <div class="nav-actions">
                    <a href="/keranjang" class="cart-btn" style="position: relative;">
                        <i class="fas fa-shopping-cart"></i>
                        @if(!request()->is('/') && !request()->is('login') && !request()->is('register'))
                            <span class="cart-badge">{{ count(session('cart', [])) }}</span>
                        @endif
                    </a>
                    @auth
                        <form action="/logout" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="login-btn" style="text-transform: uppercase; background: transparent; border: 1px solid var(--border-color); color: var(--text-dark); cursor: pointer;">{{ auth()->user()->nama_user }} (Logout)</button>
                        </form>
                    @else
                        <a href="/login" class="login-btn">Masuk</a>
                    @endauth
                </div>
            </div>
        </header>
    </div>

    @yield('content')

</body>
</html>
