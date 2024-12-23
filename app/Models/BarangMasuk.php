<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_barang_masuk',
        'kode_barang',
        'quantity',
        'origin',
        'tanggal_masuk',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang_masuks';

    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }
}
