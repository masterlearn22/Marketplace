<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_product';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // We don't have created_at/updated_at in ERD

    protected $fillable = [
        'id_product', 'penjual_id', 'nama_product', 'deskripsi', 'harga', 'stok', 'kategori', 'gambar_product', 'status_product',
    ];
}
