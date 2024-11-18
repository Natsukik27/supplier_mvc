<!-- resources/views/supplier/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Tambah Supplier Baru</h1>

        <form action="{{ route('supplier.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama_supplier" class="block text-gray-700 font-semibold">Nama Supplier</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="nama_supplier" name="nama_supplier" required>
            </div>
            <div>
                <label for="alamat_supplier" class="block text-gray-700 font-semibold">Alamat Supplier</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="alamat_supplier" name="alamat_supplier" required>
            </div>
            <div>
                <label for="telp_supplier" class="block text-gray-700 font-semibold">Telepon Supplier</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="telp_supplier" name="telp_supplier" required>
            </div>
            <button type="submit" class="bg-gradient-to-r from-red-400 to-yellow-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-yellow-500 hover:to-red-400 transition-all duration-300">
                Simpan
            </button>
        </form>
    </div>
@endsection
