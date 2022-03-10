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
                                            {{ $detail->product->product_name }}
                                        </td>
                                        <td>Rp.{{ number_format($detail->harga, 2) }}</td>
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
                                            Rp.{{ number_format($detail->subtotal, 2) }}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection