<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index() {
        $data = BarangMasuk::with('barang')->get();
        return view('barang_masuk.index', compact('data'));
    }

    public function create() {
        $barangs = Barang::all();
        return view('barang_masuk.create', compact('barangs'));
    }

    public function store(Request $request) {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        BarangMasuk::create([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'satuan' => $barang->satuan, // isi otomatis dari relasi barang
        ]);

        // Tambah stok
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang-masuk.index');
    }

    public function edit($id) {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_masuk.edit', compact('barangMasuk', 'barangs'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::findOrFail($request->barang_id);

        $barangMasuk->update([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'satuan' => $barang->satuan,
        ]);

        return redirect()->route('barang-masuk.index');
    }

    public function destroy($id) {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();
        return redirect()->route('barang-masuk.index');
    }
}