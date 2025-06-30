@extends('layouts.app')
@section('title', 'Edit Barang Masuk')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang Masuk</h2>

    <form action="{{ route('barang-masuk.update', $barangMasuk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required onchange="updateSatuanEdit()">
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}" data-satuan="{{ $b->satuan }}" {{ $barangMasuk->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" id="satuan_display" class="form-control" value="{{ $barangMasuk->satuan }}" readonly>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $barangMasuk->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ $barangMasuk->tanggal_masuk }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Kembali</a>
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