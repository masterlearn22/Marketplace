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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_product', 10)->primary();
            $table->string('penjual_id', 12);
            $table->string('nama_product', 255);
            $table->string('deskripsi', 1054);
            $table->integer('harga');
            $table->integer('stok');
            $table->string('kategori', 255);
            $table->string('gambar_product', 255)->nullable();
            $table->enum('status_product', ['tersedia', 'habis'])->default('tersedia');

            $table->foreign('penjual_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
