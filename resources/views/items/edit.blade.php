@extends('layouts.master')

@section('content')
{{-- Header Section dengan Gradient Background --}}
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Edit Data Barang</h2>
        <p class="opacity-80">Perbarui informasi barang inventaris.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ url('/items') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

{{-- Container Form Edit Barang --}}
<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100">

    {{-- Form untuk Update Data Barang --}}
    <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Input Nama Barang --}}
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="Masukkan nama barang" required>
        </div>

        {{-- Pilih Kategori dan Supplier --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Kategori</label>
                <select name="category_id" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Supplier</label>
                <select name="supplier_id" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all">
                    <option value="">Pilih supplier (opsional)</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id', $item->supplier_id) == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Input Stok dan Harga (Side by Side) --}}
        <div class="grid grid-cols-2 gap-4">
            {{-- Input Stok --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $item->stok) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="0" required>
            </div>
            {{-- Input Harga --}}
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $item->harga) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="0" required>
            </div>
        </div>

        {{-- Tombol Submit untuk Update --}}
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition duration-300 transform active:scale-[0.98]">
            UPDATE DATA
        </button>
    </form>
</div>
@endsection