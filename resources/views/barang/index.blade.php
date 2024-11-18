@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Judul Halaman -->
        <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 mb-8">
            Daftar Barang
        </h1>

        <!-- Tombol Tambah Barang -->
        <a href="{{ route('barang.create') }}" 
            class="bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300 mb-8 inline-block">
            Tambah Barang Baru
        </a>

        <!-- Tabel Daftar Barang -->
        <div class="overflow-x-auto">
            <div class="rounded-lg shadow-lg">
                <table class="min-w-full bg-gray-100 border border-gray-300">
                    <thead class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">ID Barang</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Nama Barang</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Lokasi</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Kondisi</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Sumber Dana</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-white">
                        @forelse($barangs as $barang)
                            <tr class="hover:bg-gray-200 transition-colors duration-300">
                                <td class="px-6 py-4 text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->id_barang }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->nama_barang }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->lokasi }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->kondisi }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->jumlah_barang }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $barang->sumber_dana }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('barang.show', $barang->id_barang) }}" 
                                       class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition-all duration-300">
                                        Detail
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('barang.edit', $barang->id_barang) }}" 
                                       class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition-all duration-300">
                                        Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition-all duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada data barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
