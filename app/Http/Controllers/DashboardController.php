<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\Keluarga;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProvinsi = Provinsi::count();
        $totalAlamat = Alamat::count();
        $totalKeluarga = Keluarga::count();
        $totalPenduduk = Penduduk::count();

        $pendudukLaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $pendudukPerempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();

        $recentPenduduk = Penduduk::with('keluarga.alamat.provinsi')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProvinsi', 'totalAlamat', 'totalKeluarga', 'totalPenduduk',
            'pendudukLaki', 'pendudukPerempuan', 'recentPenduduk'
        ));
    }
}
