@extends('layouts.master')

@section('content')
<div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 text-white shadow-lg shadow-indigo-200 relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-2">Daftar Supplier</h2>
        <p class="opacity-80">Kelola pemasok untuk memudahkan pengisian dan kontak ulang saat stok menipis.</p>
    </div>
    <div class="absolute right-8 top-1/2 -translate-y-1/2" style="z-index: 999;">
        <a href="{{ route('suppliers.create') }}" class="bg-white hover:bg-gray-100 text-indigo-600 px-4 py-2 rounded-lg transition flex items-center gap-2 text-sm shadow-md font-bold">
            <i class="fas fa-plus"></i> Tambah Supplier
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider">
            <tr>
                <th class="px-6 py-4">Nama Supplier</th>
                <th class="px-6 py-4">Kontak Person</th>
                <th class="px-6 py-4">Telepon</th>
                <th class="px-6 py-4">Alamat</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            @forelse($suppliers as $supplier)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4 text-slate-700">{{ $supplier->nama_supplier }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $supplier->kontak_person ?? '-' }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $supplier->nomor_telepon ?? '-' }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $supplier->alamat ?? '-' }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex gap-2">
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="delete-form-supplier-{{ $supplier->id }}" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="button" onclick="confirmDelete('supplier-{{ $supplier->id }}')" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-400">Belum ada supplier.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection