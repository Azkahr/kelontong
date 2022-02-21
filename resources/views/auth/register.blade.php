@extends('layouts.main')
<style>
/* For extremely small screen devices (595px and below) */
@media only screen and (max-width: 595px) {
}

/* Small screen devices (600px and above) */
@media only screen and (min-width: 600px) {
}

/* Medium screen devices (768px and above) */
@media only screen and (min-width: 768px) {
}

/* Big screen devices (889px and above) */
@media only screen and (min-width: 889px) {
}

/* Extra big screen devices (1200px and above) */
@media only screen and (min-width: 1200px) {
    .container-master {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        background-color: #fdfdff;
    }

    .container-master > .container {
        margin: 0;
        padding: 0;
        display: flex;
        width: 70%;
        height: 90%;
        background-color: white;
        box-shadow: -3px 3px 20px 5px rgba(0, 0, 0, 0.2);
    }

    .container .side {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40%;
        height: 100%;
        background-color: #1d78ce;
    }

    .container .container-register .register{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .container-register{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 60%;
        height: 100%;
    }
}
</style>
@section('container')
<x:notify-messages />
<div class="container-master" id="container-master">
    <div class="container">
        <div class="side">
            <div style="display: flex; flex-direction: column; width: 100%;">
                <div style="display: flex; justify-content:center">
                    <a href="/"><img src="{{ URL::asset('/assets/img/snack-booth.png') }}" style="filter: invert(100%)" width="65px" alt="logo"></a>
                </div>
                <div style="display: flex; justify-content:center; margin-top:10px">
                    <a href="/" style="text-decoration:none; font-family: Spartan; font-weight:700; font-size:19px; color:white">Kelontong.ID</a>
                </div>
            </div>
        </div>

        <div class="container-register" id="container-register">
            <div v-show="modalUser" class="register">
                <div style="width:100%; height:100%; display:flex; align-items:center; margin-left:70px; color:black">
                    <form action="/register" method="post">
                    @csrf
                        <h1>@{{ judul }}</h1>
                        <div>
                            <label for="name">Nama :</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus id="name" size="50">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus id="email" size="50">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password">Password :</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" size="50">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="cpassword">Confirm Password :</label>
                            <input type="password" name="cpassword" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" size="50">
                            @error('cpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="role" value="user">
                        <div class="d-flex justify-content-center" style="margin-top:15px;">
                            <button style="width: 100%;" class="btn btn-primary" type="submit">Daftar</button>
                        </div>
                        <form>
                            <div class="d-flex justify-content-start" style="margin-top:15px;">
                                <button style="color: #0D6EFD" v-on:click.prevent="showSeller()">Daftar Sebagai Seller</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
    
            <div v-show="modalSeller" class="register">
                <div style="width:100%; height:100%; display:flex; align-items:center; margin-left:70px; color:black">
                    <form action="/daftar" method="post">
                    @csrf
                        <h1>@{{ judul }}</h1>
                        <div>
                            <label for="name">Nama :</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus id="name" size="50">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="nama_toko">Nama Toko :</label>
                            <input type="text" name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" size="50">
                            @error('nama_toko')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus id="email" size="50">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password">Password :</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" size="50">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="cpassword">Confirm Password :</label>
                            <input type="password" name="cpassword" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" size="50">
                            @error('cpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="role" value="seller">
                        <div class="d-flex justify-content-center" style="margin-top:15px;">
                            <button style="width: 100%;" class="btn btn-primary" type="submit">Daftar</button>
                        </div>
                        <form>
                            <div class="d-flex justify-content-start" style="margin-top:15px;">
                                <button style="color: #0D6EFD" v-on:click.prevent="showUser()">Daftar Sebagai Buyer</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    Vue.createApp({
        data() {
            return {
                judul: 'HAYUU DAFTAR',
                modalUser: true,
                modalSeller: false,
            }
        },
        methods: {
            showUser(){
                this.judul = 'HAYUU DAFTAR'
                this.modalUser = true
                this.modalSeller = false
            },
            showSeller(){
                this.judul = 'HAYUU JUALAN'
                this.modalUser = false
                this.modalSeller = true
            }
        }
    }).mount('#container-register')
</script>
@endsection