<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Alamat;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index()
    {
        $keluargas = Keluarga::with('alamat.provinsi')->get();
        return view('keluarga.index', compact('keluargas'));
    }

    public function create()
    {
        $alamats = Alamat::with('provinsi')->get();
        return view('keluarga.create', compact('alamats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_id' => 'required|exists:alamats,id',
            'no_kk' => 'required|string|size:16|unique:keluargas',
            'kepala_keluarga' => 'required|string',
            'jumlah_anggota' => 'required|integer|min:1',
            'status_ekonomi' => 'required|in:Mampu,Menengah,Kurang Mampu',
        ]);

        Keluarga::create($request->all());
        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil ditambahkan.');
    }

    public function show(Keluarga $keluarga)
    {
        $keluarga->load('alamat.provinsi', 'penduduks');
        return view('keluarga.show', compact('keluarga'));
    }

    public function edit(Keluarga $keluarga)
    {
        $alamats = Alamat::with('provinsi')->get();
        return view('keluarga.edit', compact('keluarga', 'alamats'));
    }

    public function update(Request $request, Keluarga $keluarga)
    {
        $request->validate([
            'alamat_id' => 'required|exists:alamats,id',
            'no_kk' => 'required|string|size:16|unique:keluargas,no_kk,' . $keluarga->id,
            'kepala_keluarga' => 'required|string',
            'jumlah_anggota' => 'required|integer|min:1',
            'status_ekonomi' => 'required|in:Mampu,Menengah,Kurang Mampu',
        ]);

        $keluarga->update($request->all());
        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil diupdate.');
    }

    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();
        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil dihapus.');
    }
}
