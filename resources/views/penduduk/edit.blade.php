@extends('layouts.app')
@section('title', 'Edit Penduduk')

@section('content')
<div class="card">
    <h3>Edit Data Penduduk</h3>
    <form action="{{ route('penduduk.update', $penduduk) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Keluarga (No KK)</label>
            <select name="keluarga_id" required>
                @foreach($keluargas as $kel)
                    <option value="{{ $kel->id }}" {{ old('keluarga_id', $penduduk->keluarga_id) == $kel->id ? 'selected' : '' }}>{{ $kel->no_kk }} - {{ $kel->kepala_keluarga }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>NIK</label><input type="text" name="nik" value="{{ old('nik', $penduduk->nik) }}" required maxlength="16"></div>
        <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama" value="{{ old('nama', $penduduk->nama) }}" required></div>
        <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required></div>
        <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}" required></div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select name="agama" required>
                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agm)
                    <option value="{{ $agm }}" {{ old('agama', $penduduk->agama) == $agm ? 'selected' : '' }}>{{ $agm }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"></div>
        <div class="form-group">
            <label>Status Perkawinan</label>
            <select name="status_perkawinan" required>
                @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $sp)
                    <option value="{{ $sp }}" {{ old('status_perkawinan', $penduduk->status_perkawinan) == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan</label>
            <select name="pendidikan" required>
                @foreach(['Tidak Sekolah','SD','SMP','SMA','D3','S1','S2','S3'] as $pend)
                    <option value="{{ $pend }}" {{ old('pendidikan', $penduduk->pendidikan) == $pend ? 'selected' : '' }}>{{ $pend }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Hubungan Dalam Keluarga</label>
            <select name="hubungan_keluarga" required>
                @foreach(['Kepala Keluarga','Istri','Anak','Orang Tua','Lainnya'] as $hub)
                    <option value="{{ $hub }}" {{ old('hubungan_keluarga', $penduduk->hubungan_keluarga) == $hub ? 'selected' : '' }}>{{ $hub }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penduduk.index') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endsection
