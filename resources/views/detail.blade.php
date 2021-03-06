@extends('layouts.main')
@section('headC')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('container')
@include('partials/navbar')
<div class="product-master-container">
    @php
        $image = explode(',',$product->image)[0];
    @endphp
    <input id="image-source" type="hidden" value="{{ asset('storage/'.$image) }}">
    <div class="product-container">
        <div class="product-image">
            <div class="slider">
                @foreach (explode(',', $product->image) as $item)
                    <img src="{{ asset('storage/'.$item) }}" alt="product-image">
                @endforeach
            </div>
            <div class="arrowPrev" data-feather="arrow-left"></div>
            <div class="arrowNext" data-feather="arrow-right"></div>
        </div>
        <div class="product-content">
            <div class="content-header">
                <p class="h2">{{ $product->product_name }}</p>
                <p class="h3">Rp.{{ number_format($product->harga, 0,",",".") }}</p>
                <div class="d-flex align-items-center mb-3 justify-content-between">
                    <div class="d-flex align-items-center">
                        @php $rate = number_format($rating_value) @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $rate; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $rate+1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count() > 0)
                                    Dari {{ $ratings->count() }} Ratings
                                @else
                                    Tidak ada rating
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        @if ($product->toko->image)
                            <img class="foto-toko" src="{{ asset('storage/'.$product->toko->image) }}" alt="image-profile">
                        @else
                            <img class="foto-toko" src="{{ asset('assets/img/user.png') }}" alt="image-profile">
                        @endif
                        <a href="#" class="ms-2"><p>{{ $product->toko->nama_toko }}</p></a>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top border-bottom py-2 px-1">
                    Category : {{ $product->category->name }} | Stok : {{ $product->stok }}
                    @if ($product->stok < 1)
                        <span class="badge badge-danger bg-danger">Stok Habis</span>
                    @else
                        <span class="badge badge-success bg-success">Stok Tersedia</span>
                    @endif 
                </div>
            </div>
            <p>{!! $product->desc !!}</p>
        </div>
    </div>
    <div class="product-cart">
        <div class="varian">
            <label for="varian" style="font-family:Spartan; font-weight:600" class="text-light">Pilih Varian</label>
            <select class="form-select" name="varian" id="varian">
                <option value="varian1">Varian 1</option>
                <option value="varian2">Varian 2</option>
                <option value="varian3">Varian 3</option>
            </select>
        </div>
        <div class="w-100 d-flex mt-2 justify-content-between bg-dark">
            <button class="btn btn-light decrement-btn2 rounded-0">-</button>
            <input  type="text" name="stok" value="1" class="w-100 bg-light text-center form-control qty-input2 rounded-0 border" placeholder="Jumlah" disabled>
            <button class="btn btn-light increment-btn2 rounded-0">+</button>
        </div>
        <input id="catatan" class="form-control mt-2" type="text" placeholder="Catatan Untuk Penjual">
        <hr class="mt-3 opacity-100 bg-light mx-auto" style="width: 90%">
        <button id="addToCartBtn" class="btn w-100 mt-3" style="background-color:white; color:#536AEC; font-size:15px; font-family:'Spartan'; font-weight:600">Keranjang+</button>
        <button class="btn w-100 mt-2" style="border: 2px solid white; color:white; font-family:'Spartan'; font-weight:600">Beli</button>
    </div>
    <div class="product-comment">
        <div class="user-review text-center">
            <div class="ulasan">
                <h3 class="h3">Ulasan</h3>
            </div>
            @foreach ($reviews as $review)
                <p>{{ $review->user->name }}</p>
                @for ($i = 1; $i <= $review->stars_rated; $i++)
                    <i class="fa fa-star checked"></i>
                @endfor
                @for ($j = $review->stars_rated+1; $j <= 5; $j++)
                    <i class="fa fa-star"></i>
                @endfor
                <small>Diulas pada {{ $review->created_at->format('d M Y') }}</small>
                <p>{{ $review->user_review }}</p>
            @endforeach
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function () {
    $('.slider').slick({
        prevArrow: '.arrowPrev',
        nextArrow: '.arrowNext',
    });

    $('#addToCartBtn').click(function (e) { 
        let products_qty = $('.qty-input2').val();
        let image = $('#image-source').val();
        let name = '{{ $product->product_name }}';
        let harga = parseInt('{{ $product->harga }}');
        let stok = '{{ $product->stok }}';
        let id = '{{ $product->id }}';

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'products_id' : id,
                'products_qty' : products_qty,
            },
            dataType: "json",
            success: function (response) {
                if(response.status === "Produk Berhasil Ditambahkan Ke Keranjang"){
                    $('#card-body').append(
                        `
                        <div class="product_data mt-3" style="width:100; display:flex; justify-content:flex-end;">
                            <div class="col-md-2">
                                <img src="`+ image +`" alt="`+ name +`">
                            </div>
                            <div class="col-md-3 my-auto ms-3">
                                <h3>`+ name +`</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h3>Rp.`+ nDots(harga) +`</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="text-center">
                                    <label for="stok">Quantity</label>
                                    <div class="mb-3 d-flex justify-content-center flex-row" id="qty">
                                        <input type="hidden" class="products_id" value="`+ id +`">
                                        <input type="hidden" class="harga_product" value="`+ harga +`">
                                        <input type="hidden" class="stok_product" value="`+ stok +`">
                                        <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                        <input type="number" min="1" name="stok" class="text-center form-control qty-input rounded-0" value="`+ products_qty +`" style="width: 50px; background-color: white; width:70px">
                                        <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item mt-2"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        `
                    );
                    window.totalHarga += (products_qty * harga);
                    $('.total-harga').html(nDots(totalHarga));
                    Swal.fire(response.status);
                }else{
                    Swal.fire(response.status);
                }
            }
        });
    });
    
    $('.increment-btn2').click(function (e) { 
        e.preventDefault();

        let qty = parseInt('{{ $product->stok }}');
        var inc_value = $('.qty-input2').val();
        var value = parseInt(inc_value);
        value = isNaN(value) ? 0 : value;
        if(qty > value){
            value++;
            $('.qty-input2').val(value);
        }
    });
    
    $('.decrement-btn2').click(function (e) { 
        e.preventDefault();
        var dec_value = $('.qty-input2').val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.qty-input2').val(value);
        }
    });
});
</script>
@endsection
