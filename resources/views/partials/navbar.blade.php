<div class="cartPage">
    <div class="card shadow col-8 h-75">
        <div class="btnClose">
            <button id="btnClose"><span data-feather="x"></span></button id="btnClose">
        </div>
        <div class="card-body overflow-auto" id="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($carts as $cart)
                @php 
                    $total += $cart->products->harga * $cart->qty;
                    $image = explode(',',$cart->products->image);
                @endphp
                <div class="product_data mt-3" style="width:100; display:flex; justify-content:flex-end;">
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
                            <label for="stok">Quantity</label>
                            <div class="mb-3 d-flex justify-content-center flex-row qty-container">
                                <input type="hidden" class="products_id" value="{{ $cart->products_id }}">
                                <input type="hidden" class="harga_product" value="{{ $cart->products->harga }}">
                                <input type="hidden" class="stok_product" value="{{ $cart->products->stok }}">
                                <button class="btn btn-primary decrement-btn rounded-0">-</button>
                                <input oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" type="number" min="1" name="stok" class="text-center form-control qty-input rounded-0" value="{{ $cart->qty }}" style="width: 50px; background-color: white; width:70px">
                                <button class="btn btn-primary increment-btn rounded-0 me-3">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item mt-2"><em class="fa fa-trash"></em> Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <h6>Total : Rp.<span class="total-harga">{{ number_format($total, 0,",",".") }}</span></h6>
            <a href="{{ route('checkout') }}" class="btn btn-success float-end">Checkout</a>
        </div>
    </div>
</div>

<nav>
    @include('notify::components.notify')
    <div class="top">
            <form class="search" method="GET" action="/search">
                    <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                    <button class="btnSearch btn btn-outline-light" type="submit">Search</button>
            </form>
        @auth
            <div style="display: flex; align-items:center; margin-right:75px; height:50px">
                <button class="cartBtn">
                    <span style="color: white">{{ count($carts) }}</span>
                    <img class="cartImg" src="{{ asset('assets/img/cart.png') }}" alt="cart">
                </button>
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
                        @if (auth()->user()->role === 'user')
                            <a href="{{ route('registerSeller') }}">Buka Toko</a>
                        @endif
                        <a href="{{ route('myOrder') }}">Transaksi</a>
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
                <a class="login" href="{{ route('login') }}">Masuk</a>
                <div style="position:relative; top:8px; display:inline-block; height: 30px; border-left:3px solid white; margin:0px 10px 0px 10px"></div>
                <a class="register" href="{{ route('register') }}">Daftar</a>
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
        let timer;

        window.totalHarga = parseFloat('{{ $total }}');

        function nDots(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function ngaJax(type, url, data) {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: url,
                data: data,
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

        $('#card-body').on('click', '.increment-btn', function(e) {
            e.preventDefault();
            let inc_value = $(e.target).siblings('.qty-input').val();
            let products_id = parseInt($(e.target).siblings('.products_id').val());
            let harga = parseFloat($(e.target).siblings('.harga_product').val());
            let qty = parseInt($(e.target).siblings('.stok_product').val());
            if (inc_value < qty) {
                inc_value++
                $(e.target).siblings('.qty-input').val(inc_value);
                window.totalHarga += harga;
                if (timer) clearTimeout(timer);
                timer = setTimeout(function () { 
                    ngaJax('PUT', '/update-cart', {'products_id': products_id, 'qty': parseInt(inc_value)});
                    $('.total-harga').html(nDots(totalHarga));
                }, 300);
            }
        });

        $('#card-body').on('click', '.decrement-btn', function(e) {
            e.preventDefault();
            let dec_value = $(e.target).siblings('.qty-input').val();
            let products_id = parseInt($(e.target).siblings('.products_id').val());
            let harga = parseFloat($(e.target).siblings('.harga_product').val());
            if(dec_value > 1){
                dec_value--
                $(e.target).siblings('.qty-input').val(dec_value);
                window.totalHarga -= harga;
                if (timer) clearTimeout(timer);
                timer = setTimeout(function () { 
                    ngaJax('PUT', '/update-cart', {'products_id': products_id, 'qty': parseInt(dec_value)});
                    $('.total-harga').html(nDots(totalHarga));
                }, 300);
            }
        });

        $('#card-body').on('click', '.delete-cart-item' ,function (e) { 
            e.preventDefault();
            let products_id = $(e.target).parents('.product_data').find('.products_id').val();
            let remE = $(e.target).parents('.product_data');
            remE.remove();
            ngaJax('DELETE', '/delete-cart', {'products_id': products_id});
            let qty = parseInt($(e.target).closest('.product_data').find(".qty-input").val());
            let harga = parseFloat($(e.target).closest('.product_data').find(".harga_product").val());
            window.totalHarga -= (qty * harga);
            $('.total-harga').html(nDots(totalHarga));
        });
    });
</script>




