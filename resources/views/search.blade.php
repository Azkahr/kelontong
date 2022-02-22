@extends('layouts.main')
@section('container')
<h1>Hasil pencarian "{{ request('search') }}"</h1>
<div class="container mt-5">
    <div class="row">
        @foreach ($products as $product)
        <div class="card" style="width: 18rem; margin-right: 20px; margin-top: 5px">
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