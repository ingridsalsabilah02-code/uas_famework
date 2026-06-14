@extends('layouts.app')
@section('title', 'Detail Keluarga')

@section('content')
<div class="card">
    <h3>Detail Keluarga</h3>
    <table>
        <tr><td><strong>No KK</strong></td><td>: {{ $keluarga->no_kk }}</td></tr>
        <tr><td><strong>Kepala Keluarga</strong></td><td>: {{ $keluarga->kepala_keluarga }}</td></tr>
        <tr><td><strong>Alamat</strong></td><td>: {{ $keluarga->alamat->detail_alamat ?? $keluarga->alamat->desa }}, RT {{ $keluarga->alamat->rt }}/RW {{ $keluarga->alamat->rw }}</td></tr>
        <tr><td><strong>Desa/Kecamatan</strong></td><td>: {{ $keluarga->alamat->desa }}, {{ $keluarga->alamat->kecamatan }}</td></tr>
        <tr><td><strong>Kabupaten/Provinsi</strong></td><td>: {{ $keluarga->alamat->kabupaten }}, {{ $keluarga->alamat->provinsi->nama_provinsi }}</td></tr>
        <tr><td><strong>Status Ekonomi</strong></td><td>: {{ $keluarga->status_ekonomi }}</td></tr>
    </table>
</div>

<div class="card">
    <h3>Anggota Keluarga ({{ $keluarga->penduduks->count() }} orang)</h3>
    <table>
        <thead><tr><th>No</th><th>NIK</th><th>Nama</th><th>L/P</th><th>Hubungan</th><th>Pekerjaan</th></tr></thead>
        <tbody>
            @forelse($keluarga->penduduks as $i => $p)
            <tr>
                <td>{{ $i+1 }}</td><td>{{ $p->nik }}</td><td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $p->hubungan_keluarga }}</td><td>{{ $p->pekerjaan ?? '-' }}</td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;">Belum ada anggota.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<a href="{{ route('keluarga.index') }}" class="btn btn-primary">← Kembali</a>
@endsection
