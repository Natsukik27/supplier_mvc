<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\PinjamBarang;
use App\Models\Barang;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    // Menampilkan daftar stok barang
    public function index()
    {
        // Ambil semua barang
        $barangs = Barang::all();

        $stoks = $barangs->map(function($barang) {
            // Menghitung total barang masuk
            $totalMasuk = BarangMasuk::where('id_barang', $barang->id_barang)->sum('jml_masuk');

            // Menghitung total barang keluar
            $totalKeluar = BarangKeluar::where('id_barang', $barang->id_barang)->sum('jml_keluar');

            // Menghitung total stok = masuk - keluar
            $totalStok = $totalMasuk - $totalKeluar;

            // Menambahkan data tersebut ke setiap barang
            $barang->jml_masuk = $totalMasuk;
            $barang->jml_keluar = $totalKeluar;
            $barang->total_barang = $totalStok;

            return $barang;
        });

        return view('stok.index', compact('stoks'));
    }

    // Menampilkan form untuk menambah stok barang
    public function create()
    {
        // Ambil semua data barang dari database
        $barangs = Barang::all();

        // Kirim data barang ke tampilan create
        return view('stok.create', compact('barangs'));
    }

    // Menyimpan data stok barang baru
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_masuk' => 'required|integer',
            'id_supplier' => 'required|exists:supplier,id_supplier'
        ]);

        BarangMasuk::create($request->all());

        // Update stok setelah barang masuk
        $stok = Stok::where('id_barang', $request->id_barang)->first();
        $stok->hitungStok();

        return redirect()->route('stok.index')->with('success', 'Barang masuk berhasil');
    }

    // Menampilkan detail stok barang
    public function show($id)
    {
        $stok = Stok::findOrFail($id);
        return view('stok.show', compact('stok'));
    }

    // Menampilkan form untuk mengedit stok barang
    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        return view('stok.edit', compact('stok'));
    }

    // Menyimpan perubahan stok barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_masuk' => 'required|integer',
            'id_supplier' => 'required|exists:supplier,id_supplier'
        ]);

        $stok = Stok::findOrFail($id);
        $stok->update($request->all());

        // Update stok setelah perubahan
        $stok->hitungStok();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui');
    }

    // Menghapus stok barang
    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus');
    }
}
