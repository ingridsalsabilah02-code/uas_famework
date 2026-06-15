<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');

        $penduduks = Penduduk::with('keluarga.alamat.provinsi')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('nik', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('penduduk.index', compact('penduduks', 'search'));
    }

    public function create()
    {
        $keluargas = Keluarga::with('alamat.provinsi')->get();
        return view('penduduk.create', compact('keluargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keluarga_id'        => 'required|exists:keluargas,id',
            'nik'                => 'required|string|size:16|unique:penduduks',
            'nama'               => 'required|string|max:255',
            'tempat_lahir'       => 'required|string|max:100',
            'tanggal_lahir'      => 'required|date',
            'jenis_kelamin'      => 'required|in:Laki-laki,Perempuan',
            'agama'              => 'required|string',
            'status_perkawinan'  => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan'         => 'required|in:Tidak Sekolah,SD,SMP,SMA,D3,S1,S2,S3',
            'hubungan_keluarga'  => 'required|in:Kepala Keluarga,Istri,Anak,Orang Tua,Lainnya',
        ]);

        $penduduk = Penduduk::create($request->all());
        
        $penduduk->keluarga->syncJumlahAnggota();

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function show(Penduduk $penduduk)
    {
        $penduduk->load('keluarga.alamat.provinsi');
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        $keluargas = Keluarga::with('alamat.provinsi')->get();
        return view('penduduk.edit', compact('penduduk', 'keluargas'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'keluarga_id'        => 'required|exists:keluargas,id',
            'nik'                => 'required|string|size:16|unique:penduduks,nik,' . $penduduk->id,
            'nama'               => 'required|string|max:255',
            'tempat_lahir'       => 'required|string|max:100',
            'tanggal_lahir'      => 'required|date',
            'jenis_kelamin'      => 'required|in:Laki-laki,Perempuan',
            'agama'              => 'required|string',
            'status_perkawinan'  => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan'         => 'required|in:Tidak Sekolah,SD,SMP,SMA,D3,S1,S2,S3',
            'hubungan_keluarga'  => 'required|in:Kepala Keluarga,Istri,Anak,Orang Tua,Lainnya',
        ]);

        $oldKeluargaId = $penduduk->keluarga_id;
        $penduduk->update($request->all());

        if ($oldKeluargaId != $request->keluarga_id) {
            Keluarga::find($oldKeluargaId)?->syncJumlahAnggota();
        }
        $penduduk->keluarga->syncJumlahAnggota();

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $keluarga = $penduduk->keluarga;
        $penduduk->delete();
        $keluarga->syncJumlahAnggota();

        return redirect()->route('penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus.');
    }
}