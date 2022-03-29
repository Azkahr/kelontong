@extends('layouts.main')
@section('headC')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('container')
@include('partials/navbar')
<style>
    .card {
        margin-top: 150px;
        margin: 0;
    }

    .text {
        color: grey;
        margin-top: 150px;
        margin: 0;
        margin-bottom: 10px;
    }

    .link-bawah {
        height: 40px;
        width: 70px; 
        margin-left: 115px;
    }

    .arrowPrev {
        z-index: 6;
        position: absolute;
        top: 45%;
        left: 0;
        transition: 0.5s;
        background-color: white;
        color: #536aec;
        transform: scale(1.3) translateX(5px);
        border-radius: 50%;
        box-shadow: 0px 0px 3px 2px rgba(0, 0, 0, 0.2);
    }

    .arrowNext {
        z-index: 6;
        position: absolute;
        top: 44%;
        right: 0;
        transition: 0.5s;
        background-color: #536aec;
        color: white;
        transform: scale(1.3) translateX(5px);
        border-radius: 50%;
        box-shadow: 0px 0px 3px 2px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="container">
    <div class="row">
        @if (request('search'))
            <p style="margin-top: 150px">Produk</p>
            <hr>
            <p class="text">Menampilkan hasil pencarian "{{ request('search') }}"</p>
                @foreach ($products as $product)
                <div class="card" style="width: 18rem; margin-right: 20px; margin-bottom: 20px">
                    <div class="slider">
                        @foreach (explode(',', $product->image) as $item)
                            <img src="{{ asset('storage/' . $item) }}" alt="product-image">
                        @endforeach
                    </div>
                    <div class="arrowPrev" data-feather="arrow-left"></div>
                    <div class="arrowNext" data-feather="arrow-right"></div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <h6>RP {{ number_format($product->harga, 0,",",".") }}</h6>
                    <p class="card-text text-muted">{{ $product->category->name }}</p>
                    <a href="/{{ $product->toko->nama_toko}}/{{ $product->product_name }}" class="btn btn-primary">Detail product</a>
                </div>
            </div>
            @endforeach
        @else
            <h1 style="padding-top: 150px; font-size: 2em; font-weight: bolder; text-align: center;">Anda tidak mengetikkan apapun di kolom pencarian</h1>
        @endif
    </div>
</div>
<a href="/" class="btn btn-primary link-bawah">Home</a>
@endsection
@section('script')
<script>
    feather.replace()
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function () {
    $('.slider').slick({
        prevArrow: '.arrowPrev',
        nextArrow: '.arrowNext',
    });
});
</script>
@endsection