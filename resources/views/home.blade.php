@extends('layouts.main')
@section('container')
@include('layouts/navbar')
<div v-show="modal" class="cartPage">
    <div class="cart">
        
    </div>
</div>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
        <div class="card">
            @if ($productLatest->image)
                <img src="{{ asset('storage/'.$productLatest->image) }}" class="card-img-top" alt="product image">
            @else
                <img src="https://source.unsplash.com/400x300/?{{ $productLatest->category->name }}" width="50px" height="50px" class="card-img-top" alt="product image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $productLatest->product_name }}</h5>
                <p class="card-text">{{ $productLatest->desc }}</p>
            </div>
        </div>
    </div>
</div>
<div id="category" class="category">

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