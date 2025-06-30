@extends('layouts.app')
@section('title', 'Barang Masuk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Data Barang Masuk</h2>
    <a href="{{ route('barang-masuk.create') }}" class="btn btn-success">+ Tambah Barang Masuk</a>
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
        @forelse($data as $masuk)
        <tr>
            <td>{{ \Carbon\Carbon::parse($masuk->tanggal_masuk)->format('d-m-Y') }}</td>
            <td>{{ $masuk->barang->kode_barang }}</td>
            <td>{{ $masuk->barang->nama_barang }}</td>
            <td>{{ $masuk->jumlah }}</td>
            <td>{{ $masuk->satuan }}</td> <!-- Tambahan -->
            <td>
                <a href="{{ route('barang-masuk.edit', $masuk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barang-masuk.destroy', $masuk->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data barang masuk.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard</a>
</div>
@endsection