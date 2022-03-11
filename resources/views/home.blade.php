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
<div class="cartPage">
    <div class="cart">
        <div class="btnClose"><button id="btnClose"><span data-feather="x"></span></button></div>
    </div>
</div>

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
            <span id="prevA" class="prevA" style="opacity:0; background-color:white; color:#536AEC; transform:scale(1.3) translateX(5px); transition:0.5s; border-radius: 50%" data-feather="arrow-left"></span>
            <span class="nextA" style="opacity:0; background-color:white; color:#536AEC; transform:scale(1.3) translateX(-5px); transition:0.5s; border-radius: 50%" data-feather="arrow-right"></span>
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

<hr style="width: 80%; opacity:60%; margin: 40px auto 0px auto; height:2px">

<div class="best-seller">
    <div class="blue-bg"></div>
    <p class="best-text">Best Seller</p>
    <div class="card-container">
        <div class="slider-best">
            <div class="cardB cb1">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
            <div class="cardB cb2">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
            <div class="cardB cb3">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
            <div class="cardB cb4">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
            <div class="cardB cb5">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
            <div class="cardB cb5">
                <div class="cImg">
                    <img src="" alt="">
                </div>
                <div class="cContent">
                    <h4>Nama Product</h4>
                    <p> desc</p>
                    <p>dll</p>
                </div>
            </div>
        </div>
    </div>
</div>

Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt culpa soluta quod eveniet dolorum deleniti voluptas accusantium ducimus voluptatibus nisi. Alias, similique. Architecto earum dignissimos eligendi, exercitationem quasi quae eveniet sapiente ipsam non ducimus soluta repellat sequi illo perferendis voluptates ipsum ex fugit quis eius eos. A amet eius eos.

@section('script')
<script>
    feather.replace();
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
<script>
$(document).ready(function(){
    $('.loader').fadeOut(500);

    $('html, body').css('overflow', 'initial');

    $('.cartPage').hide();

    $('.cartBtn').click(function(){
        disableScroll();
        $('.cartPage').show();
    });

    $('#btnClose').click(function(){
        enableScroll();
        $('.cartPage').hide();
    });

    $('.background-element').addClass('bE');

    $('.slider').slick({
        prevArrow: '.prevA',
        nextArrow: '.nextA',
    });

    $('.slider-best').slick({
        slidesPerRow: 6,
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
});
</script>
@endsection
@endsection