@extends('layouts.app')
@section('title', 'Edit Keluarga')

@section('content')
<div class="card">
    <h3>Edit Data Keluarga</h3>
    <form action="{{ route('keluarga.update', $keluarga) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Alamat</label>
            <select name="alamat_id" required>
                @foreach($alamats as $alm)
                    <option value="{{ $alm->id }}" {{ old('alamat_id', $keluarga->alamat_id) == $alm->id ? 'selected' : '' }}>
                        {{ $alm->desa }}, {{ $alm->kecamatan }} - {{ $alm->provinsi->nama_provinsi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>No KK</label><input type="text" name="no_kk" value="{{ old('no_kk', $keluarga->no_kk) }}" required maxlength="16"></div>
        <div class="form-group"><label>Kepala Keluarga</label><input type="text" name="kepala_keluarga" value="{{ old('kepala_keluarga', $keluarga->kepala_keluarga) }}" required></div>
        <div class="form-group"><label>Jumlah Anggota</label><input type="number" name="jumlah_anggota" value="{{ old('jumlah_anggota', $keluarga->jumlah_anggota) }}" required min="1"></div>
        <div class="form-group">
            <label>Status Ekonomi</label>
            <select name="status_ekonomi" required>
                <option value="Mampu" {{ old('status_ekonomi', $keluarga->status_ekonomi) == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                <option value="Menengah" {{ old('status_ekonomi', $keluarga->status_ekonomi) == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                <option value="Kurang Mampu" {{ old('status_ekonomi', $keluarga->status_ekonomi) == 'Kurang Mampu' ? 'selected' : '' }}>Kurang Mampu</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('keluarga.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
