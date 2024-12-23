<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
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
        // Validasi data input
        $data = $request->validate([
            'no_barang_keluar' => 'required|string|unique:barang_keluars,no_barang_keluar',
            'kode_barang' => 'required|string|exists:stok_barangs,kode_barang',
            'quantity' => 'required|integer|min:1',
            'destination' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
        ], [
            'no_barang_keluar.unique' => 'Nomor barang keluar sudah digunakan.',
            'kode_barang.exists' => 'Kode barang tidak ditemukan dalam stok.',
            'quantity.min' => 'Jumlah barang harus lebih dari nol.',
        ]);

        try {
            // Periksa stok barang
            $stok = StokBarang::where('kode_barang', $data['kode_barang'])->first();

            if (!$stok || $stok->stok < $data['quantity']) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
            }

            // Gunakan transaksi untuk menjaga konsistensi data
            DB::transaction(function () use ($data, $stok) {
                // Simpan barang keluar
                BarangKeluar::create($data);

                // Kurangi stok
                $stok->decrement('stok', $data['quantity']);
            });

            return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
        } catch (\Exception $e) {
            // Tangani kesalahan dan rollback transaksi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mencatat barang keluar: ' . $e->getMessage());
        }
    }
}
