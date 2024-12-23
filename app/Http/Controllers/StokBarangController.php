<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    //
    public function index()
    {
        $stokBarang = StokBarang::all();
        return view('stok-barang.index', compact('stokBarang'));
    }

    // Menampilkan detail stok barang
    public function show($id)
    {
        $stok = StokBarang::findOrFail($id);
        return view('stok-barang.show', compact('stok'));
    }
}
