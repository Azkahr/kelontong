@extends('layouts.main')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
@endsection
@section('container')
@include('layouts/navbar')

    <form action="/" method="get">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
    </form>

<div Class="hero-container">
    <div class="hero">
        <img src="{{ asset('assets/img/banner.png') }}" alt="">
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