@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Stok Barang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stokBarang as $stok)
                    <tr>
                        <td>{{ $stok->kode_barang }}</td>
                        <td>{{ $stok->stok }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
