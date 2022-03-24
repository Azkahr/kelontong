@extends('layouts.main')
@section('headS')
<script>
    $('html, body').css('overflow', 'hidden');
</script>
@endsection
@section('headC')
<link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('container')
@include('partials/loader')
@include('partials/navbar')

<div class="background-element">
    <img src="{{ asset('assets/img/fluid.png') }}" alt="">
    <img src="{{ asset('assets/img/fluid.png') }}" alt="">
    <img src="{{ asset('assets/img/fluid.png') }}" alt="">
</div>

<div class="hero">
    <div class="main">
        <div class="slider">
            <img class="banner banner1" src="{{ asset('assets/img/kitchen 1.jpg') }}" alt="">
            <img class="banner banner2" src="{{ asset('assets/img/kitchen 2.jpg') }}" alt="">
            <img class="banner banner3" src="{{ asset('assets/img/food 1.jpg') }}" alt="">
        </div>
        <div class="arrow-container">
            <span class="prevA" data-feather="arrow-left"></span>
            <span class="nextA" data-feather="arrow-right"></span>
        </div>
    </div>
</div>

<div class="category-container">
    <div class="category">
        <div class="cate c1">
            <p class="cateText t1">Makanan</p>
            <img class="cateImg img1" src="{{ asset('assets/img/food 2.jpg') }}" alt="makanan">
        </div>
        <div class="cate c2">
            <p class="cateText t2">Minuman</p>
            <img class="cateImg img2" src="{{ asset('assets/img/drink 1.webp') }}" alt="minuman">
        </div>
        <div class="cate c3 ">
            <p class="cateText t3">Mandi</p>
            <img class="cateImg img3" src="{{ asset('assets/img/bath 1.jpg') }}" alt="Perlengkapan Mandi">
        </div>
        <div class="cate c4">
            <p class="cateText t4">Mencuci</p>
            <img class="cateImg img4" src="{{ asset('assets/img/clean 2.jpg') }}" alt="Perlengkapan Mencuci">
        </div>
        <div class="cate c5">
            <p class="cateText t5">Rumah Tangga</p>
            <img class="cateImg img5" src="{{ asset('assets/img/house 1.jpg') }}" alt="Perlengkapan Rumah Tangga">
        </div>
        <div class="cate c6">
            <p class="cateText t6">Bayi</p>
            <img class="cateImg img6" src="{{ asset('assets/img/baby 1.jpg') }}" alt="Perlengkapan Bayi">
        </div>
        <div class="cate c7">
            <p class="cateText t7">Dapur</p>
            <img class="cateImg img7" src="{{ asset('assets/img/kitchen 3.webp') }}" alt="Bahan-Bahan Dapur">
        </div>
        <div class="cate c8">
            <p class="cateText t8">Digital</p>
            <img class="cateImg img8" src="{{ asset('assets/img/digital 1.png') }}" alt="Produk Digital">
        </div>
        <div class="cate c9">
            <p class="cateText t9">Sembako</p>
            <img class="cateImg img9" src="{{ asset('assets/img/sembako 1.png') }}" alt="Sembako">
        </div>
        <div class="cate c10">
            <p class="cateText t10">Obat</p>
            <img class="cateImg img10" src="{{ asset('assets/img/obat 1.jpg') }}" alt="Obat">
        </div>
        <div class="cate c11">
            <p class="cateText t11">Jajanan</p>
            <img class="cateImg img11" src="{{ asset('assets/img/jajanan 1.jpg') }}" alt="Jajanan">
        </div>
        <div class="cate c12">
            <p class="cateText t12">Alat tulis</p>
            <img class="cateImg img12" src="{{ asset('assets/img/tulis 1.jpg') }}" alt="Alat tulis">
        </div>
    </div>
</div>

<hr style="width: 80%; opacity:60%; margin: 40px auto 40px auto; height:2px">

<div class="best-seller">
    <div class="blue-bg"></div>
    <p class="best-text">Best Seller</p>
    <div class="card-container">
        <div class="slider-best">
            @foreach ($productsBest as $pb)
                @if ($pb->stok === 0)
                    <div class="cardB cb{{ $loop->iteration }}">
                        <div class="cImg">
                            <div class="img-overlay">
                                <p class="img-overlay-text">Stok Habis</p>
                            </div>
                            @php
                                $fotoMain = explode(',', $pb->image);
                            @endphp
                            <img class="cImg-content" style="opacity:27%;" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                        </div>
                        <div class="cContent">
                            <p class="text-card">{{ $pb->product_name}}</p>
                            <p class="text-card2">RP {{ number_format($pb->harga, 0,",",".") }}</p>
                            <p class="text-card3">Rating</p>
                            <p class="text-card4">{{ $pb->toko->nama_toko }}</p>
                        </div>
                    </div>
                @else
                    <a style="color: inherit" href="/{{ $pb->toko->nama_toko}}/{{ $pb->product_name }}" class="lBest">
                        <div class="cardB cb{{ $loop->iteration }}">
                            <div class="cImg">
                                @php
                                    $fotoMain = explode(',', $pb->image);
                                @endphp
                                <img class="cImg-content" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                            </div>
                            <div class="cContent">
                                <p class="text-card">{{ $pb->product_name}}</p>
                                <p class="text-card2">RP {{ number_format($pb->harga, 0,",",".") }}</p>
                                <p class="text-card3">Rating</p>
                                <p class="text-card4">{{ $pb->toko->nama_toko }}</p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <span class="prevA2" data-feather="arrow-left"></span>
        <span class="nextA2" data-feather="arrow-right"></span>
    </div>
</div>

<div class="diskon">
    <div class="blue-bg2"></div>
    <p class="dis-text">Diskon</p>
    <div class="card-container2">
        <div class="slider-dis">
            @foreach ($productsBest as $pb)
            @if ($pb->stok === 0)
                    <div class="cardB cb{{ $loop->iteration }}">
                        <div class="cImg">
                            <div class="img-overlay">
                                <p class="img-overlay-text">Stok Habis</p>
                            </div>
                            @php
                                $fotoMain = explode(',', $pb->image);
                            @endphp
                            <img class="cImg-content" style="opacity:27%;" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                        </div>
                        <div class="cContent">
                            <p class="text-card">{{ $pb->product_name}}</p>
                            <p class="text-card2">RP {{ number_format($pb->harga, 0,",",".") }}</p>
                            <p class="text-card3">Rating</p>
                            <p class="text-card4">{{ $pb->toko->nama_toko }}</p>
                        </div>
                    </div>
                @else
                    <a style="color: inherit" href="/{{ $pb->toko->nama_toko }}/{{ $pb->product_name }}" class="lBest">
                        <div class="cardB cb{{ $loop->iteration }}">
                            <div class="cImg">
                                @php
                                    $fotoMain = explode(',', $pb->image);
                                @endphp
                                <img class="cImg-content" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                            </div>
                            <div class="cContent">
                                <p class="text-card">{{ $pb->product_name}}</p>
                                <p class="text-card2">RP {{ number_format($pb->harga, 0,",",".") }}</p>
                                <p class="text-card3">Rating</p>
                                <p class="text-card4">{{ $pb->toko->nama_toko }}</p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <span class="prevA3" data-feather="arrow-left"></span>
        <span class="nextA3" data-feather="arrow-right"></span>
    </div>
</div>

<hr style="width: 80%; opacity:60%; margin: 40px auto 15px auto; height:2px">

<p style="text-align: center; font-size:30px; font-family:spartan; font-weight:700">HAYUU JAJAN</p>

<hr style="width: 80%; opacity:60%; margin: 15px auto 25px auto; height:2px">

<div class="preview">
    @foreach ($products as $product)
        @if ($product->stok === 0)
            <div class="cardB cb{{ $loop->iteration }}">
                <div class="cImg">
                    <div class="img-overlay">
                        <p class="img-overlay-text">Stok Habis</p>
                    </div>
                    @php
                        $fotoMain = explode(',', $product->image);
                    @endphp
                    <img class="cImg-content" style="opacity:27%;" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                </div>
                <div class="cContent">
                    <p class="text-card">{{ $product->product_name}}</p>
                    <p class="text-card2">RP {{ number_format($product->harga, 0,",",".") }}</p>
                    <p class="text-card3">Rating</p>
                    <p class="text-card4">{{ $product->toko->nama_toko }}</p>
                </div>
            </div>
        @else
            <a style="color: inherit" href="/{{ $product->toko->nama_toko }}/{{ $product->product_name }}" class="lBest">
                <div class="cardB cb{{ $loop->iteration }}">
                    <div class="cImg">
                        @php
                            $fotoMain = explode(',', $product->image);
                        @endphp
                        <img class="cImg-content" src="{{ asset('storage/'.$fotoMain[0]) }}" alt="product image">
                    </div>
                    <div class="cContent">
                        <p class="text-card">{{ $product->product_name}}</p>
                        <p class="text-card2">RP {{ number_format($product->harga, 0,",",".") }}</p>
                        <p class="text-card3">Rating</p>
                        <p class="text-card4">{{ $product->toko->nama_toko }}</p>
                    </div>
                </div>
            </a>
        @endif
    @endforeach
    <div style="margin:auto; width:90%; text-align:end">
        <a style="color:#0A58CA" href="#">Lebih Banyak</a>
    </div>
</div>

<div class="footer">
    &copy; 
</div>

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
<script>
window.onhashchange = function() {
    window.location.reload();
}
$(document).ready(function(){
    $('.loader').fadeOut(500);

    $('html, body').css('overflow', 'initial');

    $('.background-element').addClass('bE');

    $('.slider').slick({
        prevArrow: '.prevA',
        nextArrow: '.nextA',
    });

    $('.slider-best').slick({
        prevArrow: '.prevA2',
        nextArrow: '.nextA2',
        centerMode: true,
        slidesToShow: 6,
        draggable: false,
        centerPadding: '0px',
    });

    $('.slider-dis').slick({
        prevArrow: '.prevA3',
        nextArrow: '.nextA3',
        centerMode: true,
        slidesToShow: 6,
        draggable: false,
        centerPadding: '0px',
    });

    $('.main').hover(function () {
        $('.prevA').css('transform', 'translateX(-10px) scale(1.3)');
        $('.prevA').css('opacity', '100%');
        $('.nextA').css('transform', 'translateX(10px) scale(1.3)');
        $('.nextA').css('opacity', '100%');
    }, function () {
        $('.prevA').css('transform', 'translateX(5px) scale(1.3)');
        $('.prevA').css('opacity', '0');
        $('.nextA').css('transform', 'translateX(-5px) scale(1.3)');
        $('.nextA').css('opacity', '0');
    });

    $('.card-container').hover(function () {
        $('.prevA2').css('transform', 'translateX(-5px) scale(1.4)');
        $('.nextA2').css('transform', 'translateX(10px) scale(1.4)');
    }, function () {
        $('.prevA2').css('transform', 'translateX(5px) scale(1.3)');
        $('.nextA2').css('transform', 'translateX(5px) scale(1.3)');
    });

    $('.card-container2').hover(function () {
        $('.prevA3').css('transform', 'translateX(-5px) scale(1.4)');
        $('.nextA3').css('transform', 'translateX(10px) scale(1.4)');
    }, function () {
        $('.prevA3').css('transform', 'translateX(5px) scale(1.3)');
        $('.nextA3').css('transform', 'translateX(5px) scale(1.3)');
    });
});
</script>
@endsection
@endsection