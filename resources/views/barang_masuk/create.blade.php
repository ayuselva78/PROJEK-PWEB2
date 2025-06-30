@extends('layouts.app')
@section('title', 'Tambah Barang Masuk')

@section('content')
<h2>Tambah Barang Masuk</h2>

<form action="{{ route('barang-masuk.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Barang</label>
        <select name="barang_id" id="barang_id" class="form-control" required onchange="updateSatuan()">
            <option value="" disabled selected>-- Pilih Barang --</option>
            @foreach($barangs as $b)
            <option value="{{ $b->id }}" data-satuan="{{ $b->satuan }}">
                {{ $b->nama_barang }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Satuan</label>
        <input type="text" id="satuan_display" class="form-control" readonly>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Kembali</a>
</form>

<script>
    function updateSatuan() {
        const select = document.getElementById('barang_id');
        const satuan = select.options[select.selectedIndex].getAttribute('data-satuan');
        document.getElementById('satuan_display').value = satuan ?? '';
    }
</script>
@endsection
