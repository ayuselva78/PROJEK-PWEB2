<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create() {
        return view('barang.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required|string'
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index');
    }

    public function edit(Barang $barang) {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang) {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required|string'
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index');
    }

    public function destroy(Barang $barang) {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
