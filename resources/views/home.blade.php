@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
<script>
    $('html, body').css('overflow', 'hidden');
</script>
@endsection
@section('container')
@include('partials/loader')
@include('partials/navbar')
<div class="cartPage">
    <div class="cart">
        <div class="btnClose"><button id="btnClose"><span data-feather="x"></span></button></div>
    </div>
</div>

<div Class="hero-container">
    <div class="hero">
        <div class="banner">
            <img src="{{ asset('assets/img/banner.png') }}" alt="banner">
        </div>
        <div class="content">
            <div class="container">
                <div class="swiper2">
                    <div class="swiper-wrapper">
                        @foreach ($productsMakanan as $productMakanan)
                            <div class="swiper-slide">
                                <div class="kartu4">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            @foreach (explode(',',$productMakanan->image) as $item)
                                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productMakanan->name }}"></div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-buttonP">
                                            <span style="margin:3px" data-feather="arrow-left"></span>
                                        </div>
                                        <div class="swiper-buttonN">
                                            <span style="margin:3px" data-feather="arrow-right"></span>
                                        </div>
                                    </div>
                                    <div class="contentK">
                                        <h6 style="font-size:18px">{{ $productMakanan->product_name }}</h6>
                                        <p style="margin:0; font-weight:bold">RP {{ number_format($productMakanan->harga, 0,",",".") }}</p>
                                        <p style="margin:0">{{ $productMakanan->user->nama_toko}}</p>
                                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productMakanan->id }}" class="btn btn-primary">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!request('category'))
<div class="category-container">
    <div class="category">
        <p style="margin: 0px 0px 0px 30px; font-size:25px; font-family: Spartan, sans-serif; font-weight:700">Makanan</p>
        <div class="kartu-container1">
            @foreach ($productsMakanan as $productMakanan)
                <div class="kartu1 mb-3">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach (explode(',',$productMakanan->image) as $item)
                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productMakanan->name }}"></div>
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
                        <h6 style="font-size:18px">{{ $productMakanan->product_name }}</h6>
                        <p style="margin:0; font-weight:bold">RP {{ number_format($productMakanan->harga, 0,",",".") }}</p>
                        <p style="margin:0">{{ $productMakanan->user->nama_toko}}</p>
                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productMakanan->id }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach
        </div>

        <p style="margin: 20px 0px 0px 30px; font-size:25px; font-family: Spartan, sans-serif; font-weight:700">Minuman</p>
        <div class="kartu-container2">
            @foreach ($productsMinuman as $productMinuman)
                <div class="kartu2 mb-3">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach (explode(',',$productMinuman->image) as $item)
                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productMinuman->name }}"></div>
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
                        <h6 style="font-size:18px">{{ $productMinuman->product_name }}</h6>
                        <p style="margin:0; font-weight:bold">RP {{ number_format($productMinuman->harga, 0,",",".") }}</p>
                        <p style="margin:0">{{ $productMinuman->user->nama_toko}}</p>
                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productMinuman->id }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="main">
    <div class="kartu-container3">
        @foreach ($products as $product)
            <div class="kartu3">
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
                    <small class="text-muted">{{ $product->category->name }}</small>
                    <p style="margin:0;">{{ $product->user->nama_toko}}</p>
                    <a style="margin:20px 0px 25px 0px" href="/detail/{{ $product->id }}" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

@if (request('category') == 'minuman')
    <div class="wrap" style="padding-left: 150px">
        <p style="margin: 20px 0px 0px 30px; font-size:25px; font-family: Spartan, sans-serif; font-weight:700">Minuman</p>
        <div class="kartu-container2">
            @foreach ($productsMinuman as $productMinuman)
                <div class="kartu2 mb-3">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach (explode(',',$productMinuman->image) as $item)
                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productMinuman->name }}"></div>
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
                        <h6 style="font-size:18px">{{ $productMinuman->product_name }}</h6>
                        <p style="margin:0; font-weight:bold">RP {{ number_format($productMinuman->harga, 0,",",".") }}</p>
                        <p style="margin:0">{{ $productMinuman->user->nama_toko}}</p>
                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productMinuman->id }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if (request('category') == 'makanan')
    <div class="wrap" style="padding-left: 150px">
        <p style="margin: 20px 0px 0px 30px; font-size:25px; font-family: Spartan, sans-serif; font-weight:700">Makanan</p>
        <div class="kartu-container2">
            @foreach ($productsMakanan as $productMakanan)
                <div class="kartu2 mb-3">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach (explode(',',$productMakanan->image) as $item)
                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productMakanan->name }}"></div>
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
                        <h6 style="font-size:18px">{{ $productMakanan->product_name }}</h6>
                        <p style="margin:0; font-weight:bold">RP {{ number_format($productMakanan->harga, 0,",",".") }}</p>
                        <p style="margin:0">{{ $productMakanan->user->nama_toko}}</p>
                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productMakanan->id }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

@if (request('category') == 'snack')
    <div class="wrap" style="padding-left: 150px">
        <p style="margin: 20px 0px 0px 30px; font-size:25px; font-family: Spartan, sans-serif; font-weight:700">Snack</p>
        <div class="kartu-container2">
            @foreach ($productsSnack as $productSnack)
                <div class="kartu2 mb-3">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach (explode(',',$productSnack->image) as $item)
                                <div class="swiper-slide" style="user-select: none"><img style="object-fit: cover; width: 100%; height:200px; border-top-right-radius:7px; border-top-left-radius:7px" src="{{ asset('storage/'.$item) }}" alt="{{ $productSnack->name }}"></div>
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
                        <h6 style="font-size:18px">{{ $productSnack->product_name }}</h6>
                        <p style="margin:0; font-weight:bold">RP {{ number_format($productSnack->harga, 0,",",".") }}</p>
                        <p style="margin:0">{{ $productSnack->user->nama_toko}}</p>
                        <a style="margin:20px 0px 25px 0px" href="/detail/{{ $productSnack->id }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<form action="/" method="get">
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
</form>
@endsection

@section('script')
<script>
$(document).ready(function(){
    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

    function preventDefault(e) {
        e.preventDefault();
    }

    function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
            preventDefault(e);
            return false;
        }
    }

    // modern Chrome requires { passive: false } when adding event
    var supportsPassive = false;
    try {
    window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
        get: function () { supportsPassive = true; } 
    }));
    } catch(e) {}

    var wheelOpt = supportsPassive ? { passive: false } : false;
    var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

    // call this to Disable
    function disableScroll() {
        window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
        window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
        window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
        window.addEventListener('keydown', preventDefaultForScrollKeys, false);
    }

    // call this to Enable
    function enableScroll() {
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
        window.removeEventListener('touchmove', preventDefault, wheelOpt);
        window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
    }

    $('.loader').hide();
    $('.cartPage').hide();
    $('html, body').css('overflow', 'initial');
    $('.cartBtn').click(function(){
        disableScroll();
        $('.cartPage').show();
    });
    $('#btnClose').click(function(){
        enableScroll();
        $('.cartPage').hide();
    });
});
</script>

<script>
    feather.replace()
</script>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script>
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView:1,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-buttonN',
    prevEl: '.swiper-buttonP',
  },
});

const swiper2 = new Swiper('.swiper2', {
  // Optional parameters
  direction: 'horizontal',
  slidesPerView: 3,
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-buttonN2',
    prevEl: '.swiper-buttonP2',
  },

  autoplay: {
   delay: 3000,
   disableOnInteraction: false,
   pauseOnMouseEnter: true,
 },
});
</script>
@endsection