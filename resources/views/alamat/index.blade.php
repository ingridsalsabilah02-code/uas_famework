@extends('layouts.app')
@section('title', 'Data Alamat')

@section('content')
<div class="card">
    <h3>Data Alamat</h3>
    <a href="{{ route('alamat.create') }}" class="btn btn-primary" style="margin-bottom:15px;">+ Tambah Alamat</a>
    <table>
        <thead>
            <tr><th>No</th><th>Provinsi</th><th>Kabupaten</th><th>Kecamatan</th><th>Desa</th><th>RT/RW</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($alamats as $i => $alamat)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $alamat->provinsi->nama_provinsi }}</td>
                <td>{{ $alamat->kabupaten }}</td>
                <td>{{ $alamat->kecamatan }}</td>
                <td>{{ $alamat->desa }}</td>
                <td>{{ $alamat->rt }}/{{ $alamat->rw }}</td>
                <td class="action-buttons">
                    <a href="{{ route('alamat.edit', $alamat) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('alamat.destroy', $alamat) }}" method="POST" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
