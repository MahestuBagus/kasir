@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Master Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-responsive table-stripped">
                        <thead class="thead-light">
                            <td>#</td>
                            <td>Category</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Makanan</td>
                            <td>Nasi-Nasian</td>
                            <td>10000</td>
                            <td>15</td>
                            <td>
                                <button>EDIT</button>
                                <button>RESET</button>
                            </td>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div> --}}
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Tambah Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-nama">Nama:</label>
                            <input type="text" class="form-control" name="name" id="name" >
                            
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('home.index') }}" class="btn btn-danger" type="reset">Batal</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
