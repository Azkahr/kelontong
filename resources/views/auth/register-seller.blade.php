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
                    <a href="/"><img src="{{ URL::asset('/assets/img/snack-booth.svg') }}" style="filter: invert(100%)" width="65px" alt="logo"></a>
                </div>
                <div style="display: flex; justify-content:center; margin-top:10px">
                    <a href="/" style="text-decoration:none; font-family: Spartan; font-weight:700; font-size:19px; color:white">Kelontong.ID</a>
                </div>
            </div>
        </div>

        <div class="register">
            <div style="width:100%; height:100%; display:flex; align-items:center; margin-left:70px; color:black">
                <form action="{{ route('sellerPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <p style="font-size:32pt; font-family:Spartan; font-weight:500">HAYUU JUALAN</p>
                    <div>
                        <label for="nama_toko">Nama Toko :</label>
                        <input type="text" id="nama_toko" name="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" value="{{ old('nama_toko') }}" autofocus  size="50">
                        @error('nama_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kota">Kota :</label>
                        <input type="text" id="kota" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota') }}" size="50">
                        @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat">Alamat :</label>
                        <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" size="50">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="nohp">No Handphone :</label>
                        <input type="tel" id="noHp" name="noHp" class="form-control @error('noHp') is-invalid @enderror" value="{{ old('noHp') }}" size="50">
                        @error('noHp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="image">Foto Profile Toko:</label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" size="50">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center" style="margin-top:15px;">
                        <button style="width: 100%;" class="btn btn-primary" type="submit">Buka Toko</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection