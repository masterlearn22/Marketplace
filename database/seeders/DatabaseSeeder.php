<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert Penjual
        $penjualId = 'USR-' . Str::random(8);
        DB::table('users')->insert([
            'id_user' => $penjualId,
            'nama_user' => 'Ardiles Official Store',
            'email' => 'penjual@runmarket.com',
            'password' => Hash::make('password123'),
            'role' => 'penjual',
            'tgl_daftar' => now(),
            'foto_profil' => null,
            'status_user' => 'aktif',
        ]);

        // Insert Pembeli for testing
        $pembeliId = 'USR-' . Str::random(8);
        DB::table('users')->insert([
            'id_user' => $pembeliId,
            'nama_user' => 'Surya Pembeli',
            'email' => 'pembeli@runmarket.com',
            'password' => Hash::make('password123'),
            'role' => 'pembeli',
            'tgl_daftar' => now(),
            'foto_profil' => null,
            'status_user' => 'aktif',
        ]);

        // 2. Insert 5 Produk Dummy
        $products = [
            [
                'id_product' => 'PRD-' . Str::random(6),
                'penjual_id' => $penjualId,
                'nama_product' => 'Ardiles Nfinity Raiton Pro',
                'deskripsi' => 'Sepatu lari Ardiles Raiton terbaik untuk racing.',
                'harga' => 449000,
                'stok' => 50,
                'kategori' => 'Road Running',
                'gambar_product' => 'assets/img/products/Ardiles/3.jpg',
                'status_product' => 'tersedia',
            ],
            [
                'id_product' => 'PRD-' . Str::random(6),
                'penjual_id' => $penjualId,
                'nama_product' => 'Ardiles Nfinity Raiton Elite',
                'deskripsi' => 'Sepatu lari jarak jauh dengan kenyamanan ekstra.',
                'harga' => 599000,
                'stok' => 20,
                'kategori' => 'Road Running',
                'gambar_product' => 'assets/img/products/Ardiles/3.jpg',
                'status_product' => 'tersedia',
            ],
            [
                'id_product' => 'PRD-' . Str::random(6),
                'penjual_id' => $penjualId,
                'nama_product' => 'Ardiles Nfinity Sprint',
                'deskripsi' => 'Sepatu lari cepat dan ringan.',
                'harga' => 350000,
                'stok' => 15,
                'kategori' => 'Sprint',
                'gambar_product' => 'assets/img/products/Ardiles/3.jpg',
                'status_product' => 'tersedia',
            ],
            [
                'id_product' => 'PRD-' . Str::random(6),
                'penjual_id' => $penjualId,
                'nama_product' => 'Ardiles Nfinity Marathon',
                'deskripsi' => 'Didesain khusus untuk lari marathon.',
                'harga' => 750000,
                'stok' => 5,
                'kategori' => 'Marathon',
                'gambar_product' => 'assets/img/products/Ardiles/3.jpg',
                'status_product' => 'tersedia',
            ],
            [
                'id_product' => 'PRD-' . Str::random(6),
                'penjual_id' => $penjualId,
                'nama_product' => 'Ardiles Nfinity Trail',
                'deskripsi' => 'Sepatu lari trail tangguh untuk semua medan.',
                'harga' => 620000,
                'stok' => 30,
                'kategori' => 'Trail Running',
                'gambar_product' => 'assets/img/products/Ardiles/3.jpg',
                'status_product' => 'tersedia',
            ]
        ];

        DB::table('produk')->insert($products);
    }
}
