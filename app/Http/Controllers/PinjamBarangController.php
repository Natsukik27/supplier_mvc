<?php

namespace App\Http\Controllers;

use App\Models\PinjamBarang;
use App\Models\Barang;
use Illuminate\Http\Request;

class PinjamBarangController extends Controller
{
    // Menampilkan daftar pinjaman barang
    public function index()
    {
        $pinjamBarangs = PinjamBarang::all();
        return view('pinjam_barang.index', compact('pinjamBarangs'));
    }

    // Menampilkan form untuk menambah pinjaman barang
    public function create()
    {
        $barangs = Barang::all();  // Ambil semua barang untuk dropdown
        return view('stok.pinjam', compact('barangs'));
    }

    // Menyimpan data pinjaman barang
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_barang' => 'required|integer',
            'peminjam' => 'required|string',
            'tgl_pinjam' => 'required|date',
            'kondisi' => 'required|string',
        ]);

        PinjamBarang::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Barang berhasil dipinjam');
    }

    // Menampilkan form untuk mengedit pinjaman barang
    public function edit(PinjamBarang $pinjamBarang)
    {
        $barangs = Barang::all();
        return view('pinjam_barang.edit', compact('pinjamBarang', 'barangs'));
    }

    // Memperbarui data pinjaman barang
    public function update(Request $request, PinjamBarang $pinjamBarang)
    {
        $request->validate([
            'peminjam' => 'required',
            'tgl_pinjam' => 'required|date',
            'id_barang' => 'required|exists:barang,id_barang',
            'nama_barang' => 'required',
            'jml_barang' => 'required|integer',
            'tgl_kembali' => 'required|date',
            'kondisi' => 'required',
        ]);

        $pinjamBarang->update($request->all());
        return redirect()->route('pinjam_barang.index')->with('success', 'Pinjaman barang berhasil diperbarui');
    }

    // Menghapus data pinjaman barang
    public function destroy(PinjamBarang $pinjamBarang)
    {
        $pinjamBarang->delete();
        return redirect()->route('pinjam_barang.index')->with('success', 'Pinjaman barang berhasil dihapus');
    }
}
