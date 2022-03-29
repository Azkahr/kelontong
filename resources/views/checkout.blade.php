@extends('layouts.main')
@section('container')
@include('partials/navbar')
<style>
    .container {
        padding-top: 150px;
    }

    h6{
        font-size: 134%; 
        font-weight: 500;
    }

    .checkout-form label  {
        font-size: 15px;
        font-weight: 700;
    }

    .checkout-form input {
        font-size: 15px;
        padding: 5px;
        font-weight: 400;
    }
</style>
    <div class="container">
        <form action="{{ route('order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="Enter First Name" name="fname" id="fname" autofocus>
                                    @error('fname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror">
                                    @error('lname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="no_hp">Nomor Hp</label>
                                    <input type="text" name="no_hp" id="no_hp" placeholder="Enter Nomor Hp" class="form-control @error('no_hp') is-invalid @enderror">
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" placeholder="Enter Alamat" class="form-control @error('alamat') is-invalid @enderror">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota" id="kota" placeholder="Enter Kota" class="form-control @error('kota') is-invalid @enderror">
                                    @error('kota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" placeholder="Enter Provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                                    @error('provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" placeholder="Masukkan kode pos" class="form-control @error('kode_pos') is-invalid @enderror">
                                    @error('kode_pos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        @if ($carts->count() > 0)
                            <div class="card-body">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->products->product_name }}</td>
                                            <td>{{ $cart->qty }}</td>
                                            <td>Rp.{{ number_format($cart->products->harga, 0,",",".") }}</td>
                                        </tr>
                                        @php $total += $cart->products->harga * $cart->qty; @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="d-flex align-content-center mt-3">
                                    <h6>Total : Rp.{{ number_format($total, 0,",",".") }}</h6>
                                    <button class="btn btn-primary" type="submit" style="margin-left: 170px;">Order</button>
                                </div>
                            </div>
                        @else
                            <div class="card-body text-center">
                                <h5 style="font-size: 166%; font-weight: bold;">Tidak ada product di keranjang </h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection