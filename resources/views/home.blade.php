@extends('layouts.main')

@section('container')
    <h1>Halaman home</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth
    <h6>Welcome, {{ auth()->user()->name }}</h6>
    <form action="/logout" method="post">@csrf<button type="submit" style="margin:0; padding:2px; border: none; background-color:transparent"><span style="font-family:'Open Sans', sans-serif; font-size:14px; font-weight:600; color:#707C95" class="nav-link-text ms-1" >Logout</span></button></form>
    @can('isSeller')
    <a href="/dashboard">Kembali ke dashboard</a>
    @endcan
    @else
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    <br>
    <br>
    <a href="/daftar">Register seller</a>
    @endauth
@endsection