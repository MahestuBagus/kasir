@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Master Item') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-responsive table-stripped">
                        <thead class="thead-light">
                            <td>No</td>
                            <td>Category</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>Action</td>
                        </thead>

                        @foreach ($items as $item)
                        <tbody>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>Rp. {{number_format ($item->price)}}</td>
                            <td>{{$item->stock}}</td>
                            <td>
                                <button class="btn btn-primary">EDIT</button>
                                <button class="btn btn-danger">Hapus</button>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div> --}}
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Edit Item') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{ route('item.update',$items->id) }}">
                        @method('put')
                        @csrf
                        <div class="mb-3 mt-1">
                            <div class="form-group">
                                <label for="category">Nama Kategori</label>
                                <select name="category_id" id="category" class="form-control form-select">
                                    @foreach($category as $cate)
                                    <option value="{{ $cate -> id }}">{{ $cate -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="nama" class="form-name">Nama :</label>
                                <input type="text" class="form-control" id="name" value="{{ $items->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price" class="form-name">Price :</label>
                                <input type="number" class="form-control" id="price" value="{{ $items->price }}" name="price">
                            </div>
                            <div class="form-group">
                                <label for="stock" class="form-name">Stock :</label>
                                <input type="number" class="form-control" id="stock" value="{{ $items->stock }}" name="stock">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <a href="{{ route ('home.index') }}" class="btn btn-sm btn-danger">Batal</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
