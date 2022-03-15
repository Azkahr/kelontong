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
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" name="" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="" id="" placeholder="Enter Last Name" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="email" name="" id="" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Nomor Hp</label>
                                <input type="text" name="" id="" placeholder="Enter Nomor Hp" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Alamat</label>
                                <input type="text" name="" id="" placeholder="Enter Alamat" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Kota</label>
                                <input type="text" name="" id="" placeholder="Enter Kota" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Provinsi</label>
                                <input type="text" name="" id="" placeholder="Enter Provinsi" class="form-control">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin code</label>
                                <input type="text" name="" id="" placeholder="Enter Pin Code" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
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
                            <button class="btn btn-primary" style="margin-left: 170px;">Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection