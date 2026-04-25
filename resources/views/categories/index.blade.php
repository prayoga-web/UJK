@extends('layouts.master')

@section('content')
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Daftar Kategori Barang</h2>
        <p class="opacity-80">Kelola kategori produk agar data barang menjadi lebih terstruktur.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ route('categories.create') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4">Nama Kategori</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse($categories as $category)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4 text-slate-700">{{ $category->nama_kategori }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex gap-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="delete-form-category-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete('category-{{ $category->id }}')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="px-6 py-8 text-center text-slate-400">Belum ada kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection