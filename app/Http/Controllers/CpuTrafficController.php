<?php

namespace App\Http\Controllers;

class CpuTrafficController extends Controller
{
    public function getCpuTrafficData()
    {
        // Di sini Anda dapat melakukan logika untuk mengambil data CPU traffic
        // Contoh sederhana: kita akan menghasilkan angka acak antara 0 dan 100 sebagai data CPU traffic
        $cpuTraffic = rand(0, 100);

        // Mengembalikan data dalam format JSON
        return response()->json(['cpu_traffic' => $cpuTraffic]);
    }
}
