@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold text-gray-800">Selamat Datang di Dashboard Supplier</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">

            <!-- Total Barang -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-xl font-medium text-gray-700">Total Barang</div>
                <div class="mt-4 text-3xl font-semibold text-blue-600">
                    {{ $totalBarang ?? 0 }}
                </div>
                <a href="{{ route('barang.index') }}" class="mt-4 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Lihat Detail Barang
                </a>
            </div>

            <!-- Total Supplier -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-xl font-medium text-gray-700">Total Supplier</div>
                <div class="mt-4 text-3xl font-semibold text-blue-600">
                    {{ $totalSupplier ?? 0 }}
                </div>
                <a href="{{ route('supplier.index') }}" class="mt-4 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Lihat Detail Supplier
                </a>
            </div>

            <!-- Total Stok Barang -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-xl font-medium text-gray-700">Total Stok Barang</div>
                <div class="mt-4 text-3xl font-semibold text-blue-600">
                    {{ $totalStok ?? 0 }}
                </div>
                <a href="{{ route('stok.index') }}" class="mt-4 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Lihat Detail Stok
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-8">
            <!-- Barang Masuk -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-xl font-medium text-gray-700">Barang Masuk</div>
                <div class="mt-4">
                    <ul>
                        @foreach($barangMasuk as $barang)
                            <li class="border-b py-2">
                                <strong>{{ $barang->barang->nama_barang }}</strong> - {{ $barang->jml_masuk }} items
                                <br>
                                Supplier: {{ $barang->supplier->nama_supplier }}
                                <br>
                                Tanggal Masuk: {{ $barang->tgl_masuk }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('barang_masuk.index') }}" class="mt-4 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Lihat Detail Barang Masuk
                </a>
            </div>

            <!-- Barang Keluar -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="text-xl font-medium text-gray-700">Barang Keluar</div>
                <div class="mt-4">
                    <ul>
                        @foreach($barangKeluar as $barang)
                            <li class="border-b py-2">
                                <strong>{{ $barang->barang->nama_barang }}</strong> - {{ $barang->jml_keluar }} items
                                <br>
                                Penerima: {{ $barang->penerima }} <!-- Display penerima -->
                                <br>
                                Tanggal Keluar: {{ $barang->tgl_keluar }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('barang_keluar.index') }}" class="mt-4 inline-block bg-gradient-to-r from-teal-500 via-blue-600 to-purple-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                    Lihat Detail Barang Keluar
                </a>
            </div>
        </div>
    </div>
@endsection
