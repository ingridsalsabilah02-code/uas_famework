<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = Penduduk::with('keluarga.alamat.provinsi')->get();
        return view('penduduk.index', compact('penduduks'));
    }

    public function create()
    {
        $keluargas = Keluarga::all();
        return view('penduduk.create', compact('keluargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keluarga_id' => 'required|exists:keluargas,id',
            'nik' => 'required|string|size:16|unique:penduduks',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'hubungan_keluarga' => 'required',
        ]);

        Penduduk::create($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil ditambahkan.');
    }

    public function show(Penduduk $penduduk)
    {
        $penduduk->load('keluarga.alamat.provinsi');
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        $keluargas = Keluarga::all();
        return view('penduduk.edit', compact('penduduk', 'keluargas'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'keluarga_id' => 'required|exists:keluargas,id',
            'nik' => 'required|string|size:16|unique:penduduks,nik,' . $penduduk->id,
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'hubungan_keluarga' => 'required',
        ]);

        $penduduk->update($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil diupdate.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil dihapus.');
    }
}
