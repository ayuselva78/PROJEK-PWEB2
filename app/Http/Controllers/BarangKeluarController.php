<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index() {
        $data = BarangKeluar::with('barang')->get();
        return view('barang_keluar.index', compact('data'));
    }

    public function create() {
        $barangs = Barang::all();
        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request) {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup');
        }

        BarangKeluar::create([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'satuan' => $barang->satuan,
        ]);

        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang-keluar.index');
    }

    public function edit($id) {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_keluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);
        $barang = Barang::findOrFail($request->barang_id);

        $barangKeluar->update([
            'barang_id' => $barang->id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'satuan' => $barang->satuan,
        ]);

        return redirect()->route('barang-keluar.index');
    }

    public function destroy($id) {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();
        return redirect()->route('barang-keluar.index');
    }
}