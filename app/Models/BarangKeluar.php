<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_barang_keluar',
        'kode_barang',
        'quantity',
        'destination',
        'tanggal_keluar',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang_keluars';

    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }
}
