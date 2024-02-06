<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pengaturan::create([
            'key' => 'nama_perusahaan',
            'value' => 'Laravel POS',
        ]);

        Pengaturan::create([
            'key' => 'alamat',
            'value' => 'Jl. Pemuda',
        ]);

        Pengaturan::create([
            'key' => 'telepon',
            'value' => '08123456789',
        ]);

        Pengaturan::create([
            'key' => 'tipe_nota',
            'value' => 'faktur',
        ]);

        Pengaturan::create([
            'key' => 'diskon',
            'value' => 0,
        ]);

        Pengaturan::create([
            'key' => 'logo',
            'value' => null,
        ]);

        Pengaturan::create([
            'key' => 'kartu_member',
            'value' => null,
        ]);
    }
}
