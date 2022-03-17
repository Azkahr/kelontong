@extends('layouts.main')
@section('container')
@include('partials/navbar')
<style>
    .container {
        padding-top: 150px;
    }

    h4 {
        font-size: 2em; 
        font-weight: bolder;
    }

    h6 {
        font-size: 1.17em; 
        font-weight: bolder;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View
                            <a href="{{ route('myOrder') }}" class="btn btn-primary float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Detail Pengiriman</h6>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Nomor Contact</label>
                                <div class="border p-2">{{ $orders->no_hp }}</div>
                                <label for="">Alamat</label>
                                <div class="border p-2">
                                    {{ $orders->alamat }},
                                    {{ $orders->kota }},
                                    {{ $orders->provinsi }},
                                    {{ $orders->negara }}
                                </div>
                                <label for="">Pin code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $order)
                                            <tr>
                                                <td>{{ $order->products->product_name }}</td>
                                                <td>{{ $order->qty }}</td>
                                                <td>Rp.{{ number_format($order->harga, 0,",",".") }}</td>
                                                <td>
                                                    @foreach (explode(',',$order->products->image) as $item)
                                                        @if (count(explode(',',$order->products->image)) > 1)
                                                            <img src="{{ asset('storage/' . $item) }}" width="100px" alt="{{ $order->products->product_name }}" class="mySlides">
                                                        @else
                                                            <img src="{{ asset('storage/' . $item) }}" width="100px" alt="{{ $order->products->product_name }}">
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Total : <span class="float-end">Rp.{{ number_format($orders->total_harga, 0,",",".") }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
var slideIndex = 0;
carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) {slideIndex = 1}
            x[slideIndex-1].style.display = "block";
            setTimeout(carousel, 2000);
        }
</script>
@endsection