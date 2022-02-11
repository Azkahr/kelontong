@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">    
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('resetPassword') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus id="email" placeholder="name@example.com" value="{{ $email ?? old('email') }}" autocomplete="off">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="role" value="user">
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm password">
                <label for="password_confirmation">Confirm password</label>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Reset password   </button>
            </form>
            <small class="d-block text-center"><a href="/login">Login now!</a></small>
        </main>
    </div>
</div>

@endsection