@extends('layouts.app')
@section('title', 'Data Provinsi')

@section('content')
<div class="card">
    <h3>Data Provinsi</h3>
    <a href="{{ route('provinsi.create') }}" class="btn btn-primary" style="margin-bottom:15px;">+ Tambah Provinsi</a>
    <table>
        <thead>
            <tr><th>No</th><th>Kode</th><th>Nama Provinsi</th><th>Jml Kabupaten</th><th>Jml Alamat</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($provinsis as $i => $prov)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $prov->kode_provinsi }}</td>
                <td>{{ $prov->nama_provinsi }}</td>
                <td>{{ $prov->jumlah_kabupaten }}</td>
                <td>{{ $prov->alamats_count }}</td>
                <td class="action-buttons">
                    <a href="{{ route('provinsi.edit', $prov) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('provinsi.destroy', $prov) }}" method="POST" onsubmit="return confirm('Yakin?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
