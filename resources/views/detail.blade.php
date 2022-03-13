@extends('layouts.main')
@section('container')
@include('partials/navbar')
    <style>
        .container {
            margin-top: 150px;
        }
        .image {
            width: 400px; 
            height: 300px;
            position: sticky;
            top: 0;
            float: left;
            margin-right: 10px;
        }
        
        .detail-top h6 {
            margin-top: 10px;
            display: flex;
        }

        .detail-top {
            padding-left: 430px;
        }

        .detail-mid p {
            margin: 0 auto;
            width: 700px;
        }

        .detail-mid {
            padding-left: 430px;
        }
        
        .detail-bot {
            padding-left: 430px;
            margin-bottom: 100px;
        }
        
        .detail-bot img {
            float: left;
            margin-right: 10px;
        }
    </style>
    <div class="container">
        <a href="/" style="float: right; text-decoration: none" class="text-muted">Kembali?</a>
        <div class="image">
            @foreach (explode(',',$product->image) as $item)
                <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $product->product_name }}">
            @endforeach
        </div>
        <div class="detail-top">
            <h5 style="font-weight: bold; font-size: 166%">{{ $product->product_name }}</h5>
            <p class="text-muted" style="float: left; margin-right: 3px;">{{ $product->category->name }} |</p>
            <p class="text-muted">Stok tersedia : {{ $totalqty }}</p>
            <form action="{{ route('cartdetail.store') }}" method="POST">
                @csrf
                <input type="hidden" name="products_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-block btn-primary" style="float: right">
                    <i class="fa fa-shopping-cart"> Tambahkan ke Keranjang</i>
                </button>
            </form>
            <h3 class="mb-3" style="font-weight: bold; font-size: 234%">RP {{ number_format($product->harga, 0,",",".") }}</h3>
        </div>
        <div class="detail-mid">
            <hr>
                <h5 class="mb-2 mt-2" style="font-weight: bold; font-size: 20px">Detail</h5>
            <hr>
            <p class="mb-2">{!! $product->desc !!}</p>
            <hr>
        </div>
        <div class="detail-bot mt-2">
            @if ($product->user->image)
            <img src="{{ asset('storage/' . $product->user->image) }}" class="rounded-circle d-block" style="width: 50px; height: 45px">
            @else
            <img class="rounded-circle d-block" src="{{ URL::asset('assets/img/user.png') }}" style="width: 50px; height: 45px">
            @endif
            <h6 style="font-weight: bold; font-size: 134%">{{ $product->user->nama_toko }}</h6>
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