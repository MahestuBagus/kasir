@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header">{{ __('Edit Item') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="">
                            <div class="form-group">
                                <label for="">Item Category</label>
                                <select name="category" class="form-control form-select" id="">
                                    <option value="1">makanan</option>
                                    <option value="2">minuman</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Item Name</label>
                                <input type="text" class="form-control" placeholder="nama">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" placeholder="price">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" class="form-control" placeholder="stock">
                            </div>
                            

                            <div class="form-group mt-2">
                                
                                <button class="btn btn-sm btn-primary ">Simpan</button>
                                <input type="reset" value="Batal" class="btn btn-sm">
                            </div>
                        </form>
                        {{-- {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection