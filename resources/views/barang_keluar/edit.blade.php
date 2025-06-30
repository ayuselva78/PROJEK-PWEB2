@extends('layouts.app')
@section('title', 'Edit Barang Keluar')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang Keluar</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('barang-keluar.update', $barangKeluar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required onchange="updateSatuanEdit()">
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}" data-satuan="{{ $b->satuan }}" {{ $barangKeluar->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }} (Stok: {{ $b->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" id="satuan_display" class="form-control" value="{{ $barangKeluar->satuan }}" readonly>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $barangKeluar->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
            <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" value="{{ $barangKeluar->tanggal_keluar }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang-keluar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    function updateSatuanEdit() {
        const select = document.getElementById('barang_id');
        const satuan = select.options[select.selectedIndex].getAttribute('data-satuan');
        document.getElementById('satuan_display').value = satuan ?? '';
    }
</script>
@endsection