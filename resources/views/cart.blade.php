@extends('layouts.main')
@section('container')
@include('partials/navbar')
<style>
    .container {
        padding-top: 150px;
        margin-bottom: 20px;
    }

    h3 {
        font-size: 18.72px;
        font-weight: 600;
    }
</style>
<div class="container">
    <div class="card shadow">
        <div class="card-body">
            @foreach ($carts as $cart)
                <div class="row product_data">
                    <div class="col-md-2">
                        @php
                            $image = explode(',', $cart->products->image);
                        @endphp
                        <img src="{{ asset('storage/' . $image[0]) }}" alt="{{ $cart->products->product_name }}" class="mySlides">
                    </div>
                    <div class="col-md-5">
                        <h3>{{ $cart->products->product_name }}</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <input type="hidden" class="products_id" value="{{ $cart->products_id }}">
                            <label for="stok">Quantity</label>
                            <div class="mb-3 d-flex justify-content-center flex-row">
                                <button class="btn btn-primary decrement-btn">-</button>
                                <input type="text" name="stok" class="form-control qty-input" value="{{ $cart->qty }}" style="width: 50px">
                                <button class="btn btn-primary increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<a href="/" class="btn btn-primary" style="margin-left: 120px;">Lanjut belanja</a>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $(document).ready(function () {

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 0 : value;
            if(value < 10000){

                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);

            }
        });
        
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            
            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value);
            value = isNaN(value) ? 0 : value;
            if(value > 1){

                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var products_id = $(this).closest('.product_data').find('.qty-input').val();
            $.ajax({
                method: "POST",
                url: "/delete-cart",
                data: {
                    'products_id' : products_id,
                },
                success: function (response) {
                    Swal.fire("", response.status, "success");  
                }
            });
        });
    });

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
</script>
@endsection