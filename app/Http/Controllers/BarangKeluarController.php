<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // Menampilkan daftar barang keluar
    public function index()
    {
        // Mengambil data barang keluar beserta nama barang dan supplier
        $barangKeluar = BarangKeluar::with('barang', 'supplier')->get();

        // Mengirim data ke view
        return view('barang_keluar.index', compact('barangKeluar'));
    }

    // Menampilkan form untuk menambah barang keluar
    public function create()
    {
        $barangs = Barang::all();
        return view('stok.barang_keluar', compact('barangs'));
    }

    // Menyimpan data barang keluar
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_keluar' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
            'tgl_keluar' => 'required|date',  // Validate the date
        ]);

        // Create new barang_keluar record
        BarangKeluar::create([
            'id_barang' => $validated['id_barang'],
            'jml_keluar' => $validated['jml_keluar'],
            'lokasi' => $validated['lokasi'],
            'penerima' => $validated['penerima'],
            'tgl_keluar' => $validated['tgl_keluar'],  // Store the date
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil ditambahkan!');
    }


    // Menampilkan form untuk mengedit barang keluar
    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();
        return view('barang_keluar.edit', compact('barangKeluar', 'barangs'));
    }

    // Memperbarui data barang keluar
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'tgl_keluar' => 'required|date',
            'jml_keluar' => 'required|integer',
            'lokasi' => 'required',
            'penerima' => 'required',
        ]);

        $barangKeluar->update($request->all());
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil diperbarui');
    }

    // Menghapus data barang keluar
    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Barang keluar berhasil dihapus');
    }
}
