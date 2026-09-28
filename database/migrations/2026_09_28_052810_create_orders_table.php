<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('id_order', 8)->primary();
            $table->string('pembeli_id', 12);
            $table->string('product_id', 10);
            $table->integer('kuantitas')->default(1);
            $table->timestamp('tgl_order')->useCurrent();
            $table->integer('total_harga');
            $table->enum('status_order', ['menunggu_bayar', 'menunggu_konfirmasi', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('menunggu_bayar');
            $table->string('alamat_pengiriman', 1054);
            $table->string('bukti_bayar', 1054)->nullable();

            $table->foreign('pembeli_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id_product')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
