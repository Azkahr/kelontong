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
            top: 150px;
            float: left;
            margin-right: 10px;
        }
        
        .detail-top h6 {
            margin-top: 10px;
            display: flex;
        }

        .detail-top {
            padding-left: 60px;
        }

        .detail-mid p {
            margin: 0 auto;
            width: 700px;
        }

        .detail-mid {
            padding-left: 430px;
        }
        
        .detail-bot {
            margin-bottom: 30px;
        }
        
        .detail-bot img {
            margin-right: 10px;
        }

        /* #modalBtn {
            position: absolute;
            left: 1005px;
            top: 305px;
        } */

        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }
        .rating-css input {
            display: none;
        }
        .rating-css input + label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }
        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }
        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        .checked {
            color: #ffe400
        }
        /* End of Star Rating */
    </style>
    <div class="container">
        @include('notify::components.notify')
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('addRating') }}" method="POST">
                        @csrf
                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rate this product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rating-css">
                                <div class="star-icon">
                                    @if ($user_rating)
                                        @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                            <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                                            <label for="rating{{ $i }}" class="fa fa-star"></label>
                                        @endfor
                                        @for ($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                            <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}">
                                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                                        @endfor
                                    @else
                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
            @if ($product->stok > 0)
                <label class="badge bg-success">In Stock</label>
                <button class="btn btn-block btn-primary" id="addToCartBtn" style="float: right"><i class="fa fa-shopping-cart"></i> Tambahkan ke Keranjang</button>
            @else   
                <label class="badge bg-danger">Out of Stock</label>
            @endif
            <h3 class="mb-3" style="font-weight: bold; font-size: 234%">RP {{ number_format($product->harga, 0,",",".") }}</h3>
        </div>
        <hr>
        <div class="detail-bot mt-2 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                @if ($product->user->image)
                <img src="{{ asset('storage/' . $product->user->image) }}" class="rounded-circle d-block" style="width: 50px; height: 45px">
                @else
                <img class="rounded-circle d-block" src="{{ URL::asset('assets/img/user.png') }}" style="width: 50px; height: 45px">
                @endif
                <h6 style="font-weight: bold; font-size: 134%">{{ $product->user->nama_toko }}</h6>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" id="modalBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Beri rating untuk product ini
            </button>
        </div>
        <hr>
        <div class="detail-mid">
            <h5 class="mb-2 mt-2" style="font-weight: bold; font-size: 20px">Detail</h5>
            <p class="mb-2">{!! $product->desc !!}</p>
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
            let qty = parseInt('{{ $product->stok }}');

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
                                            <input type="hidden" class="stok_product" value="`+ qty +`">
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