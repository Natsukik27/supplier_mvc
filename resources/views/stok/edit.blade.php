<!-- resources/views/stok/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Edit Stok</h1>

        <form action="{{ route('stok.update', $stok->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="id_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <select name="id_barang" id="id_barang" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id_barang }}" @if($barang->id_barang == $stok->id_barang) selected @endif>{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="jml_masuk" class="block text-gray-700 font-semibold">Jumlah Masuk</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jml_masuk" name="jml_masuk" value="{{ $stok->jml_masuk }}" required>
            </div>

            <div>
                <label for="jml_keluar" class="block text-gray-700 font-semibold">Jumlah Keluar</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="jml_keluar" name="jml_keluar" value="{{ $stok->jml_keluar }}" required>
            </div>

            <div>
                <label for="total_barang" class="block text-gray-700 font-semibold">Total Barang</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" id="total_barang" name="total_barang" value="{{ $stok->total_barang }}" required>
            </div>

            <button type="submit" class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
                Update
            </button>
        </form>
    </div>
@endsection
