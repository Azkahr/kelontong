@extends('layouts.main')
@section('container')
@include('partials/navbar')
    <style>
        .container {
            padding-top: 150px;
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
        
        <a href="/" style="float: right; text-decoration: none" class="text-muted">Kembali?</a>
        <div class="image">
            @php
                $image = explode(',',$product->image)[0];
            @endphp
            <input type="hidden" id="image-source" value="{{ asset('storage/'.$image) }}">
            @foreach (explode(',',$product->image) as $item)
                <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $product->product_name }}">
            @endforeach
            <div class="text-center">
                <label for="stok">Quantity</label>
                <div class="mb-3 d-flex justify-content-center flex-row">
                    <button class="btn btn-primary decrement-btn2">-</button>
                    <input type="text" name="stok" class="form-control qty-input2" value="1" style="width: 50px; background-color: white" disabled>
                    <button class="btn btn-primary increment-btn2">+</button>
                </div>
            </div>
        </div>
        <div class="detail-top">
            <h5 style="font-weight: bold; font-size: 166%">{{ $product->product_name }}</h5>
            <p class="text-muted" style="float: left; margin-right: 3px;">{{ $product->category->name }} |</p>
            <p class="text-muted">Stok tersedia : {{ $totalqty }}</p>
            @if ($product->stok > 0)
                <label class="badge bg-success">In Stock</label>
                <button class="btn btn-block btn-primary" id="addToCartBtn" style="float: right"><i class="fa fa-shopping-cart"></i> Tambahkan ke Keranjang</button>
            @else   
                <label class="badge bg-danger">Out of Stock</label>
            @endif
            <h3 class="mb-3" style="font-weight: bold; font-size: 234%">RP {{ number_format($product->harga, 0,",",".") }}</h3>
        </div>
        <div class="detail-mid">
            <hr>
                <h5 class="mb-2 mt-2" style="font-weight: bold; font-size: 20px">Detail</h5>
            <hr>
            <p class="mb-2">{!! $product->desc !!}</p>
            <hr>
        </div>
        <div class="detail-bot mt-2">
            @if ($product->user->image)
            <img src="{{ asset('storage/' . $product->user->image) }}" class="rounded-circle d-block" style="width: 50px; height: 45px">
            @else
            <img class="rounded-circle d-block" src="{{ URL::asset('assets/img/user.png') }}" style="width: 50px; height: 45px">
            @endif
            <h6 style="font-weight: bold; font-size: 134%">{{ $product->user->nama_toko }}</h6>
        </div>
    </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
    $(document).ready(function () {

        $('#addToCartBtn').click(function (e) { 
            let products_qty = $('.qty-input2').val();
            let image = $('#image-source').val();
            let name = '{{ $product->product_name }}';
            let harga = '{{ $product->harga }}';
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
                    'products_id' : '{{ $product->id }}',
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
                                    <h3>{{ `+ name +` }}</h3>
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
                                            <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                            <input type="text" name="stok" class="text-center form-control qty-input rounded-0" value="`+ products_qty +`" style="width: 50px; background-color: white; width:70px">
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
                        Swal.fire(response.status);
                    }else{
                        Swal.fire(response.status);
                    }
                }
            });
            window.totalHarga += (products_qty * harga);
            $('.total-harga').html(nDots(totalHarga));
        });
        
        $('.increment-btn2').click(function (e) { 
            e.preventDefault();
            var inc_value = $('.qty-input2').val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 0 : value;
            value++;
            $('.qty-input2').val(value);
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