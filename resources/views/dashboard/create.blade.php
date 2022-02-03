@extends('layouts/dmain')
@section('content')
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
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection