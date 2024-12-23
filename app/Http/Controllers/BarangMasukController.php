<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::all();
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        return view('barang-masuk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_barang_masuk' => 'required|string',
            'kode_barang' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'origin' => 'required|string',
            'tanggal_masuk' => 'required|date',
        ]);

        // Periksa duplikasi data berdasarkan no_barang_masuk
        $existingRecord = BarangMasuk::where('no_barang_masuk', $data['no_barang_masuk'])
            ->where('kode_barang', $data['kode_barang'])
            ->where('tanggal_masuk', $data['tanggal_masuk'])
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Data barang masuk sudah tercatat sebelumnya.');
        }

        // Gunakan transaksi untuk memastikan konsistensi data
        DB::transaction(function () use ($data) {
            // Simpan barang masuk
            BarangMasuk::create($data);

            // Perbarui atau tambahkan stok barang
            $stok = StokBarang::firstOrCreate(
                ['kode_barang' => $data['kode_barang']],
                ['stok' => 0] // Nilai default jika stok baru dibuat
            );

            $stok->increment('stok', $data['quantity']); // Tambah stok
        });

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil dicatat.');
    }
}
