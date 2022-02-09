@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">    
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Reset Password</h1>
            <form action="" method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autocomplete="off">
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
                <input type="password" name="cpassword" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" placeholder="Confirm password">
                <label for="cpassword">Confirm password</label>
                @error('cpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center">Already registered? <a href="/login">Login now!</a></small>
        </main>
    </div>
</div>

@endsection