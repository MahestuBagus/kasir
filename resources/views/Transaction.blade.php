@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Transaction') }}</div>

                    <div class="card-body">
                        {{-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif --}}

                        <table class="table table-responsive table-striped">
                            <thead>
                                <td>#</td>
                                <td>Kategori</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Stock</td>
                                <td></td>
                            </thead>
                            @if ($items->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Entek</td>
                                </tr>
                            @else
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp {{ number_format($item->price) }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>
                                            <form action="{{ route('transaction.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                <input type="hidden" class="form-control" name="qty" value="1">
                                                <button type="submit" class="btn btn-sm btn-warning">+</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Add Item') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-responsive">
                            <thead>
                                <td>#</td>
                                <td>Name</td>
                                <td class="col-md-3 text-center">Qty</td>
                                <td>Subtotal</td>
                                <td>Action</td>
                            </thead>
                            @if ($carts->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Keranjang Kosong</td>
                                </tr>
                            @else
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cart->name }}</td>
                                        <td>
                                            <form action="{{ route('transaction.update', $cart->cart->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" class="form-control" min="1"
                                                    max="{{ $cart->stock + $cart->cart->qty }}" name="qty"
                                                    onchange="update{{ $loop->iteration }}()"
                                                    value="{{ $cart->cart->qty }}">
                                        </td>
                                        <td>{{ $cart->price * $cart->cart->qty }}</td>
                                        <td>
                                            <input type="submit" class="btn btn-sm btn-primary"
                                                id="ubah{{ $loop->iteration }}" style="display: none" value="Update">
                                            </form>
                                            <form action="{{ route('transaction.destroy', $cart->cart->id) }}"
                                                method="POST" class="action">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger"
                                                    id="hapus{{ $loop->iteration }}" style="display: " value="Hapus">
                                            </form>
                                            <script>
                                                function update{{ $loop->iteration }}() {
                                                    document.getElementById("ubah{{ $loop->iteration }}").style.display = "inline";
                                                    document.getElementById("hapus{{ $loop->iteration }}").style.display = "none";
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <form action="{{ route('transaction.checkout') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"></input>
                                <tr>
                                    <td colspan="3" class="text-end">Total</td>
                                    <td colspan="2"><input type="number" class="form-control"
                                            value="{{ $carts->sum(function ($item) {return $item->price * $item->cart->qty;}) }}"
                                            readonly name="total" id=""></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">Payment</td>
                                    <td colspan="2"><input type="number" class="form-control" name="pay_total"
                                            id=""
                                            min="{{ $carts->sum(function ($item) {return $item->price * $item->cart->qty;}) }}"
                                            required></td>
                                </tr>
                                {{-- <tr>
                                    <td colspan="3" class="text-end">Change</td>
                                    <td colspan="2"><input type="number" class="form-control" disabled name="change"
                                            id=""></td>
                                </tr> --}}
                        </table>
                        <button type="submit" class="btn btn-sm btn-success text-light">Checkout</button>
                        <input type="reset" class="btn btn-sm btn-danger text-light" value="Cancel">
                        </form>
                    @endsection
