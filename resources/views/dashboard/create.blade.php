@extends('layouts/dmain')
@section('content')
<div id="container" class="d-flex justify-content-center">
    <div class="col-lg-10">
        <form action="/dashboard/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Nama Product</label>
                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" autofocus>
                @error('product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok Product</label>
                <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value={{ old('stok') }}>
                @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Produk</label>
                <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value={{ old('harga') }}>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id" value="{{ old('category_id') }}">
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
                <label for="image" class="form-label">Foto Produk</label>
                <div style="overflow:auto; display: flex; gap: 5px; margin-bottom:10px" id="image_preview"></div>
                <div><a id="btnC" class="btn btn-danger" style="display:none; cursor: pointer;" onclick="cancelImage()">Batalkan Foto</a></div>
                <input style="margin:0" type="file" id="image" name="image[]" class="form-control @error('image') is-invalid @enderror" multiple onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="desc" class="form-label mt-4">Deksripsi Produk</label>
                @error('desc')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                <trix-editor input="desc"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Posting Produk</button>
        </form>
    </div>
</div>
<script>
    function cancelImage(){
        $('#image_preview').empty();
        $('#image').val('');
        document.getElementById('btnC').style.display="none";
    }

    function previewImage(){
        const imageL = document.querySelector('#image').files.length;
        for(i = 0; i < imageL; i++){
            $('#image_preview').append("<img style='height:250px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }
        document.getElementById('btnC').style.display="block";
    }
</script>
@endsection