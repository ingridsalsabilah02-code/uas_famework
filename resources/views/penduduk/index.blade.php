@extends('layouts.app')
@section('title', 'Data Penduduk')

@section('content')
<div class="card">
    <h3>Data Penduduk</h3>
    <a href="{{ route('penduduk.create') }}" class="btn btn-primary" style="margin-bottom:15px;">+ Tambah Penduduk</a>
    <table>
        <thead>
            <tr><th>No</th><th>NIK</th><th>Nama</th><th>L/P</th><th>No KK</th><th>Pekerjaan</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($penduduks as $i => $p)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $p->keluarga->no_kk }}</td>
                <td>{{ $p->pekerjaan ?? '-' }}</td>
                <td class="action-buttons">
                    <a href="{{ route('penduduk.show', $p) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('penduduk.edit', $p) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penduduk.destroy', $p) }}" method="POST" onsubmit="return confirm('Yakin?')">
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
