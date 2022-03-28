@extends('layouts.main')
@section('headC')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection
@section('container')
@include('partials/navbar')
<div class="product-master-container">
    <div class="product-container">
        <div class="product-image">
            <div class="slider">
                @foreach (explode(',', $product->image) as $item)
                    <img src="{{ asset('storage/'.$item) }}" alt="product-image">
                @endforeach
            </div>
            <div class="arrowPrev" data-feather="arrow-left"></div>
            <div class="arrowNext" data-feather="arrow-right"></div>
        </div>
        <div class="product-content">
            <div class="content-header">
                <p class="h2">{{ $product->product_name }}</p>
                <p class="h3">RP {{ number_format($product->harga, 0,",",".") }}</p>
                <div class="d-flex align-items-center mb-3 justify-content-between">
                    <div class="d-flex align-items-center">
                        <span class="me-3">Terjual 80</span> 
                        <img class="me-1" width="20px" src="{{ asset('assets/img/star.png') }}" alt="bintang">
                        <span>5.0</span>
                    </div>
                    <div class="d-flex align-items-center">
                        @if ($product->toko->image)
                            <img class="foto-toko" src="{{ asset('storage/'.$product->toko->image) }}" alt="image-profile">
                        @else
                            <img class="foto-toko" src="{{ asset('storage/'.$product->toko->image) }}" alt="image-profile">
                        @endif
                        <a href="#" class="ms-2"><p>{{ $product->toko->nama_toko }}</p></a>
                    </div>
                </div>
                <div class="d-flex justify-content-between border-top border-bottom py-2 px-1">
                    Category: {{ $product->category->name }} | Stok: {{ $product->stok }}
                    @if ($product->stok < 1)
                        <span class="badge badge-danger bg-danger">Stok Habis</span>
                    @else
                        <span class="badge badge-success bg-success">Stok Tersedia</span>
                    @endif 
                </div>
            </div>
            <p>{!! $product->desc !!}</p>
        </div>
    </div>
    <div class="product-cart">
        <div class="varian">
            <label for="varian" style="font-family:Spartan; font-weight:600" class="text-light">Pilih Varian</label>
            <select class="form-select" name="varian" id="varian">
                <option value="varian1">Varian 1</option>
                <option value="varian2">Varian 2</option>
                <option value="varian3">Varian 3</option>
            </select>
        </div>
        <input id="catatan" class="form-control mt-2" type="text" placeholder="Catatan Untuk Penjual">
        <hr class="mt-3 opacity-100 w-75 bg-light mx-auto">
        <button class="btn w-100 mt-3" style="background-color:white">Tambah Ke Keranjang</button>
        <div>
            <p>Chat</p>

        </div>
    </div>
    <div class="product-comment">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, labore, totam modi doloribus cupiditate repellat quia explicabo, sed corrupti impedit illum tenetur? Ipsum quisquam impedit dignissimos officia sequi laboriosam ex ratione cum mollitia. Ipsum animi sapiente autem quasi culpa dolore quod nisi, facere sint quam omnis nobis qui, eaque asperiores odio nam minima velit soluta voluptas aut id laborum modi? Officiis laboriosam totam quibusdam reprehenderit beatae, harum commodi numquam aliquid exercitationem ea dolorum corporis, dolores quae inventore necessitatibus, voluptate dicta fugit? Quo nam rem amet explicabo, voluptates deleniti illo ea accusamus fugit natus, maiores consequatur sunt labore dignissimos provident dolor neque suscipit exercitationem porro consequuntur alias consectetur sapiente doloremque minus! Earum sint sit quae quos magnam, libero tenetur blanditiis ratione, a harum maiores. Quibusdam officia, suscipit necessitatibus quae blanditiis veritatis doloremque quia quidem aspernatur id est sint? Iusto tempora officiis ut rem, animi necessitatibus quasi placeat labore nulla saepe quaerat deleniti, neque nostrum, culpa aspernatur nobis itaque in voluptate! Reiciendis repellendus labore hic a nihil sapiente iusto soluta ea enim nostrum incidunt veniam porro, necessitatibus expedita consequatur saepe ullam accusantium aspernatur odio quibusdam! Suscipit nesciunt, iste aut neque esse, quis ipsa commodi necessitatibus doloremque exercitationem aspernatur excepturi ducimus unde facere? Error beatae magni perspiciatis molestiae sed dicta, incidunt ab inventore quam illo non laborum nesciunt facere, veritatis eligendi? Tempora reprehenderit, officia veritatis optio aspernatur corrupti aliquid tenetur. Velit, vitae expedita necessitatibus atque minus totam nisi hic maxime voluptatibus amet. Cum a incidunt eveniet dolore vitae. Eligendi possimus ut ullam sunt fuga consequatur incidunt molestias unde iure, eius magni inventore blanditiis voluptatibus illo accusantium iste soluta velit asperiores vitae corporis magnam quasi suscipit tempore? Nisi recusandae laboriosam repudiandae accusamus. Voluptatum, praesentium quod. Veniam cum nostrum modi quo quidem temporibus corporis ut blanditiis eaque veritatis amet sequi praesentium pariatur eum voluptatibus, nemo consectetur maiores officia, illum asperiores quia tempora dolor doloremque! Repellat, aliquid repudiandae perferendis eius aut soluta officia quod assumenda debitis modi beatae labore laborum magnam. Dolorem officiis, ipsam ex suscipit, hic aliquam dolor similique a laborum tenetur magnam corrupti! Quia fugit a corporis, nihil aspernatur sed distinctio consequatur. Sed laboriosam nobis, a voluptates expedita dolores perspiciatis magnam similique enim exercitationem ex qui? Dolores quibusdam repellat dolorem ipsum tempore magni, veritatis illum nobis porro natus, deleniti illo doloribus delectus obcaecati, nostrum quasi velit suscipit! Et laboriosam repellat voluptas consequuntur libero? Veritatis vero sint, debitis eius tenetur ea eveniet consequuntur unde reprehenderit quam quis nostrum nulla laborum assumenda accusantium! Esse, aliquam, iste reprehenderit provident cum voluptates cupiditate nemo soluta voluptate cumque quod nihil adipisci praesentium maxime? Laborum cum fugit aspernatur nam quaerat ea natus amet itaque saepe iure in laboriosam unde, perferendis aut libero minus eum delectus explicabo ipsum fuga? Facere ullam, consectetur numquam nihil veritatis explicabo, distinctio blanditiis iure accusamus earum sed odio ratione. Debitis reprehenderit eos modi, eaque ratione dicta nisi voluptatum deleniti vel? Eligendi laudantium ipsam quod unde, quia corrupti excepturi quam optio veniam tempora delectus, fuga eveniet ipsum, reprehenderit officia quaerat voluptatem minima! Consequatur nihil quos itaque sed.
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function () {
    $('.slider').slick({
        prevArrow: '.arrowPrev',
        nextArrow: '.arrowNext',
    });
    $('#addToCartBtn').click(function (e) { 
        let products_qty = $('.qty-input2').val();
        let image = $('#image-source').val();
        let name = '{{ $product->product_name }}';
        let harga = '{{ $product->harga }}';
        let id = '{{ $product->id }}';

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'products_id' : '{{ $product->id }}',
                'products_qty' : products_qty,
            },
            dataType: "json",
            success: function (response) {
                if(response.status === "Produk Berhasil Ditambahkan Ke Keranjang"){
                    $('#card-body').append(
                        `
                        <div class="product_data mt-3" style="width:100; display:flex; justify-content:flex-end;">
                            <div class="col-md-2">
                                <img src="`+ image +`" alt="`+ name +`">
                            </div>
                            <div class="col-md-3 my-auto ms-3">
                                <h3>`+ name +`</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h3>Rp.`+ nDots(harga) +`</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="text-center">
                                    <label for="stok">Quantity</label>
                                    <div class="mb-3 d-flex justify-content-center flex-row" id="qty">
                                        <input type="hidden" class="products_id" value="`+ id +`">
                                        <input type="hidden" class="harga_product" value="`+ harga +`">
                                        <input type="hidden" class="stok_product" value="`+ qty +`">
                                        <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                        <input type="text" name="stok" class="text-center form-control qty-input rounded-0" value="`+ products_qty +`" style="width: 50px; background-color: white; width:70px">
                                        <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `
                    );
                    window.totalHarga += (products_qty * harga);
                    $('.total-harga').html(nDots(totalHarga));
                    Swal.fire(response.status);
                }else{
                    Swal.fire(response.status);
                }
            }
        });
    });
    
    $('.increment-btn2').click(function (e) { 
        e.preventDefault();

        let qty = parseInt('{{ $product->stok }}');
        var inc_value = $('.qty-input2').val();
        var value = parseInt(inc_value);
        value = isNaN(value) ? 0 : value;
        if(qty > value){
            value++;
            $('.qty-input2').val(value);
        }
    });
    
    $('.decrement-btn2').click(function (e) { 
        e.preventDefault();
        var dec_value = $('.qty-input2').val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.qty-input2').val(value);
        }
    });
});
</script>
@endsection
