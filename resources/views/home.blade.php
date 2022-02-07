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
    <a href="/dashboard">Kembali ke dashboard</a>
    @else
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    @endauth
@endsection