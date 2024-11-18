@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-xl border border-gray-200">
        <h1
            class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500 mb-8">
            Barang Keluar</h1>

        <form action="{{ route('barang_keluar.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="id_barang" class="block text-gray-700 font-semibold">Nama Barang</label>
                <select name="id_barang" id="id_barang"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tgl_keluar" class="block text-gray-700 font-semibold">Tanggal Keluar</label>
                <input type="date"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    id="tgl_keluar" name="tgl_keluar" value="{{ old('tgl_keluar', now()->toDateString()) }}" required>
            </div>
            <div>
                <label for="jml_keluar" class="block text-gray-700 font-semibold">Jumlah Keluar</label>
                <input type="number"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    id="jml_keluar" name="jml_keluar" required>
            </div>
            <div>
                <label for="lokasi" class="block text-gray-700 font-semibold">Lokasi</label>
                <input type="text"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    id="lokasi" name="lokasi" required>
            </div>
            <div>
                <label for="penerima" class="block text-gray-700 font-semibold">Penerima</label>
                <input type="text"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    id="penerima" name="penerima" required>
            </div>
            <button type="submit"
                class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
                Simpan Barang Keluar
            </button>
        </form>
    </div>
@endsection
