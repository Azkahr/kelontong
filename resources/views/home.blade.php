@extends('layouts.main')
@section('container')
@include('layouts/navbar')
<div v-show="modal" class="cartPage">
    <div class="cart">
        
    </div>
</div>
<div class="latest">
    
</div>
<div id="category" class="category">

</div>

<div class="container mt-5" style="padding: 100px">
    <div class="row">
        @foreach ($products as $product)
        <div class="card" style="width: 18rem; margin-right: 20px; margin-top: 5px">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text text-muted">{{ $product->category->name }}</p>
                <a href="/detail/{{ $product->id }}" class="btn btn-primary">Detail product</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<x:notify-messages />
<script>
    Vue.createApp({
        data() {
            return {
                modal: false,
            }
        },
        methods: {
            showCart(){
                this.modal = !this.modal
            }
        }
    }).mount('#container')
</script>
@endsection