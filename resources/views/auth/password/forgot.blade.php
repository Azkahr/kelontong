@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Forgot password</h1>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <p>Tuliskan alamat email yang kalian gunakan untuk login ke website kami, dan kami akan mengirim link untuk merubah password anda</p>
            <form action="{{ route('resetLink') }}" method="post">
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
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Send reset password link</button>
            </form>
                <a href="{{ route('login') }}">login</a>
        </main>
    </div>
</div>
@endsection