<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Item Model - Representasi tabel items di database
 * 
 * Model ini merepresentasikan data barang/inventaris dengan atribut:
 * - nama_barang: Nama barang/item
 * - kategori: Kategori barang
 * - stok: Jumlah stok barang yang tersedia
 * - harga: Harga barang
 */
class Item extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database yang digunakan model ini
     * 
     * @var string
     */
    protected $table = 'items';

    /**
     * Atribut yang dapat diisi secara mass assignment
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok',
        'harga',
    ];
}