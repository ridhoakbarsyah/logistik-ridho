@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Barang Keluar</h1>

        <a href="/barang-keluar/create" class="btn btn-primary mb-3">Tambah Barang Keluar</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>No. Barang Keluar</th>
                        <th>Kode Barang</th>
                        <th>Quantity</th>
                        <th>Destination (Tujuan barang)</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangKeluar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_barang_keluar }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->destination }}</td>
                            <td>{{ $item->tanggal_keluar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
