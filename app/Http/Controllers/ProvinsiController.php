<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::withCount('alamats')->get();
        return view('provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required|string|max:255',
            'kode_provinsi' => 'required|string|unique:provinsis',
            'jumlah_kabupaten' => 'required|integer|min:0',
        ]);

        Provinsi::create($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate([
            'nama_provinsi' => 'required|string|max:255',
            'kode_provinsi' => 'required|string|unique:provinsis,kode_provinsi,' . $provinsi->id,
            'jumlah_kabupaten' => 'required|integer|min:0',
        ]);

        $provinsi->update($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diupdate.');
    }

    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }
}
