@extends('layouts.app')
@section('title', 'Tambah Barang')

@section('content')
<div class="container mt-4">
    <h2>Tambah Barang Baru</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
        </div>

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" id="stok" required min="0">
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select name="satuan" id="satuan" class="form-select" required>
                <option value="" disabled selected>-- Pilih Satuan --</option>
                <option value="pcs">pcs</option>
                <option value="kg">kg</option>
                <option value="liter">liter</option>
                <option value="dus">dus</option>
                <option value="karung">karung</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection