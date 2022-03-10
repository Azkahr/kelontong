@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col col-md-8 mt-5">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                @endif
                @if ($message = Session::get('error'))
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemcart->detail as $detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>
                                        <td>Rp.{{ number_format($detail->harga, 0,",",".") }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('cartdetail.update', $detail->id) }}" method="POST">
                                                    @method('patch')
                                                    @csrf
                                                    <input type="hidden" name="param" value="kurang">
                                                    <button class="btn btn-primary btn-sm">
                                                        -
                                                    </button>
                                                </form>
                                                <button class="btn btn-outline-primary btn-sm" disabled="true">
                                                    {{ number_format($detail->qty) }}
                                                </button>
                                                <form action="{{ route('cartdetail.update', $detail->id) }}" method="post">
                                                    @method('patch')
                                                    @csrf
                                                    <input type="hidden" name="param" value="tambah">
                                                    <button class="btn btn-primary btn-sm">
                                                        +
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            Rp.{{ number_format($detail->subtotal, 0,",",".") }}
                                        </td>
                                        <td>
                                            <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display: inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <a href="/" class="btn btn-primary">Lanjut belanja</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card mt-5">
                    <div class="card-header">
                        Ringkasan
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>No Invoice</td>
                                <td class="text-right">
                                    {{ $itemcart->no_invoice }}
                                </td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                    Rp.{{ number_format($itemcart->subtotal, 0,",",".") }}
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="text-right">
                                    Rp.{{ number_format($itemcart->total, 0,",",".") }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary btn-block">Checkout</button>
                            </div>
                            <div class="col">
                                <form action="{{ route('clearCart', $itemcart->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-block">Kosongkan cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection