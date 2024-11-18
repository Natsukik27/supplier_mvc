<!-- resources/views/supplier/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-red-500 to-pink-500 mb-8">Detail Supplier</h1>

        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <p class="font-semibold text-lg text-gray-700">Nama Supplier: {{ $supplier->nama_supplier }}</p>
            <p class="font-semibold text-lg text-gray-700">Alamat: {{ $supplier->alamat_supplier }}</p>
            <p class="font-semibold text-lg text-gray-700">Telepon: {{ $supplier->telp_supplier }}</p>
            <div class="mt-4">
                <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-yellow-600 transition-all duration-300 mr-4">
                    Edit Supplier
                </a>
                <a href="{{ route('supplier.index') }}" class="bg-gray-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 transition-all duration-300">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
