<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangList = Barang::with('kategori')->orderBy('id', 'DESC')->get();
        return view('admin.barang.index', compact('barangList'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'tanggal_masuk' => 'required|date_format:d-m-Y',
            'kategori' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|max:1024', // Max file size 1MB
        ]);

        $gambarPath = $request->file('gambar')->store('images/barang', 'public');

        Barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'deskripsi' => $request->input('deskripsi'),
            'tanggal_masuk' => date('Y-m-d', strtotime($request->input('tanggal_masuk'))),
            'kategori_id' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar' => $gambarPath,
            'terjual' => '0'
        ]);

        return redirect()->route('admin.barang.index')->with('alert', 1);
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.barang.edit', compact('barang','kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'tanggal_masuk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        $gambarPath = $request->file('gambar')->store('images/barang', 'public');
        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tanggal_masuk)),
            'kategori_id' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.barang.index')->with('alert', 1);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('admin.barang.index')->with('alert', 3);
    }
}
