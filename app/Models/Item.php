<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;

/**
 * Item Model - Representasi tabel items di database
 *
 * Model ini merepresentasikan data barang/inventaris dengan atribut:
 * - nama_barang: Nama barang/item
 * - category_id: Referensi ke kategori
 * - supplier_id: Referensi ke pemasok
 * - stok: Jumlah stok barang yang tersedia
 * - harga: Harga barang
 */
class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'nama_barang',
        'category_id',
        'supplier_id',
        'stok',
        'harga',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
