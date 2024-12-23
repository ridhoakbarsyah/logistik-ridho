<?php

use App\Models\BarangMasuk;
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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_barang_masuk');
            $table->string('kode_barang');
            $table->integer('quantity');
            $table->string('origin');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_barang_masuk' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'origin' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan data ke database
        BarangMasuk::create([
            'no_barang_masuk' => $request->no_barang_masuk,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
            'origin' => $request->origin,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect('/barang-masuk')->with('success', 'Data berhasil disimpan.');
    }
};
