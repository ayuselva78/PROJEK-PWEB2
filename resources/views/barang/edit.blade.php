@extends('layouts.app')
@section('title', 'Edit Barang')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="{{ $barang->kode_barang }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" id="stok" value="{{ $barang->stok }}" required min="0">
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select name="satuan" id="satuan" class="form-select" required>
                <option value="" disabled>-- Pilih Satuan --</option>
                @php
                    $satuans = ['pcs', 'kg', 'liter', 'dus', 'karung'];
                @endphp
                @foreach ($satuans as $satuan)
                    <option value="{{ $satuan }}" {{ $barang->satuan == $satuan ? 'selected' : '' }}>{{ $satuan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection