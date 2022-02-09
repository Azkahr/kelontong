@extends('layouts.main')

@section('container')
<x:notify-messages />
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            @if (session()->has('info'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            <form action="/login" method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
                <a href="{{ route('forgot') }}">Forgot password?</a>
            </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
            </form>
            <small class="d-block text-center">Not registered? <a href="/register">Register now!</a></small>
        </main>
    </div>
</div>
@endsection