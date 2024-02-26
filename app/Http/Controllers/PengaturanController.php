<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //
    public function index()
    {
        $init_pengaturan = Pengaturan::all();
        $data['pengatuan'] = [];
        foreach ($init_pengaturan as $value) {
            $data['pengaturan'][$value->key] = $value->value;
        }


        return view('pengaturan.index', $data);
    }

    public function update(Request $request)
    {
        Pengaturan::where('key', 'nama_perusahaan')->update([
            'value' => $request->nama_perusahaan,
        ]);

        Pengaturan::where('key', 'alamat')->update([
            'value' => $request->alamat,
        ]);

        Pengaturan::where('key', 'telepon')->update([
            'value' => $request->telepon,
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('web', 'public');
            Pengaturan::where('key', 'logo')->update([
                'value' => $logo,
            ]);
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon')->store('web', 'public');
            Pengaturan::where('key', 'favicon')->update([
                'value' => $favicon,
            ]);
        }

        return redirect()->back()->with('success', 'Setting has been updated');
    }
}
