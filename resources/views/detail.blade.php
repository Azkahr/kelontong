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
            width: 350px; 
            height: 300px; 
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
        }
    </style>
    <div class="container">
        <div class="image">
            <img src="{{ asset('storage/' . $product->image) }}" class="mr-5" alt="{{ $product->product_name }}">
        </div>
        <div class="detail-top">
            <h5>{{ $product->product_name }}</h5>
            <p class="text-muted">{{ $product->category->name }}</p>
            <p class="text-muted">Stok tersedia : {{ $totalqty }}</p>
            <h6>RP {{ number_format($product->harga, 0,",",".") }}</h6>
        <div>
        <div class="detail-mid">
            <hr>
                <h5>Detail</h5>
            <hr>
            <p>{!! $product->desc !!}</p>
        </div>
        <hr>
        <div class="detail-bot">
            {{-- @if ($user->image) --}}
                {{-- <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle d-block" style="width: 50px; height: 45px"> --}}
            {{-- @else --}}
                <img class="img-preview rounded-circle img-fluid mb-3 col-sm-5 d-block" src="{{ URL::asset('assets/img/user.png') }}" style="width: 50px; height: 45px">
            {{-- @endif --}}
            <h6>Nama toko</h6>
        </div>
    </div>
@endsection