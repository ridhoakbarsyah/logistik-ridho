@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Barang Masuk</h1>
        <form action="/barang-masuk" method="POST">
            @csrf
            <div class="mb-3">
                <label for="no_barang_masuk" class="form-label">No. Barang Masuk</label>
                <input type="text" name="no_barang_masuk" id="no_barang_masuk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="origin" class="form-label">Origin</label>
                <input type="text" name="origin" id="origin" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
