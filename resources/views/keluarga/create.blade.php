@extends('layouts.app')
@section('title', 'Tambah Keluarga')

@section('content')
<div class="card">
    <h3>Tambah Data Keluarga</h3>
    <form action="{{ route('keluarga.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Alamat</label>
            <select name="alamat_id" required>
                <option value="">-- Pilih Alamat --</option>
                @foreach($alamats as $alm)
                    <option value="{{ $alm->id }}" {{ old('alamat_id') == $alm->id ? 'selected' : '' }}>
                        {{ $alm->desa }}, {{ $alm->kecamatan }} - {{ $alm->provinsi->nama_provinsi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>No Kartu Keluarga (16 digit)</label><input type="text" name="no_kk" value="{{ old('no_kk') }}" required maxlength="16"></div>
        <div class="form-group"><label>Nama Kepala Keluarga</label><input type="text" name="kepala_keluarga" value="{{ old('kepala_keluarga') }}" required></div>
        <div class="form-group"><label>Jumlah Anggota</label><input type="number" name="jumlah_anggota" value="{{ old('jumlah_anggota', 1) }}" required min="1"></div>
        <div class="form-group">
            <label>Status Ekonomi</label>
            <select name="status_ekonomi" required>
                <option value="Mampu" {{ old('status_ekonomi') == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                <option value="Menengah" {{ old('status_ekonomi') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                <option value="Kurang Mampu" {{ old('status_ekonomi') == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('keluarga.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
