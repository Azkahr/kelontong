@extends('layouts.main')
@section('headC')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection
@section('container')
@include('partials/navbar')
<div class="container-product">
    <div class="product-image">

    </div>
    <div class="product-content">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae possimus sint quibusdam quo, itaque nesciunt quam numquam, reprehenderit rem officiis fuga distinctio saepe maxime cumque odio in nam ratione. Hic aliquam cupiditate praesentium quis minus aliquid quas tempore incidunt similique mollitia dolor id cumque magnam, officia ab fugit alias tempora rerum. Porro quo voluptates optio soluta ipsa perspiciatis numquam, quia ab rem debitis, fugit esse iste ratione cumque a vitae impedit corrupti ipsam nobis voluptatum quaerat vel dolorem repellendus eos. Ut, dolorem adipisci voluptatibus maxime magni quaerat maiores vel labore qui, harum doloremque accusantium, iure officia beatae fugiat id. Nesciunt tempora at reiciendis. Doloremque soluta officia repellat quidem omnis, distinctio enim sequi et? Ipsa dicta adipisci sunt at laudantium qui debitis. Iste delectus modi, quia recusandae animi, sequi quo amet maiores culpa autem tenetur consectetur asperiores nostrum alias dicta temporibus minima quae eos mollitia sunt rerum ipsum! Labore error libero dolorum, similique odit esse alias debitis, voluptatum non, quae ea mollitia quibusdam consequuntur. Possimus excepturi perferendis tempore fugiat culpa. Labore tenetur modi distinctio aut, repellat cumque fugiat, cupiditate corporis rerum omnis delectus veritatis iste nemo, facere similique quas asperiores temporibus eaque. Laudantium voluptates quisquam optio ullam mollitia modi tenetur hic quis odio, dolorem placeat, quasi sapiente natus similique illo beatae quam, alias rerum soluta! Ducimus modi commodi eum beatae. Dolor adipisci explicabo sint quidem corporis eius, ab a magni. Error, libero. Maiores fugit, animi doloremque ut beatae est minima unde hic, id nostrum ullam? Harum adipisci fugiat in perferendis iure perspiciatis voluptatem eius deleniti aspernatur vitae doloremque praesentium nobis ratione facilis dignissimos aliquid repellat recusandae laudantium veritatis consectetur, asperiores facere. Vitae animi architecto tempora unde saepe. Corporis fugit eveniet, necessitatibus quibusdam harum quas repudiandae autem optio id corrupti ipsum explicabo minus nostrum minima, laudantium voluptate nulla deserunt voluptatibus laborum accusantium sed? Sapiente neque voluptas modi provident quae eligendi laudantium aliquid, est ad nostrum qui sunt molestias beatae accusantium error fugiat explicabo minima ut quibusdam exercitationem earum? Odit, natus quisquam. Maiores non, quos iste dolore iure excepturi cumque autem quod sequi fugit at obcaecati rerum? Esse id minima nisi atque itaque iusto assumenda necessitatibus, corrupti a perferendis cum illum nulla magnam corporis sit, aut error. Voluptas nulla sint aperiam, fuga aliquid praesentium fugit! Rerum inventore natus harum rem, asperiores expedita magni ea quod! Voluptates, ea autem. Perspiciatis repudiandae eveniet placeat perferendis ad temporibus ex suscipit eius vel repellendus consequuntur quae quibusdam ea totam omnis, facere assumenda sed culpa est dolores voluptates, earum ratione quis? Dignissimos iusto dolorem eveniet rerum reiciendis nobis quisquam quia minus aut, in eaque ab eligendi voluptate vel incidunt ipsam reprehenderit, nulla blanditiis laborum odit consectetur fuga. Alias laboriosam repellat quibusdam architecto velit dignissimos quo est? Consequuntur nam eum officiis possimus, fugiat similique est natus adipisci perspiciatis consequatur repellendus commodi hic sit odio rem soluta dolore animi iusto voluptatibus non laborum distinctio quia eius vitae! Obcaecati culpa eos vel molestiae repellat. Quis placeat quaerat quidem omnis animi esse sed eos nemo? Mollitia error hic impedit sunt consequatur.
    </div>
</div>
<div class="container-comment">

</div>
@endsection
@section('script')
<script>
$(document).ready(function () {
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
                                        <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                        <input type="text" name="stok" class="text-center form-control qty-input rounded-0" value="`+ products_qty +`" style="width: 50px; background-color: white; width:70px">
                                        <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item mt-2"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                        `
                    );
                    Swal.fire(response.status);
                }else{
                    Swal.fire(response.status);
                }
            }
        });
        window.totalHarga += (products_qty * harga);
        $('.total-harga').html(nDots(totalHarga));
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
