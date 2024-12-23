<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'stok',
    ];


    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'kode_barang', 'stok');
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'kode_barang', 'stok');
    }
}
