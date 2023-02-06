@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Edit Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" value="{{ $category->name  }}" name="nama">
                            {{-- id="name" value="{{ $items->name }}" name="name" --}}
                        </div>
                        <button href="" type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route ('home.index') }}" class="btn btn-danger">Batal</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
