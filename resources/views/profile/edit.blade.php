@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-center mt-3">
        <div class="col-md-5">
            <form action="/profile/update/{{ $user->id }}" method="post" class="mb-5" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update profile</button>
            </form>
        </div>
    </div>
@endsection