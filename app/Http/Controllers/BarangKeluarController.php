<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    //
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        return view('barang-keluar.index', compact('barangKeluar'));
    }

    // Menampilkan form pencatatan barang keluar
    public function create()
    {
        return view('barang-keluar.create');
    }

    // Menyimpan data barang keluar
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_barang_keluar' => 'required|string',
            'kode_barang' => 'required|string',
            'quantity' => 'required|integer',
            'destination' => 'required|string',
            'tanggal_keluar' => 'required|date',
        ]);

        // Periksa duplikasi data berdasarkan no_barang_keluar
        $existingRecord = BarangKeluar::where('no_barang_keluar', $data['no_barang_keluar'])
            ->where('kode_barang', $data['kode_barang'])
            ->where('tanggal_keluar', $data['tanggal_keluar'])
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Data barang keluar sudah tercatat sebelumnya.');
        }

        // Periksa stok barang
        $stok = StokBarang::where('kode_barang', $data['kode_barang'])->first();
        if (!$stok || $stok->stok < $data['quantity']) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        // Gunakan transaksi untuk menghindari inkonsistensi data
        DB::transaction(function () use ($data, $stok) {
            // Simpan barang keluar
            BarangKeluar::create($data);

            // Kurangi stok
            $stok->decrement('stok', $data['quantity']);
        });

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }
}
