<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();  // Mengambil semua data supplier
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telp_supplier' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('supplier.index');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);  // Ganti 'id' dengan 'id_supplier'
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telp_supplier' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('supplier.index');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);  // Ganti 'id' dengan 'id_supplier'
        return view('supplier.show', compact('supplier'));
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('supplier.index');
    }
}
