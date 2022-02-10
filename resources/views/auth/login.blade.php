@extends('layouts.main')
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Spartan:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Spartan:wght@700&display=swap');
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
    .container-master{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        background-color: #fdfdff;
    }

    .container-master > .container{
        margin: 0;
        padding: 0;
        display: flex;
        width: 70%;
        height: 90%;
        background-color: white;
        box-shadow: -3px 0px 20px 5px rgba(0, 0, 0, 0.2);
    }

    .container .side{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40%;
        height: 100%;
        background-color: #1d78ce;
    } 

    .container .login{
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
    <div class="container-master">
        <div class="container">
            <div class="side">
                <div style="display: flex; flex-direction: column; width: 100%;">
                    <div style="display: flex; justify-content:center">
                        <a href="/"><img src="{{ asset('assets/img/snack-booth.png') }}" style="filter: invert(100%)" width="65px" alt="logo"></a>
                    </div>
                    <div style="display: flex; justify-content:center; margin-top:10px">
                        <a href="/" style="text-decoration:none; font-family: Spartan; font-weight:700; font-size:19px; color:white">Kelontong.ID</a>
                    </div>
                </div>
            </div>
            <div class="login">
                <div style="width:100%; height:100%; display:flex; align-items:center; margin-left:70px">
                    <form action="/login" method="post">
                    @csrf
                        <h1>HAYUU LOGIN</h1>
                        <div>
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" size="50">
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
                            <label for="remember">Remember Me :</label>
                            <input type="checkbox" name="remember" id="remember">
                        </div>
                        <div class="d-flex justify-content-center" style="margin-top:15px;">
                            <button style="width: 100%;" class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <div class="d-flex justify-content-between" style="margin-top:15px;">
                            <a style="text-decoration:none" href="{{ route('forgot') }}">Forgot Password</a>
                            <a style="text-decoration:none" href="/register">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection