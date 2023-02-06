@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Produk
            </div>
            <div class="card-body">
                <form action="{{route('items.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                            placeholder="pisang, meses, roti">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga"
                            placeholder="10.000, 20.000">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok" placeholder="2, 20, 35">
                    </div>
                    <input type="submit" value="Tambah Produk" class="btn btn-success">
                    <a href="{{ route('home.index') }}" class="btn btn-outline-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
