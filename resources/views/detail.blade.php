@extends('layouts.main')
@section('container')
@include('layouts.navbar')
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
        <div class="image">
            @foreach (explode(',',$product->image) as $item)
                <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $product->product_name }}">
            @endforeach
        </div>
        <div class="detail-top">
            <h5>{{ $product->product_name }}</h5>
            <p class="text-muted" style="float: left; margin-right: 3px;">{{ $product->category->name }} |</p>
            <p class="text-muted">Stok tersedia : {{ $totalqty }}</p>
            <h3>RP {{ number_format($product->harga, 0,",",".") }}</h3>
        </div>
        <div class="detail-mid">
            <hr>
                <h5>Detail</h5>
            <hr>
            <p>{!! $product->desc !!}</p>
            <hr>
        </div>
        <div class="detail-bot">
            <img src="{{ asset('storage/' . $product->user->image) }}" alt="belum mempunyai profile picture" class="rounded-circle d-block" style="width: 50px; height: 45px">
            <h6>{{ $product->user->nama_toko }}</h6>
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