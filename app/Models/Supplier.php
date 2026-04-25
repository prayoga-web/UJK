<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'nama_supplier',
        'kontak_person',
        'nomor_telepon',
        'alamat',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
