@extends('layouts.app')
@section('title', 'Detail Penduduk')

@section('content')
<div class="card">
    <h3>Detail Penduduk</h3>
    <table>
        <tr><td><strong>NIK</strong></td><td>: {{ $penduduk->nik }}</td></tr>
        <tr><td><strong>Nama</strong></td><td>: {{ $penduduk->nama }}</td></tr>
        <tr><td><strong>Tempat/Tgl Lahir</strong></td><td>: {{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir }}</td></tr>
        <tr><td><strong>Jenis Kelamin</strong></td><td>: {{ $penduduk->jenis_kelamin }}</td></tr>
        <tr><td><strong>Agama</strong></td><td>: {{ $penduduk->agama }}</td></tr>
        <tr><td><strong>Pekerjaan</strong></td><td>: {{ $penduduk->pekerjaan ?? '-' }}</td></tr>
        <tr><td><strong>Pendidikan</strong></td><td>: {{ $penduduk->pendidikan }}</td></tr>
        <tr><td><strong>Status Perkawinan</strong></td><td>: {{ $penduduk->status_perkawinan }}</td></tr>
        <tr><td><strong>Hubungan Keluarga</strong></td><td>: {{ $penduduk->hubungan_keluarga }}</td></tr>
    </table>
</div>

<div class="card">
    <h3>Informasi Keluarga & Alamat</h3>
    <table>
        <tr><td><strong>No KK</strong></td><td>: {{ $penduduk->keluarga->no_kk }}</td></tr>
        <tr><td><strong>Kepala Keluarga</strong></td><td>: {{ $penduduk->keluarga->kepala_keluarga }}</td></tr>
        <tr><td><strong>Desa</strong></td><td>: {{ $penduduk->keluarga->alamat->desa }}</td></tr>
        <tr><td><strong>Kecamatan</strong></td><td>: {{ $penduduk->keluarga->alamat->kecamatan }}</td></tr>
        <tr><td><strong>Kabupaten</strong></td><td>: {{ $penduduk->keluarga->alamat->kabupaten }}</td></tr>
        <tr><td><strong>Provinsi</strong></td><td>: {{ $penduduk->keluarga->alamat->provinsi->nama_provinsi }}</td></tr>
    </table>
</div>
<a href="{{ route('penduduk.index') }}" class="btn btn-primary">← Kembali</a>
@endsection
