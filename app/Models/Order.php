<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // Using tgl_order instead

    protected $fillable = [
        'id_order', 'pembeli_id', 'product_id', 'kuantitas', 'tgl_order', 'total_harga', 'status_order', 'alamat_pengiriman', 'bukti_bayar',
    ];

    public function product()
    {
        return $this->belongsTo(Produk::class, 'product_id', 'id_product');
    }
    
    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id', 'id_user');
    }
}
