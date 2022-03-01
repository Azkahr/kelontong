@extends('layouts.main')
@section('container')
@include('layouts.navbar')
<style>
    .card {
        margin-top: 150px;
        margin: 0;
    }

    .text {
        color: grey;
        margin-top: 150px;
        margin: 0;
        margin-bottom: 10px;
    }
    
    .test a.kiri {
        text-decoration: none;
        float: left;
        margin-top: 150px;
        margin-right: 20px;
    }

    .test a.kanan {
        float: left;
        text-decoration: none;
        margin-top: 150px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="test mb-2">
            <a href="#" class="kiri">Produk</a>
            <a href="#" class="kanan">Toko</a>
        </div>
        <hr>
        <p class="text">Menampilkan pencarian hasil pencarian "{{ request('search') }}"</p>
        @foreach ($products as $product)
        <div class="card" style="width: 18rem; margin-right: 20px;">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <h6>RP {{ number_format($product->harga, 0,",",".") }}</h6>
                <p class="card-text text-muted">{{ $product->category->name }}</p>
                <a href="/detail/{{ $product->id }}" class="btn btn-primary">Detail product</a>
            </div>
        </div>
        @endforeach
        <a href="/">Home</a>
    </div>
</div>
@endsection