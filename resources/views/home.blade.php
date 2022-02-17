@extends('layouts.main')
@section('container')
@include('layouts/navbar')
<div v-show="modal" class="cartPage">
    <div class="cart">
        
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