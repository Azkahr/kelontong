@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
@endsection
@section('container')
@include('layouts/navbar')
<div style="width: 100%; display:flex; justify-content:center; margin-top:200px">
    @foreach ($products as $product)
        <div class="kartu" style="width: 14rem; margin:0px 5px 0px 5px; border:1px solid #DFDFDF; border-radius:7px">
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
  slidesPerView: 'auto',

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-buttonN',
    prevEl: '.swiper-buttonP',
  },
});
</script>
@endsection