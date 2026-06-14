@extends('layouts.app')
@section('title', 'Tambah Provinsi')

@section('content')
<div class="card">
    <h3>Tambah Provinsi</h3>
    <form action="{{ route('provinsi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Provinsi</label>
            <input type="text" name="kode_provinsi" value="{{ old('kode_provinsi') }}" required placeholder="Contoh: 01">
        </div>
        <div class="form-group">
            <label>Nama Provinsi</label>
            <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi') }}" required>
        </div>
        <div class="form-group">
            <label>Jumlah Kabupaten</label>
            <input type="number" name="jumlah_kabupaten" value="{{ old('jumlah_kabupaten', 0) }}" required min="0">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('provinsi.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
