@extends('layouts.app')
@section('title', 'Edit Provinsi')

@section('content')
<div class="card">
    <h3>Edit Provinsi</h3>
    <form action="{{ route('provinsi.update', $provinsi) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Kode Provinsi</label>
            <input type="text" name="kode_provinsi" value="{{ old('kode_provinsi', $provinsi->kode_provinsi) }}" required>
        </div>
        <div class="form-group">
            <label>Nama Provinsi</label>
            <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi', $provinsi->nama_provinsi) }}" required>
        </div>
        <div class="form-group">
            <label>Jumlah Kabupaten</label>
            <input type="number" name="jumlah_kabupaten" value="{{ old('jumlah_kabupaten', $provinsi->jumlah_kabupaten) }}" required min="0">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('provinsi.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
