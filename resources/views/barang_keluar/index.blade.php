@extends('layouts.app')
@section('title', 'Barang Keluar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Data Barang Keluar</h2>
    <a href="{{ route('barang-keluar.create') }}" class="btn btn-success">+ Tambah Barang Keluar</a>
</div>

<table class="table table-hover table-striped table-bordered shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Tanggal</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th> <!-- Tambahan -->
            <th width="150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $keluar)
        <tr>
            <td>{{ \Carbon\Carbon::parse($keluar->tanggal_keluar)->format('d-m-Y') }}</td>
            <td>{{ $keluar->barang->kode_barang }}</td>
            <td>{{ $keluar->barang->nama_barang }}</td>
            <td>{{ $keluar->jumlah }}</td>
            <td>{{ $keluar->satuan }}</td> <!-- Tambahan -->
            <td>
                <a href="{{ route('barang-keluar.edit', $keluar->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barang-keluar.destroy', $keluar->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data barang keluar.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>
@endsection
