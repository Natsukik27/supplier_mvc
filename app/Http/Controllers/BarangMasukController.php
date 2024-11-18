<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Menampilkan daftar barang masuk
    public function index()
    {
        $barangMasuk = BarangMasuk::with(['barang', 'supplier'])->get();
        return view('barang_masuk.index', compact('barangMasuk'));
    }

    // Menampilkan form untuk menambah barang masuk
    public function create()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        return view('stok.barang_masuk', compact('barangs', 'suppliers'));
    }

    // Menyimpan data barang masuk
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_masuk' => 'required|integer',
            'id_supplier' => 'required|exists:supplier,id_supplier',
            'tgl_masuk' => 'required|date',
        ]);

        // Menambahkan tanggal masuk menggunakan Carbon jika tidak diisi
        $data = $request->all();
        $data['tgl_masuk'] = $data['tgl_masuk'] ?? \Carbon\Carbon::now()->toDateString(); // default ke hari ini jika tidak ada

        BarangMasuk::create($data);

        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil');
    }


    // Menampilkan form untuk mengedit barang masuk
    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        return view('barang_masuk.edit', compact('barangMasuk', 'barangs', 'suppliers'));
    }

    // Memperbarui data barang masuk
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'tgl_masuk' => 'required|date',
            'jml_masuk' => 'required|integer',
            'id_supplier' => 'required|exists:supplier,id_supplier',
        ]);

        $barangMasuk->update($request->all());
        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil diperbarui');
    }

    // Menghapus data barang masuk
    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Barang masuk berhasil dihapus');
    }
}
