<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string',
            'kontak_person' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        Supplier::create($request->only(['nama_supplier', 'kontak_person', 'nomor_telepon', 'alamat']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama_supplier' => 'required|string',
            'kontak_person' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $supplier->update($request->only(['nama_supplier', 'kontak_person', 'nomor_telepon', 'alamat']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus!');
    }
}
