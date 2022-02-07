@extends('layouts/dmain')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-10">
            <form action="/dashboard/update/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Product</label>
                    <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $product->product_name }}">
                    @error('product_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Stok Product</label>
                    <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $product->qty) }}">
                    @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="desc" class="form-label mt-4">Deksripsi Produk</label>
                    <input id="desc" type="hidden" name="desc" value="{{ old('desc', $product->desc) }}">
                    <trix-editor input="desc"></trix-editor>
                    @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id" id="category_id" value="{{ old('category_id', $product->category_id) }}">
                    @foreach ($categories as $category)
                        @if ($product->category_id === $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Produk</label>
                    <input type="hidden" name="oldImage" value="{{ $product->image }}">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="hidden" value="{{ $product->image }}" name="oldImage">

                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
            
        </div>
    </div>
    <script>
        
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
        
    </script>
@endsection