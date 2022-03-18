<div class="cartPage">
    <div class="card shadow col-8 h-75">
        <div class="btnClose">
            <button id="btnClose"><span data-feather="x"></span></button id="btnClose">
        </div>
        <div class="card-body cart overflow-auto">
            @php
                $total = 0;
            @endphp
            @if ($carts->count())
                @foreach ($carts as $cart)
                    @php 
                        $total += $cart->products->harga * $cart->qty;
                        $image = explode(',',$cart->products->image);
                    @endphp
                    <div class="product_data" style="width:100; display:flex; justify-content:flex-end;">
                        <div class="col-md-2">
                            <img src="{{ asset('storage/' . $image[0]) }}" alt="{{ $cart->products->product_name }}">
                        </div>
                        <div class="col-md-3 my-auto ms-3">
                            <h3>{{ $cart->products->product_name }}</h3>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h3>Rp.{{ number_format($cart->products->harga, 0,",",".") }}</h3>
                        </div>
                        <div class="col-md-2 my-auto">
                            <div class="text-center">
                                <input type="hidden" class="products_id" value="{{ $cart->products_id }}">
                                <input type="hidden" class="harga_product" value="{{ $cart->products->harga }}">
                                <label for="stok">Quantity</label>
                                <div class="mb-3 d-flex justify-content-center flex-row">
                                    <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                    <input type="text" name="stok" class="text-center form-control qty-input rounded-0" value="{{ $cart->qty }}" style="width: 50px; background-color: white; width:70px">
                                    <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item mt-2"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center my-auto">Belum Ada Produk</div>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <h6>Total : Rp.<span class="total-harga">{{ number_format($total, 0,",",".") }}</span></h6>
            <button class="btn btn-success float-end">Checkout</button>
        </div>
    </div>
</div>

<nav>
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btnSearch btn btn-outline-light" type="submit">Search</button>
            </form>
        @auth
            <div style="display: flex; align-items:center; margin-right:75px; height:50px">
                @if (auth()->check())
                    <button class="cartBtn">
                        <img class="cartImg" style="" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                    </button>
                @endif
                <div class="dropdown">
                    <button class="dropbtn">
                        <p style="margin-left:7px; display: inline; font-size:20px; font-family:spartan; font-weight:700; color:white">
                            {{ auth()->user()->name }}
                        </p>
                    </button>
                    <div class="dropdown-content">
                        @if (auth()->user()->role == 'seller')
                                <a href="/dashboard">Dashboard</a>
                        @endif
                        <a href="/profile/update/{{ auth()->user()->id }}">Setting</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button style="margin-left: 16px; margin-bottom: 15px; margin-top: 10px;" id="logout" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div style="display:inline-block; font-size:18px; margin-right:30px; margin-bottom:10px; font-family:spartan; font-weight:800">
                <a class="login" href="/login">Masuk</a>
                <div style="position:relative; top:8px; display:inline-block; height: 30px; border-left:3px solid white; margin:0px 10px 0px 10px"></div>
                <a class="register" href="/register-user">Daftar</a>
            </div>
        @endauth
    </div>

    <div class="middle">
        <a class="home" href="/"><img class="logo" src="{{ asset('assets/img/kelontong-shape.webp') }}" alt="logo"></a>
    </div>

    <div class="bottom">
        <a href="/search?search=Kopi">Kopi</a>
        <a href="/search?search=Air Mineral">Air Mineral</a>
        <a href="/search?search=Obat">Obat</a>
        <a href="/search?search=Sabun Mandi">Sabun Mandi</a>
        <a href="/search?search=Sembako">Sembako</a>
        <a href="/search?search=Sabun Cuci Piring">Sabun Cuci Piring</a>
        <a href="/search?search=Beras">Beras</a>
        <a href="/search?search=Mi Instan">Mi Instan</a>
        <a href="/search?search=Alat Tulis">Alat Tulis</a>
        <a href="/search?search=Gas">Gas</a>
        <a href="/search?search=Token Listrik">Token Listrik</a>
        <a href="/search?search=Pulsa">Pulsa</a>
    </div>
</nav>

<script>
    $('.cartPage').hide();

    $(function(){

        let totalHarga = parseFloat('{{ $total }}');

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function ajaxF(url, data, type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: url,
                data: data,
                dataType: 'json',
            });
        }

        $('.cartBtn').click(function(){
            $('.cartPage').fadeIn(300);
            $('body').css('overflow', 'hidden');
        });

        $('#btnClose').click(function(){
            $('.cartPage').fadeOut(300);
            $('body').css('overflow', 'initial');
            $('.cart').empty();
        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            let inc_value = parseInt($(this).siblings('.qty-input').val());
            inc_value++;
            $(this).siblings('.qty-input').val(inc_value);
            let products_id = $(this).parent().siblings(".products_id").val();
            let harga = parseFloat($(this).parent().siblings(".harga_product").val());
            ajaxF('/update-cart', {'products_id' : products_id, 'qty' : inc_value,}, 'PUT');
            totalHarga += harga;
            $('.total-harga').html(nDots(totalHarga));
        });
        
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            let dec_value = parseInt($(this).siblings('.qty-input').val());
            if(dec_value > 1){
                dec_value--
                $(this).siblings('.qty-input').val(dec_value);
                let products_id = $(this).parent().siblings(".products_id").val();
                let harga = parseFloat($(this).parent().siblings(".harga_product").val());
                ajaxF('/update-cart', {'products_id' : products_id, 'qty' : dec_value,}, 'PUT');
                totalHarga -= harga;
                $('.total-harga').html(nDots(totalHarga));
            }
        });

        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();
            let products_id = $(this).closest('.product_data').find('.products_id').val();
            let remE = $(this).parents('.product_data');
            remE.remove();
            ajaxF('/delete-cart', {'products_id' : products_id,}, 'DELETE');
            let qty = parseInt($(this).closest('.product_data').find(".qty-input").val());
            let harga = parseFloat($(this).closest('.product_data').find(".harga_product").val());
            totalHarga -= (qty * harga);
            console.log(harga);
            $('.total-harga').html(nDots(totalHarga));
        });
    });
</script>




