@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-500 via-blue-500 to-indigo-500 mb-8">Barang Masuk</h1>

        <form action="{{ route('barang_masuk.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <select name="id_barang" id="id_barang" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jml_masuk" class="block text-gray-700 font-semibold">Jumlah Masuk</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jml_masuk" name="jml_masuk" required>
            </div>
            <div>
                <label for="id_supplier" class="block text-gray-700 font-semibold">Supplier</label>
                <select name="id_supplier" id="id_supplier" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tgl_masuk" class="block text-gray-700 font-semibold">Tanggal Masuk</label>
                <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk', \Carbon\Carbon::now()->toDateString()) }}" required>
            </div>
            <button type="submit" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
                Simpan Barang Masuk
            </button>
        </form>
    </div>
@endsection
