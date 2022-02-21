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

                @if ($product->image)
                    <div style="max-height: 300px; overflow:hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
                    </div>
                @endif

                <article class="my-3 fs-6">
                    {!! $product->desc !!}
                </article>
            </div>
        </div>
    </div>
@endsection