@extends('layouts.app')
@section('title', 'Edit Alamat')

@section('content')
<div class="card">
    <h3>Edit Alamat</h3>
    <form action="{{ route('alamat.update', $alamat) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Provinsi</label>
            <select name="provinsi_id" required>
                @foreach($provinsis as $prov)
                    <option value="{{ $prov->id }}" {{ old('provinsi_id', $alamat->provinsi_id) == $prov->id ? 'selected' : '' }}>{{ $prov->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Kabupaten</label><input type="text" name="kabupaten" value="{{ old('kabupaten', $alamat->kabupaten) }}" required></div>
        <div class="form-group"><label>Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan', $alamat->kecamatan) }}" required></div>
        <div class="form-group"><label>Desa</label><input type="text" name="desa" value="{{ old('desa', $alamat->desa) }}" required></div>
        <div class="form-group"><label>RT</label><input type="text" name="rt" value="{{ old('rt', $alamat->rt) }}" required></div>
        <div class="form-group"><label>RW</label><input type="text" name="rw" value="{{ old('rw', $alamat->rw) }}" required></div>
        <div class="form-group"><label>Detail Alamat</label><textarea name="detail_alamat">{{ old('detail_alamat', $alamat->detail_alamat) }}</textarea></div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('alamat.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
