@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

<div class="dashboard-header">
    <h1>📊 Sistem Penduduk Desa</h1>
    <p>
        Kelola data penduduk, keluarga, alamat dan provinsi dalam satu sistem.
    </p>
</div>

<div class="dashboard-cards">

    <div class="info-card">
        <div class="icon">👤</div>
        <div>
            <h2>{{ $totalPenduduk }}</h2>
            <p>Total Penduduk</p>
        </div>
    </div>

    <div class="info-card">
        <div class="icon">👨‍👩‍👧‍👦</div>
        <div>
            <h2>{{ $totalKeluarga }}</h2>
            <p>Total Keluarga</p>
        </div>
    </div>

    <div class="info-card">
        <div class="icon">📍</div>
        <div>
            <h2>{{ $totalAlamat }}</h2>
            <p>Total Alamat</p>
        </div>
    </div>

    <div class="info-card">
        <div class="icon">🗺️</div>
        <div>
            <h2>{{ $totalProvinsi }}</h2>
            <p>Total Provinsi</p>
        </div>
    </div>

</div>

<div class="dashboard-grid">

    <div class="card">

        <h3>📈 Statistik Jenis Kelamin</h3>

        @php
            $lakiPersen = $totalPenduduk > 0
                ? ($pendudukLaki / $totalPenduduk) * 100
                : 0;

            $perempuanPersen = $totalPenduduk > 0
                ? ($pendudukPerempuan / $totalPenduduk) * 100
                : 0;
        @endphp

        <label>Laki-laki ({{ $pendudukLaki }} Orang)</label>

        <div class="progress">
            <div class="progress-blue"
                 style="width: {{ $lakiPersen }}%">
                {{ round($lakiPersen) }}%
            </div>
        </div>

        <br>

        <label>Perempuan ({{ $pendudukPerempuan }} Orang)</label>

        <div class="progress">
            <div class="progress-green"
                 style="width: {{ $perempuanPersen }}%">
                {{ round($perempuanPersen) }}%
            </div>
        </div>

    </div>

    <div class="card">

        <h3>ℹ️ Informasi Sistem</h3>

        <table>
            <tr>
                <td><strong>Nama Sistem</strong></td>
                <td>Sistem Penduduk Desa</td>
            </tr>
            <tr>
                <td><strong>Versi</strong></td>
                <td>1.0.0</td>
            </tr>
            <tr>
                <td><strong>Database</strong></td>
                <td>SQLite</td>
            </tr>
            <tr>
                <td><strong>Framework</strong></td>
                <td>Laravel 12</td>
            </tr>
        </table>

    </div>

</div>

<div class="card">

    <h3>📋 Data Penduduk Terbaru</h3>

    <table>

        <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Desa</th>
            <th>Provinsi</th>
        </tr>
        </thead>

        <tbody>

        @forelse($recentPenduduk as $p)

            <tr>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->keluarga->alamat->desa ?? '-' }}</td>
                <td>{{ $p->keluarga->alamat->provinsi->nama_provinsi ?? '-' }}</td>
            </tr>

        @empty

            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada data penduduk
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection