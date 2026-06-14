@extends('layouts.app')
@section('title', 'Data Keluarga')

@section('content')
<div class="card">
    <h3>Data Keluarga</h3>
    <a href="{{ route('keluarga.create') }}" class="btn btn-primary" style="margin-bottom:15px;">+ Tambah Keluarga</a>
    <table>
        <thead>
            <tr><th>No</th><th>No KK</th><th>Kepala Keluarga</th><th>Desa</th><th>Anggota</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($keluargas as $i => $kel)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $kel->no_kk }}</td>
                <td>{{ $kel->kepala_keluarga }}</td>
                <td>{{ $kel->alamat->desa ?? '-' }}</td>
                <td>{{ $kel->jumlah_anggota }}</td>
                <td>
                    @if($kel->status_ekonomi == 'Mampu')
                        <span class="badge badge-success">{{ $kel->status_ekonomi }}</span>
                    @elseif($kel->status_ekonomi == 'Menengah')
                        <span class="badge badge-warning">{{ $kel->status_ekonomi }}</span>
                    @else
                        <span class="badge badge-danger">{{ $kel->status_ekonomi }}</span>
                    @endif
                </td>
                <td class="action-buttons">
                    <a href="{{ route('keluarga.show', $kel) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('keluarga.edit', $kel) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('keluarga.destroy', $kel) }}" method="POST" onsubmit="return confirm('Yakin?')">
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
