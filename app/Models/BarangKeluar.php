<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model ini.
     *
     * @var string
     */
    protected $table = 'barang_keluars';

    /**
     * Atribut yang dapat diisi secara massal.
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
     * Relasi ke model StokBarang berdasarkan kode_barang.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stokBarang()
    {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }
}
