@extends('layouts/dmain')
@section('content')
    <div class="col-lg-6">
        <form action="/dashboard/create" method="post" enctype="multipart/form">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Product</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="qty" class="form-label">Stok Product</label>
                <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror">
                @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label mt-4">Deksripsi Produk</label>
                <textarea rows="10" cols="73" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror"></textarea>
                @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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

            <div class="mb-3">
                <label for="image" class="form-label mt-4">Foto Produk</label>
                <input type="file" id="image" enctype="multipart/form-data" class="form-control @error('image') is-invalid @enderror" multiple>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Posting Produk</button>
        </form>
    </div>
@endsection