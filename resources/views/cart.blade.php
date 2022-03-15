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
            @php $total = 0; @endphp
            @foreach ($carts as $cart)
                <div class="row product_data">
                    <div class="col-md-2">
                        {{-- @php
                            $image = explode(',', $cart->products->image);
                        @endphp
                        <img src="{{ asset('storage/' . $image[0]) }}" alt="{{ $cart->products->product_name }}"> --}}
                        @foreach (explode(',',$cart->products->image) as $item)
                            @if (count(explode(',',$cart->products->image)) > 1)
                                <img src="{{ asset('storage/' . $item) }}" alt="{{ $cart->products->product_name }}" class="mySlides">
                            @else
                                <img src="{{ asset('storage/' . $item) }}" alt="{{ $cart->products->product_name }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 my-auto">
                        <h3>{{ $cart->products->product_name }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h3>Rp.{{ number_format($cart->products->harga, 0,",",".") }}</h3>
                    </div>
                    <div class="col-md-2 my-auto">
                        <div class="text-center">
                            <input type="hidden" class="products_id" value="{{ $cart->products_id }}">
                            <label for="stok">Quantity</label>
                            <div class="mb-3 d-flex justify-content-center flex-row">
                                <button class="btn btn-primary changeQuantity decrement-btn">-</button>
                                <input type="text" name="stok" class="form-control qty-input" value="{{ $cart->qty }}" style="width: 50px">
                                <button class="btn btn-primary changeQuantity increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Delete</button>
                    </div>
                </div>
                @php $total += $cart->products->harga * $cart->qty; @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total : Rp.{{ number_format($total, 0,",",".") }}</h6>
            <button class="btn btn-success float-end">Checkout</button>
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

            var products_id = $(this).closest('.product_data').find('.products_id').val();
            $.ajax({
                method: "POST",
                url: "/delete-cart",
                data: {
                    'products_id' : products_id,
                },
                success: function (response) {
                    window.location.reload();
                    Swal.fire("", response.status, "success");  
                }
            });
        });

        $('.changeQuantity').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var products_id = $(this).closest('.product_data').find('.products_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            data = {
                'products_id' : products_id,
                'qty' : qty,
            }
            $.ajax({
                method: "POST",
                url: "/update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                    Swal.fire(response.status);
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