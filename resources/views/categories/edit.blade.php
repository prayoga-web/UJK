@extends('layouts.master')

@section('content')
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Edit Kategori</h2>
        <p class="opacity-80">Perbarui nama kategori agar semua barang terkelompok dengan benar.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ route('categories.index') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100">
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-slate-700 text-sm font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition-all" placeholder="Contoh: Smartphone" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 transition duration-300 transform active:scale-[0.98]">
            UPDATE KATEGORI
        </button>
    </form>
</div>
@endsection