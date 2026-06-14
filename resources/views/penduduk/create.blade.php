@extends('layouts.app')
@section('title', 'Tambah Penduduk')

@section('content')
<div class="card">
    <h3>Tambah Data Penduduk</h3>
    <form action="{{ route('penduduk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Keluarga (No KK)</label>
            <select name="keluarga_id" required>
                <option value="">-- Pilih --</option>
                @foreach($keluargas as $kel)
                    <option value="{{ $kel->id }}" {{ old('keluarga_id') == $kel->id ? 'selected' : '' }}>{{ $kel->no_kk }} - {{ $kel->kepala_keluarga }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>NIK (16 digit)</label><input type="text" name="nik" value="{{ old('nik') }}" required maxlength="16"></div>
        <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama" value="{{ old('nama') }}" required></div>
        <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required></div>
        <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required></div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select name="agama" required>
                <option value="">-- Pilih --</option>
                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
                    <option value="{{ $agm }}" {{ old('agama') == $agm ? 'selected' : '' }}>{{ $agm }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}"></div>
        <div class="form-group">
            <label>Status Perkawinan</label>
            <select name="status_perkawinan" required>
                @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $sp)
                    <option value="{{ $sp }}" {{ old('status_perkawinan') == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <select name="pendidikan" required>
                @foreach(['Tidak Sekolah','SD','SMP','SMA','D3','S1','S2','S3'] as $pend)
                    <option value="{{ $pend }}" {{ old('pendidikan') == $pend ? 'selected' : '' }}>{{ $pend }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Hubungan Dalam Keluarga</label>
            <select name="hubungan_keluarga" required>
                @foreach(['Kepala Keluarga','Istri','Anak','Orang Tua','Lainnya'] as $hub)
                    <option value="{{ $hub }}" {{ old('hubungan_keluarga') == $hub ? 'selected' : '' }}>{{ $hub }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penduduk.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
