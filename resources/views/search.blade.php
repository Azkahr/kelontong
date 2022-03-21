@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
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
</style>
<div class="container">
    <div class="row">
        @if (request('search'))
            <p style="margin-top: 150px">Produk</p>
            <hr>
            <p class="text">Menampilkan pencarian hasil pencarian "{{ request('search') }}"</p>
            @foreach ($products as $product)
            <div class="card" style="width: 18rem; margin-right: 20px; margin-bottom: 20px">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach (explode(',',$product->image) as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $item) }}" class="card-img-top" alt="{{ $product->product_name }}" style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-buttonP">
                        <span style="margin:3px" data-feather="arrow-left"></span>
                    </div>
                    <div class="swiper-buttonN">
                        <span style="margin:3px" data-feather="arrow-right"></span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <h6>RP {{ number_format($product->harga, 0,",",".") }}</h6>
                    <p class="card-text text-muted">{{ $product->category->name }}</p>
                    <a href="/detail/{{ $product->id }}" class="btn btn-primary">Detail product</a>
                </div>
            </div>
            @endforeach
        @else
            <h1 style="padding-top: 150px; font-size: 2em; font-weight: bolder; text-align: center;">Anda tidak mengetikkan apapun di kolom pencarian</h1>
        @endif
    </div>
</div>
<a href="/" class="btn btn-primary link-bawah">Home</a>
<script>
    feather.replace()
</script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-buttonN',
    prevEl: '.swiper-buttonP',
  },
});
</script>
@endsection