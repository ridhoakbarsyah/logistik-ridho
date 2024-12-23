@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Barang Masuk</h1>
        <a href="/barang-masuk/create" class="btn btn-primary mb-3">Tambah Barang Masuk</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Barang Masuk</th>
                    <th>Kode Barang</th>
                    <th>Quantity</th>
                    <th>Origin (Asal barang)</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangMasuk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_barang_masuk }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->origin }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
