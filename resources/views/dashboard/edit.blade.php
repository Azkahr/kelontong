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
                    <label for="stok" class="form-label">Stok Product</label>
                    <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $product->stok }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk (Rupiah)</label>
                    <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value={{ $product->harga }}>
                    @error('harga')
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
                    <label id="labelFoto" for="image" class="form-label">Foto Produk Sebelumnya</label>
                    @if ($product->image)
                        <div id="image_preview" style="overflow:auto; height: 200px; display: flex; gap: 5px; margin-bottom:10px">
                                @foreach ($image as $img)
                                    <img src="{{ asset('storage/'.$img) }}" alt="foto">
                                @endforeach
                        </div>
                    @else
                        <div style="overflow:auto; display: flex; gap: 5px; margin-bottom:10px" id="image_preview"></div>
                    @endif
                    <div><a id="btnC" class="btn btn-danger" style="display:none; cursor: pointer;" onclick="cancelImage()">Batalkan Foto</a></div>
                    <input style="margin:0" type="file" id="image" name="image[]" class="form-control @error('image') is-invalid @enderror" multiple>
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
                    <input id="desc" type="hidden" name="desc" value="{{ old('desc', $product->desc) }}">
                    <trix-editor input="desc"></trix-editor>
                </div>

                <input type="hidden" value="{{ $product->image }}" name="oldImage">

                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
            
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#harga').val(nDots($('#harga').val()));

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function cancelImage(){
            $('#image_preview').empty();
            $('#image').val('');
            document.getElementById('btnC').style.display="none";
        }

        function previewImage(){
            const imageL = document.querySelector('#image').files.length;
            $('#image_preview').empty();
            for(i = 0; i < imageL; i++){
                $('#image_preview').append("<img style='height:200px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
            document.getElementById('btnC').style.display="block";
            document.getElementById('labelFoto').innerHTML="Foto Produk";
        }
        
        $('#harga').change(function (e) {
            let awal = $('#harga').val();
            $('#harga').val(nDots(awal));
        });

        $('#image').change(function (event) { 
            event.preventDefault();
            if($('#image_preview').children().length > 0){
                $('#image_preview').empty();
                previewImage();
            }else{
                previewImage();
            }
        });
    </script>
@endsection