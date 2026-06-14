@extends('layouts.app')
@section('title', 'Tambah Alamat')

@section('content')
<div class="card">
    <h3>Tambah Alamat</h3>
    <form action="{{ route('alamat.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Provinsi</label>
            <select name="provinsi_id" required>
                <option value="">-- Pilih Provinsi --</option>
                @foreach($provinsis as $prov)
                    <option value="{{ $prov->id }}" {{ old('provinsi_id') == $prov->id ? 'selected' : '' }}>{{ $prov->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Kabupaten</label><input type="text" name="kabupaten" value="{{ old('kabupaten') }}" required></div>
        <div class="form-group"><label>Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan') }}" required></div>
        <div class="form-group"><label>Desa</label><input type="text" name="desa" value="{{ old('desa') }}" required></div>
        <div class="form-group"><label>RT</label><input type="text" name="rt" value="{{ old('rt') }}" required></div>
        <div class="form-group"><label>RW</label><input type="text" name="rw" value="{{ old('rw') }}" required></div>
        <div class="form-group"><label>Detail Alamat (opsional)</label><textarea name="detail_alamat">{{ old('detail_alamat') }}</textarea></div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('alamat.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
