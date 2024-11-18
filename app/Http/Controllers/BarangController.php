<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Menampilkan form untuk menambah barang baru
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'spesifikasi' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'kondisi' => 'required|string|max:255',
        'jumlah_barang' => 'required|integer',
        'sumber_dana' => 'required|string|max:255',
    ]);

    // Menyimpan data barang baru
    Barang::create([ // Use the actual value from $request
        'nama_barang' => $request->nama_barang,
        'spesifikasi' => $request->spesifikasi,
        'lokasi' => $request->lokasi,
        'kondisi' => $request->kondisi,
        'jumlah_barang' => $request->jumlah_barang,
        'sumber_dana' => $request->sumber_dana,
    ]);

    // Mengarahkan pengguna kembali ke halaman daftar barang dengan pesan sukses
    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
}


    public function show($id)
{
    $barang = Barang::findOrFail($id);  // Mendapatkan data barang berdasarkan ID
    return view('barang.show', compact('barang'));  // Mengirimkan data barang ke view show
}


    // Menampilkan form untuk mengedit barang
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    // Memperbarui data barang
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'lokasi' => 'required',
            'kondisi' => 'required',
            'jumlah_barang' => 'required|integer',
            'sumber_dana' => 'required',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    // Menghapus data barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
