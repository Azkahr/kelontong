@extends('layouts.main')

@section('container')
    <div class="col-lg-6">
        <form action="/dashboard/create" method="post" enctype="multipart/form">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                <label for="body" class="form-label mt-4">Body</label>
                <textarea rows="10" cols="73" name="body" id="body" class="form-control"></textarea>
            </div>
        </form>
    </div>
@endsection