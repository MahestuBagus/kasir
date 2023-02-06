@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="col mb-4">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <div class="row">
                        <div class="col"><h5>Kategori</h5></div>
                        <div class="col text-end">
                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-success">Tambah Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    @if ($message = Session::get('catetam'))
                            <div class="alert alert-success" role="alert">
                                <h4>{{ $message }}</h4>
                            </div>
                        @elseif($message = Session::get('cateup'))
                        <div class="alert alert-success" role="alert">
                            <h4>{{ $message }}</h4>
                        </div>
                        @elseif ($message = Session::get('cateup'))
                        <div class="alert alert-success" role="alert">
                            <h4>{{ $message }}</h4>
                        </div>
                        @endif
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="">Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($category as $cate)
                        <tbody>
                            <td>{{ $cate->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-success btn-md">Edit</a>
                                <a href="{{ route('category.hapus', $cate->id) }}" class="btn btn-warning" >Hapus</a>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>Daftar Produk</h5>
                            </div>
                            {{-- <div class="col text-end">
                                <a href="{{ route('category.index') }}" class="btn btn-sm btn-success">Tambah Category</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('ty'))
                            <div class="alert alert-success" role="alert">
                                <h4>{{ $message }}</h4>
                            </div>
                        @elseif($message = Session::get('hapus'))
                        <div class="alert alert-success" role="alert">
                            <h4>{{ $message }}</h4>
                        </div>
                        @endif
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="col">Nama Produk</th>
                                    <th>Stock</th>
                                    <th>Harga</th>
                                    <th class="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <!-- <button href="" class="btn btn-outline-primary" data-bs-toggle='tooltip'
                                                data-placement='top' title='Tambah ke keranjang'>
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </button> -->
                                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-outline-warning" data-bs-toggle='tooltip'
                                                data-placement='top' title='Edit Produk' type="submit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            {{-- <a href="{{ route ('item.index') }}" class="btn btn-warning">Edit</a> --}}
                                            <a href="{{ route('item.hapus', $item->id) }}"
                                                class="btn btn-outline-danger" data-bs-toggle='tooltip' data-placement='top'
                                                title='Hapus Produk'>
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Tambah Produk</div>
                    <div class="card-body">
                        @if ($message = Session::get('tambah'))
                        <div class="alert alert-success" role="alert">
                            <h5>{{ $message }}</h5>
                        </div>
                        @endif
                        <form action="{{route('item.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category">Nama Category</label>
                                <select class="form-select" aria-label="Default select example" id="id_category" name="category_id" required>
                                    <option selected>Belum Memilih Kategori</option>
                                    @foreach ($category as $i => $ppp)
                                        <option value="{{ $ppp->id }}">{{ $ppp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="category">Nama Produk</label>
                                <input type="text" id="name" class="form-control" placeholder=""
                                    aria-describedby="helpId" name="name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="category">Harga</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder=""
                                    aria-describedby="helpId" name="price" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="category">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" placeholder=""
                                    aria-describedby="helpId" name="stock" required >
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                        <input type="reset" class="btn btn-danger">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
