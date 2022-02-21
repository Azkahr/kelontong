@extends('layouts.main')
@section('container')
<x:notify-messages />
@include('layouts/navbar')
<div v-show="modal" class="cartPage">
    <div class="cart">
        
    </div>
</div>
<div class="latest">
    
</div>
<div id="category" class="category">

</div>

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