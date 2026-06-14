<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function index()
    {
        $alamats = Alamat::with('provinsi')->get();
        return view('alamat.index', compact('alamats'));
    }

    public function create()
    {
        $provinsis = Provinsi::all();
        return view('alamat.create', compact('provinsis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ]);

        Alamat::create($request->all());
        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function edit(Alamat $alamat)
    {
        $provinsis = Provinsi::all();
        return view('alamat.edit', compact('alamat', 'provinsis'));
    }

    public function update(Request $request, Alamat $alamat)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ]);

        $alamat->update($request->all());
        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil diupdate.');
    }

    public function destroy(Alamat $alamat)
    {
        $alamat->delete();
        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil dihapus.');
    }
}
