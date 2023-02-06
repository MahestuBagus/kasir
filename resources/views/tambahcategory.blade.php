@extends('layouts.app')
@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-header">
                Tambah Category
            </div>
            <div class="card-body">
                <form action="{{route('Category.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Category</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <input type="submit" value="Tambah Category" class="btn btn-success">
                    <a href="{{ route('home.index') }}" class="btn btn-outline-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>

@endsection
