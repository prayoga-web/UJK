<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * ItemController - Menangani CRUD operasi untuk barang inventaris
 * 
 * Controller ini bertanggung jawab untuk:
 * - Menampilkan daftar barang (index)
 * - Menampilkan form tambah barang (create)
 * - Menyimpan barang baru (store)
 * - Menampilkan form edit barang (edit)
 * - Mengupdate data barang (update)
 * - Menghapus barang (destroy)
 * - Menampilkan dashboard dengan statistik barang (dashboard)
 */
class ItemController extends Controller
{
    /**
     * Tampilkan daftar semua barang
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Query dasar untuk items
        $query = Item::query();

        // Jika ada parameter pencarian nama_barang
        if ($request->has('nama_barang') && !empty($request->nama_barang)) {
            $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
        }

        // Jika ada parameter pencarian kategori
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori', 'like', '%' . $request->kategori . '%');
        }

        // Ambil data barang dengan filter
        $items = $query->get();

        // Return view dengan data barang dan parameter pencarian untuk form
        return view('items.index', compact('items'));
    }

    /**
     * Tampilkan form untuk menambah barang baru
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Simpan barang baru ke database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Buat record barang baru di database
        Item::create($request->all());
        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambah!');
    }

    /**
     * Tampilkan form untuk mengedit barang
     * 
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update data barang di database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        // Validasi input form
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Update record barang dengan data baru
        $item->update($request->all());
        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate!');
    }

    /**
     * Hapus barang dari database
     * 
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $item)
    {
        // Hapus record barang dari database
        $item->delete();
        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus!');
    }

    /**
     * Tampilkan dashboard dengan statistik barang
     * 
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Hitung total jenis barang
        $totalBarang = Item::count();
        
        // Hitung total stok seluruh unit
        $totalStok = Item::sum('stok');

        // FITUR BARU: Hitung barang yang stoknya di bawah 5 (Stok Kritis)
        $stokKritis = Item::where('stok', '<', 5)->count();
        
        // Hitung jumlah kategori unik
        $totalKategori = Item::distinct('kategori')->count('kategori');
        
        // Ambil 5 barang terbaru
        $recentItems = Item::latest()->take(5)->get();

        // Masukkan 'stokKritis' ke dalam compact
        return view('dashboard', compact('totalBarang', 'totalStok', 'totalKategori', 'recentItems', 'stokKritis'));
    }
}