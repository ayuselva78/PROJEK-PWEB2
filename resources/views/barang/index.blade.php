@extends('layouts.app')
@section('title', 'Data Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Data Barang</h2>
    <a href="{{ route('barang.create') }}" class="btn btn-success">+ Tambah Barang</a>
</div>

<table class="table table-hover table-striped table-bordered shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Satuan</th> <!-- Tambahan -->
            <th width="150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($barangs as $barang)
        <tr>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->stok }}</td>
            <td>{{ $barang->satuan }}</td> <!-- Tambahan -->
            <td>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Data barang belum tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>
@endsection