@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
@endsection
@section('container')
@include('layouts/navbar')
<div Class="hero-container">
    <div class="hero">
        <div class="swiper2">
            <div class="swiper-wrapper">
                @foreach ($productsL as $productL)
                <div class="swiper-slide" style="user-select: none; display:flex">
                    <div class="content-container">
                        <div class="image">
                            <div class="swiper3">
                                <div class="swiper-wrapper">
                                    @foreach (explode(',',$productL->image) as $item)
                                        <div class="swiper-slide">
                                            <img style="object-fit: fill; width: 100%; height:100%; border-bottom-left-radius:12.5px; border-top-left-radius:12.5px" src="{{ asset('storage/'.$item) }}" alt="{{ $productL->product_name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="content">

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="aContainer">
            <div class="swiper-buttonP2">
                <span style="margin:3px" data-feather="arrow-left"></span>
            </div>
            <div class="swiper-buttonN2">
                <span style="margin:3px" data-feather="arrow-right"></span>
            </div>
        </div>
    </div>
</div>
<div class="kartu-container">
    @foreach ($products as $product)
        <div class="kartu">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach (explode(',',$product->image) as $item)
                        <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $product->name }}"></div>
                    @endforeach
                </div>
                <div class="swiper-buttonP">
                    <span style="margin:3px" data-feather="arrow-left"></span>
                </div>
                <div class="swiper-buttonN">
                    <span style="margin:3px" data-feather="arrow-right"></span>
                </div>
            </div>
            <div class="content">
                <h6 style="font-size:18px">{{ $product->product_name }}</h6>
                <p style="margin:0; font-weight:bold">RP {{ number_format($product->harga, 0,",",".") }}</p>
                <p style="margin:0">{{ $product->user->nama_toko}}</p>
                <a style="margin:20px 0px 25px 0px" href="#" class="btn btn-primary">Lihat Produk</a>
            </div>
        </div>
    @endforeach
</div>

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

const swiper2 = new Swiper('.swiper2', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-buttonN2',
    prevEl: '.swiper-buttonP2',
  },
});

const swiper3 = new Swiper('.swiper3', {
  // Optional parameters
    direction: 'horizontal',
    loop: true,
    slideToClickedSlide: true,

    autoplay: {
        delay: 5000,
        disableOnInteraction: true,
    },
});
</script>
@endsection