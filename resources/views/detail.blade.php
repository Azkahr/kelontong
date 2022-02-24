@extends('layouts.main')
@section('container')
    <style>
        .container {
            margin-top: 10px;
            padding: 50px;
            display: flex;
        }
        .image {
            margin-right: 30px; 
            width: 500px; 
            height: 400px; 
            float: left;
        }

        .detail-top h6 {
            margin-top: 10px;
            display: flex;
        }

        .detail-mid p {
            margin: 0 auto;
            width: 300px;
        }

        .detail-bot img {
            float: left;
            margin-right: 10px;
        }
    </style>
    <div class="container">
        <div class="image">
            <img src="{{ asset('storage/' . $product->image) }}" class="mr-5" alt="{{ $product->product_name }}">
        </div>
        <div class="detail-top">
            <h5>{{ $product->product_name }}</h5>
            <p class="text-muted" style="float: left; margin-right: 3px;">{{ $product->category->name }} |</p>
            <p class="text-muted">Stok tersedia : {{ $totalqty }}</p>
            <h6>RP {{ number_format($product->harga, 0,",",".") }}</h6>
        <div>
        <div class="detail-mid">
            <hr>
                <h5>Detail</h5>
            <hr>
            <p>{!! $product->desc !!}</p>
            <hr>
        </div>
        <div class="detail-bot">
            <img src="{{ asset('storage/' . $product->user->image) }}" alt="belum mempunyai profile picture" class="rounded-circle d-block" style="width: 50px; height: 45px">
            <h6>{{ $product->user->nama_toko }}</h6>
        </div>
    </div>
@endsection