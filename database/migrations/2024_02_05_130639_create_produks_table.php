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
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('kode');
            $table->string('nama');
            $table->string('slug');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->integer('min_stok');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('diskon')->default(0);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
