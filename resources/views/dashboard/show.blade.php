@extends('layouts.dmain')

@section('content')
    <style>
        .in {
            text-align: center;
        }

        .in h6 {
            display: inline-block;
            opacity: 70%;
        }
    </style>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $product->product_name }}</h1>
                
                <div class="in">
                    <h6>Product : {{ $product->product_name }}</h6>|
                    <h6>Stock product : {{ $totalqty }}</h6>|
                    <h6>Category : {{ $product->category->name }}</h6>|
                    <h6>Harga : RP {{ number_format($product->harga, 0,",",".") }}</h6>
                </div>

                    <div style="max-height: 300px; overflow:hidden">
                        @foreach (explode(',',$product->image) as $item)
                            <img src="{{ asset('storage/' . $item) }}" class="mySlides" alt="{{ $product->product_name }}">
                        @endforeach
                    </div>

                <article class="my-3 fs-6">
                    {!! $product->desc !!}
                </article>
            </div>
        </div>
    </div>
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
</script>
@endsection