@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Barang Keluar</h1>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Tambah Barang Keluar -->
        <form action="{{ route('barang-keluar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="no_barang_keluar" class="form-label">No. Barang Keluar</label>
                <input type="text" name="no_barang_keluar" id="no_barang_keluar" class="form-control"
                    placeholder="Masukkan nomor barang keluar" value="{{ old('no_barang_keluar') }}" required>
                @error('no_barang_keluar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control"
                    placeholder="Masukkan kode barang" value="{{ old('kode_barang') }}" required>
                @error('kode_barang')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control"
                    placeholder="Masukkan jumlah barang" value="{{ old('quantity') }}" required>
                @error('quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" name="destination" id="destination" class="form-control"
                    placeholder="Masukkan tujuan pengiriman" value="{{ old('destination') }}" required>
                @error('destination')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
                    value="{{ old('tanggal_keluar') }}" required>
                @error('tanggal_keluar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
