@extends('layouts.main')

@section('container')
    <h1>Test</h1>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-dark border-0">Logout</button>
        </form>
@endsection