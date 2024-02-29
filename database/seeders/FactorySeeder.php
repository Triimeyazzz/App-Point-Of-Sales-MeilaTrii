<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pelanggan::factory(100)->create();
        Supplier::factory(50)->create();
        Kategori::factory(10)->create();
        Brand::factory(10)->create();
        Unit::factory(10)->create();
        Produk::factory(100)->create();
    }
}
