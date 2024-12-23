<?php

use App\Models\BarangKeluar;
use App\Models\StokBarang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_barang_keluar');
            $table->string('kode_barang');
            $table->integer('quantity');
            $table->string('destination');
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => 'required|string',
            'quantity' => 'required|integer',
            'destination' => 'required|string',
            'tanggal_keluar' => 'required|date',
        ]);

        $stok = StokBarang::where('kode_barang', $data['kode_barang'])->first();
        if (!$stok || $stok->stok < $data['quantity']) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        BarangKeluar::create($data);
        $stok->decrement('stok', $data['quantity']);

        return redirect()->back()->with('success', 'Barang keluar berhasil ditambahkan.');
    }
};
